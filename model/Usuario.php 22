<?php
include_once ROOT."model/db_classe.php";

class Usuario extends Classe
{
  
            
  protected $cdg;
  protected $login;
  protected $senha;
  protected $imagem;
  protected $nome;  
  protected $email;
  protected $cidade;
  protected $uf;
  protected $telefone;
  protected $tipo;
  
      
      
  public function __construct_vazio()
  { 
     parent::__construct();
  }
  
        
  public function __construct($id = -1, $login = "")
  { 
    parent::__construct();
     
    $this->setCdg($id);
    $this->setLogin($login); 

    $this->carregar_dados();
  }


  public function carregar_dados()
  {      
    $sql = ( $this->cdg != -1 ? "SELECT * FROM USUARIO WHERE USUARIO_CDG = ".$this->cdg 
                : "SELECT * FROM USUARIO WHERE UPPER(USUARIO_LOGIN) = '".strtoupper($this->login)."'");    
    $this->db->Query($sql);
    if($this->db->RowCount() > 0 ){                         
        $row = $this->db->Row();                
        $this->setCdg($row->USUARIO_CDG);
        $this->setTipo($row->USUARIO_TIPO); 
        $this->setNome($row->USUARIO_NOME);        
        
        $this->setLogin($row->USUARIO_LOGIN);
        $this->setSenha($row->USUARIO_SENHA);
        $this->setImagem($row->USUARIO_IMAGEM);
        $this->setEmail($row->USUARIO_EMAIL);
        $this->setCidade($row->USUARIO_CIDADE);
        $this->setUF($row->USUARIO_UF);
        $this->setTelefone($row->USUARIO_TELEFONE);
        
    }
  }
  
  
  public function lugares_avaliados($usuario_cdg = -1,$total_de_itens = 5){
        $usuario_cdg =  ($usuario_cdg == -1) ? $this->cdg  : $usuario_cdg;
        
        $sql = 'SELECT DISTINCT 
                ITEM_CDG,ITEM_IMAGEM,ITEM_NOME,ITEM_CATEGORIA,ITEM_URL,
                        COALESCE((SELECT COUNT(ITEMCURTIDA_ITEM) FROM ITEM_CURTIDA 
                            WHERE ITEMCURTIDA_ITEM = ITEM_CDG 
                            AND ITEMCURTIDA_TIPOCURTIDA = 1),0) AS TOTAL_CURTIDAS
                 FROM ITEM 
                    LEFT JOIN CATEGORIA ON CATEGORIA_CDG = ITEM_CATEGORIA 
                    LEFT JOIN ITEM_COMENTARIO ON ITEMCOMENTARIO_ITEM = ITEM_CDG                 
                 WHERE ITEMCOMENTARIO_USUARIO = 5
                 LIMIT '.$total_de_itens; 
        
        $listaitems = $this->retorna_array($sql);
                
        return $listaitems;
        
    }
    
    
     private function retorna_array($sql){
        
        $this->db->Query($sql);

        while ($row = mysqli_fetch_array($this->db->last_result,MYSQLI_ASSOC)) {
            $items[]  =  $row;            
        }
        
        $resultado = isset($items) ? $items : array();            
        return $resultado;
    }
    
  
  
  
  public function gravar($usuario_cdg,
                    $nome,
                    $login,
                    $senha,
                    $imagem,
                    $email,
                    $cidade,
                    $UF,
                    $telefone){
      
        if(isset($nome))
            $valores["USUARIO_NOME"]  = MySQL::SQLValue($nome, MySQL::SQLVALUE_TEXT);       
        if(isset($login))
            $valores["USUARIO_LOGIN"] = MySQL::SQLValue($login, MySQL::SQLVALUE_TEXT);
        if(isset($senha))
            $valores["USUARIO_SENHA"]  = MySQL::SQLValue($senha, MySQL::SQLVALUE_TEXT);
        if(isset($imagem))
            $valores["USUARIO_IMAGEM"]  = MySQL::SQLValue($imagem, MySQL::SQLVALUE_TEXT);
        if(isset($email))
            $valores["USUARIO_EMAIL"]  = MySQL::SQLValue($email, MySQL::SQLVALUE_TEXT);              
        if(isset($cidade))
            $valores["USUARIO_CIDADE"]  = MySQL::SQLValue($cidade, MySQL::SQLVALUE_TEXT);              
        if(isset($UF))
            $valores["USUARIO_UF"]  = MySQL::SQLValue($UF, MySQL::SQLVALUE_TEXT);              
        if(isset($telefone))
            $valores["USUARIO_TELEFONE"]  = MySQL::SQLValue($telefone, MySQL::SQLVALUE_TEXT);              

        //consultar se ja existe
        $this->db->Query(" SELECT USUARIO_CDG FROM USUARIO WHERE USUARIO_CDG = ".  $usuario_cdg);
        $this->db->MoveFirst();		

        // se  ja existe
        if($this->db->RowCount() > 0){               
            // update                             
            $where["USUARIO_CDG"]  = MySQL::SQLValue($usuario_cdg, MySQL::SQLVALUE_NUMBER);                
            $this->db->UpdateRows("USUARIO", $valores, $where);
            return 0; 
        }else{           
            // se nao, executa insert                                               
            $this->db->InsertRow("USUARIO", $valores);
            return $this->db->GetLastInsertID();
        }

      
  }


  
  
  public function getCdg() {return $this->cdg;}
  public function getLogin() {return $this->login;}
  public function getNome() {return $this->nome;}
  public function getSenha() {return $this->senha;}
  public function getEmail() {return $this->email;}
  public function getImagem() {
    if(isset($this->imagem)){
      if(trim($this->imagem) != '' ){
        return $this->imagem;
      }else{
         return  $imagem_anonimo;
      }
    }  else {   
       return  $imagem_anonimo;
    }  
  }
  public function getCidade() {return $this->cidade;}
  public function getUF() {return $this->uf;}
  public function getTelefone() {return $this->telefone;}
  public function getTipo() {return $this->tipo;}
     
  public function setCdg($cdg) {$this->cdg = $cdg;}
  public function setLogin($login) {$this->login = $login;}
  public function setNome($nome) {$this->nome = $nome;}
  public function setSenha($senha) {$this->senha = $senha;}
  public function setImagem($param) {
    if($this->tipo == 0)   {
        if(isset($param)){
          if(($param != '')){
            $param = ROOT_URL.'view/img/uploads/'.$param;
          }
        }        
    }    
    $this->imagem = $param;      
  }
  public function setEmail($email) {$this->email = $email;}
  public function setCidade($param) {$this->cidade = $param;}
  public function setUF($param) {$this->uf = $param;}
  public function setTelefone($param) {$this->telefone = $param;}  
  public function setTipo($tipo) {$this->tipo = $tipo;}
}

?>