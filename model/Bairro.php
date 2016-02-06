<?php
include_once(ROOT."model/db_classe.php");


class Bairro extends Classe{
    
    public $bairro_cdg;
    public $url_solicitada;
    public $url;
    public $nome;       
    public $carregado;
    
    public function __construct($bairro_cdg = null, $bairro_url = null) {
        parent::__construct($bairro_cdg, 1);
        $this->carregado = false;
        $this->bairro_cdg = isset($bairro_cdg) ? $bairro_cdg : -1;
        $this->url_solicitada = isset($bairro_url) ? $bairro_url : '-1';
        if(($this->bairro_cdg != -1)|| ($this->url_solicitada != '-1')){
            $this->carregar_bairro();
        }
             
    }
    
    function getBairroNome($cdg){
        $cdg = $this->db->QuerySingleValue("SELECT BAIRRO_NOME FROM BAIRRO WHERE BAIRRO_CDG = '".$cdg."'");
        $cdg = (!$cdg) ? -1 : $cdg;
        return $cdg;
    }
    
    
    function getCategoriaCDG($url){
        $cdg = $this->db->QuerySingleValue("SELECT BAIRRO_CDG FROM BAIRRO WHERE BAIRRO_URL = '".$url."'");
        $cdg = (!$cdg) ? -1 : $cdg;
        return $cdg;
    }
    
    
    //gravar , update ou insert na tabela ATIVDADE
    function gravar($bairro_cdg,$nome){                                  
            
            // valores a serem inseridos
           $valores["BAIRRO_NOME"]  = MySQL::SQLValue($nome, MySQL::SQLVALUE_TEXT);                
                                               
        
        
            //consultar se ja existe
            $this->db->Query(" SELECT BAIRRO_CDG FROM BAIRRO WHERE BAIRRO_CDG = ".  $this->bairro_cdg);
            $this->db->MoveFirst();		
                                                      
            
            // se  ja existe
            if($this->db->RowCount() > 0){               
                // update                             
                $where["BAIRRO_CDG"]  = MySQL::SQLValue($bairro_cdg, MySQL::SQLVALUE_NUMBER);                
                $this->db->UpdateRows("BAIRRO", $valores, $where);
                return -1; 
            }else{
                // se nao, executa insert                                                   
                $this->db->InsertRow("BAIRRO", $valores);
                return $this->db->GetLastInsertID();
            }
           		
        }
        
        
        public function carregar_bairro(){
            
            $this->db->Query(" SELECT * FROM BAIRRO WHERE BAIRRO_CDG = ".$this->bairro_cdg."
                                OR BAIRRO_URL = '".$this->url_solicitada."'");
            $this->db->MoveFirst();
            if($this->db->RowCount() > 0){
                $row =  $this->db->Row();    
                $this->bairro_cdg = $row->BAIRRO_CDG;
                $this->nome = $row->BAIRRO_NOME;                 
                $this->count = $row->BAIRRO_COUNT;  
                $this->url = $row->BAIRRO_URL;  
                $this->carregado = true;
            }
            
        }
    
        public function lista_bairros($bairro_cdg = -1){
            // join com itens para saber a quantidade exata de itens em cada categoria
            $sql = ' SELECT BAIRRO_CDG, BAIRRO_NOME,                     
                     BAIRRO_COUNT, COUNT(BAIRRO_CDG) AS BAIRRO_COUNT_DO_SQL 
                     FROM BAIRRO 
                     WHERE BAIRRO_COUNT > 0 ';
                      
                     
            if($bairro_cdg != -1){
                $sql = $sql . ' AND BAIRRO_CDG = '.$bairro_cdg.' ';
            }
            
           $sql = $sql . ' GROUP BY BAIRRO_CDG ';
                                  
            $result = $this->db->Query($sql);
                        
            while ($row = mysqli_fetch_array($this->db->last_result,MYSQLI_ASSOC)) {
                $cats[]  =  $row;
            }            
            return $cats;
        }
        
        
        public function proximoid($ID){
            return $this->db->NextId('BAIRRO', 'BAIRRO_CDG',$ID ,'BAIRRO_ORDEM');
        }
        
        
        public function anteriorid($ID){
            return $this->db->PriorId('BAIRRO', 'BAIRRO_CDG',$ID,'BAIRRO_ORDEM' );
        }
}

