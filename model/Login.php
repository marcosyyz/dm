<?php
include_once(ROOT."model/db_classe.php");

class Login extends Classe
{
	
	public  $cdg;        
        public  $login;
	public  $nome ;
	public  $senha;          	
        public  $imagem_padrao;   
	
	public $ThrowExceptions = false;

	public function __construct($login = '',$senha = '',$imagem_padrao = '') {
           parent::__construct();	   
            $this->imagem_padrao = $imagem_padrao;
           $this->login = strtoupper(trim($login));
           $this->senha = strtoupper(trim($senha));                                           
	}
        
	
	public function __destruct() {
		
	}

	public function autenticar_login() {
             $this->db = new Mysql();
             $filter["USUARIO_LOGIN"] = MySQL::SQLValue($this->login);
             $filter["USUARIO_SENHA"] = MySQL::SQLValue($this->senha);
             $this->db->SelectRows("USUARIO",$filter);
             $ok = ($this->db->RowCount() > 0 );
             if ($ok){ $this->carregar_dados_usuario( $this->db->row(),'',-1);}
             $this->db->Close();
             return $ok;             
        }

        
        public function logar_face($cdg,$login,$senha,$nome,$imagem,$email){
            //se nao tem no banco  de dados
        if(!$this->db->HasRecords(" SELECT USUARIO_CDGFACE 
                                       FROM USUARIO 
                                       WHERE USUARIO_TIPO = 1 
                                       AND USUARIO_CDGFACE = '".$cdg."' ")){
                // cadastrar                
                $valores["USUARIO_CDGFACE"] = MySQL::SQLValue($cdg, MySQL::SQLVALUE_TEXT);
                $valores["USUARIO_LOGIN"]  =  MySQL::SQLValue('', MySQL::SQLVALUE_TEXT);;
                $valores["USUARIO_SENHA"]  = MySQL::SQLValue('', MySQL::SQLVALUE_TEXT);;
                $valores["USUARIO_NOME"]  = MySQL::SQLValue($nome, MySQL::SQLVALUE_TEXT);
                if(isset($imagem))
                    if(trim($imagem) != '')
                        $valores["USUARIO_IMAGEM"] = MySQL::SQLValue($imagem, MySQL::SQLVALUE_TEXT);
                $valores["USUARIO_EMAIL"]  = MySQL::SQLValue($email, MySQL::SQLVALUE_TEXT);
                $valores["USUARIO_TIPO"]  =  1;
                
                $this->db->InsertRow("USUARIO", $valores);
            }            
            $this->carregar_dados_usuario($cdg,$imagem,1);//face tipo de login = 1                                          
        }
        
        
        public function logar_google($cdg,$login,$senha,$nome,$imagem,$email){
            //se nao tem no banco  de dados
            if(!$this->db->HasRecords(' SELECT USUARIO_CDGGOOGLE 
                                       FROM USUARIO 
                                       WHERE USUARIO_TIPO = 2 
                                       AND USUARIO_CDGGOOGLE = '.$cdg)){
                // cadastrar
                $valores["USUARIO_CDGGOOGLE"] = MySQL::SQLValue($cdg, MySQL::SQLVALUE_TEXT);
                $valores["USUARIO_LOGIN"]  = MySQL::SQLValue($login, MySQL::SQLVALUE_TEXT);
                $valores["USUARIO_SENHA"]  = MySQL::SQLValue(null, MySQL::SQLVALUE_TEXT);
                $valores["USUARIO_NOME"]  = MySQL::SQLValue($nome, MySQL::SQLVALUE_TEXT);
                if(isset($imagem)){
                  if(trim($imagem) != ''){
                    $valores["USUARIO_IMAGEM"]  = MySQL::SQLValue($imagem, MySQL::SQLVALUE_TEXT);
                  }
                }
                $valores["USUARIO_EMAIL"]  = MySQL::SQLValue($email, MySQL::SQLVALUE_TEXT);
                $valores["USUARIO_TIPO"]  =  2;
                
                $this->db->InsertRow("USUARIO", $valores);
            }

            $this->carregar_dados_usuario($cdg,$imagem,2);                                
        }
       
               
        public function logar($login,$senha){
            //evitar injection
            $retorno = false;
            
            if((strpos($login,'"')) || (strpos($login,"'"))|| (strpos($login,';')) 
              || (strpos($senha,'"')) || (strpos($senha,"'")) || (strpos($senha,";")))
                    return false;
            
            //se nao tem no banco  de dados            
            $usuario_cdg =  $this->db->QuerySingleValue(' SELECT USUARIO_CDG
                                       FROM USUARIO 
                                       WHERE USUARIO_ATIVO = 1
                                       AND UPPER(USUARIO_LOGIN) = "'.  strtoupper($login).'"
                                       AND USUARIO_SENHA = "'.$senha.'" ');
            
            if($usuario_cdg > 0){
                $this->carregar_dados_usuario($usuario_cdg,null,0);
                $retorno = true;
            }                        
            return $retorno ;
        }
       
  
        
        
  
     
         //carrega dados de login nas variaveis e nas session ,
         // ternários necessarios caso classe nao estiver conectada no bd  
        public function carregar_dados_usuario($cdg,$imagem, $tipo){
           
            $sql = " SELECT * FROM USUARIO ";
            if($tipo == 0)
                $sql = $sql . " WHERE USUARIO_CDG = '".trim($cdg)."'";
            if($tipo == 1){
                $this->db->Query("UPDATE USUARIO SET USUARIO_IMAGEM = '".$imagem."' WHERE USUARIO_CDGFACE = '".$cdg."'");
                $sql = $sql . " WHERE USUARIO_CDGFACE = '".trim($cdg)."'";
            }
            if($tipo == 2){
               if(isset($imagem)){
                 if($imagem != ''){  
                    $this->db->Query("UPDATE USUARIO SET USUARIO_IMAGEM = '".$imagem."' WHERE USUARIO_CDGGOOGLE = '".$cdg."'");
                  }
               }
                $sql = $sql . " WHERE USUARIO_CDGGOOGLE = '".trim($cdg)."'";
            }
            
            $this->db->Query($sql);            
            $this->db->MoveFirst();
            if($this->db->RowCount() > 0){
            
                //gravando sessoes de login         
                $row = $this->db->row();
                
                $_SESSION['USUARIO_TIPO'] = isset($row->USUARIO_TIPO) ? $row->USUARIO_TIPO : null; 
                //atribui o tip correto  caso esteja errado no parametro passado , ou parametro -1
                $tipo = $_SESSION['USUARIO_TIPO'] ;
                
                $_SESSION['USUARIO_CDG'] = isset($row->USUARIO_CDG) ? $row->USUARIO_CDG: -1;
                if($tipo == 1)
                    $_SESSION['IDSOCIAL'] = isset($row->USUARIO_CDGFACE) ? $row->USUARIO_CDGFACE: -1;
                if($tipo == 2)
                    $_SESSION['IDSOCIAL'] = isset($row->USUARIO_CDGGOOGLE) ? $row->USUARIO_CDGGOOGLE: -1;
                                
              

                $_SESSION['LOGIN'] = isset($row->USUARIO_LOGIN) ? $row->USUARIO_LOGIN: null;
                $_SESSION['SENHA'] = isset($row->USUARIO_SENHA) ? $row->USUARIO_SENHA : null;
                $_SESSION['USUARIO_NOME'] = isset($row->USUARIO_NOME) ? $row->USUARIO_NOME: null ;
                
                $_SESSION['USUARIO_IMAGEM'] = isset($row->USUARIO_IMAGEM) ? $row->USUARIO_IMAGEM : null ;
                if(($tipo == 0) and (trim($_SESSION['USUARIO_IMAGEM']) != '')){
                    $_SESSION['USUARIO_IMAGEM'] = ROOT_URL.'view/img/uploads/'.$_SESSION['USUARIO_IMAGEM'];
                }elseif($row->USUARIO_IMAGEM != ''){
                    $_SESSION['USUARIO_IMAGEM'] = $row->USUARIO_IMAGEM;
                }else{
                    $_SESSION['USUARIO_IMAGEM'] = $this->imagem_padrao;
                }
                                
                $_SESSION['USUARIO_NIVEL'] = isset($row->USUARIO_NIVEL) ? $row->USUARIO_NIVEL : null;                 
                $_SESSION['USUARIO_ATIVO'] = isset($row->USUARIO_ATIVO) ? $row->USUARIO_ATIVO : null ;            
                   
                $this->cdg = $row->USUARIO_CDG;
                $this->logar_BD($this->cdg);
            }            
            
        }
        
        public function deslogar_BD($cdg){
            $_SESSION['LOGADO'] = '0';
            unset($_SESSION['LOGADO']);
            $this->db->Query(' UPDATE USUARIO SET USUARIO_LOGADO = 0 '                             
                              .' WHERE USUARIO_CDG = ' . $cdg);
        }
        
        private function logar_BD($cdg){
             $_SESSION['LOGADO'] = '1';
                     
             $this->db->Query(' UPDATE USUARIO SET USUARIO_LOGADO = 1, '
                              .' USUARIO_ULTIMOACESSO = CURRENT_TIMESTAMP(), '
                              .' USUARIO_ULTIMOLOCAL = "'.gethostbyaddr($_SERVER['REMOTE_ADDR']).'"'
                              .' WHERE USUARIO_CDG = ' . $cdg);
             
        }
        


	
	
}
?>