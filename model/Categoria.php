<?php
include_once(ROOT."model/db_classe.php");


class Categoria extends Classe{
    
    public $cat_cdg;
    public $cat_url_solicitada;
    public $nome;
    public $imagem;
    public $descricao;
    public $carregado;
    
    public function __construct($cat_cdg = null, $cat_url = null) {
        parent::__construct($cat_cdg, 1);
        $this->carregado = false;   
        $this->cat_cdg = isset($cat_cdg) ? $cat_cdg : -1;     
        $this->item_url_solicitada = isset($cat_url) ? $cat_url : '-1';
        if(($this->cat_cdg != -1)|| ($this->cat_url_solicitada != '-1')){
            $this->carregar_cat();
        }
             
    }
    
    function getCategoriaNome($cdg){
        $cdg = $this->db->QuerySingleValue("SELECT CATEGORIA_NOME FROM CATEGORIA WHERE CATEGORIA_CDG = '".$cdg."'");
        $cdg = (!$cdg) ? -1 : $cdg;
        return $cdg;
    }
    
    
    function getCategoriaCDG($url){
        $cdg = $this->db->QuerySingleValue("SELECT CATEGORIA_CDG FROM CATEGORIA WHERE CATEGORIA_URL = '".$url."'");
        $cdg = (!$cdg) ? -1 : $cdg;
        return $cdg;
    }
    
    
    //gravar , update ou insert na tabela ATIVDADE
    function gravar($cat_cdg,$nome, $imagem, $descricao){                                  
            
            // valores a serem inseridos
           $valores["CATEGORIA_NOME"]  = MySQL::SQLValue($nome, MySQL::SQLVALUE_TEXT);
           $valores["CATEGORIA_DESC"]  = MySQL::SQLValue($descricao, MySQL::SQLVALUE_TEXT);           
                                               
        
        
            //consultar se ja existe
            $this->db->Query(" SELECT * FROM CATEGORIA WHERE CATEGORIA_CDG = ".  $this->cat_cdg);
            $this->db->MoveFirst();		
                                                      
            
            // se  ja existe
            if($this->db->RowCount() > 0){               
                // update                             
                $where["CATEGORIA_CDG"]  = MySQL::SQLValue($cat_cdg, MySQL::SQLVALUE_NUMBER);                
                $this->db->UpdateRows("CATEGORIA", $valores, $where);
                return -1; 
            }else{
                // se nao, executa insert                                   
                $valores["CATEGORIA_CRIADOR"]  = MySQL::SQLValue($criador, MySQL::SQLVALUE_TEXT);                                
                $this->db->InsertRow("CATEGORIAEGORIA", $valores);
                return $this->db->GetLastInsertID();
            }
           		
        }
        
        
        public function carregar_cat(){
            
            $this->db->Query(" SELECT * FROM CATEGORIA WHERE CATEGORIA_CDG = ".$this->cat_cdg."
                                OR CATEGORIA_URL = '".$this->cat_url_solicitada."'");
            $this->db->MoveFirst();
            if($this->db->RowCount() > 0){
                $row =  $this->db->Row();    
                $this->cat_cdg = $row->CATEGORIA_CDG;
                $this->nome = $row->CATEGORIA_NOME;
                $this->descricao = $row->CATEGORIA_DESC;              
                $this->carregado = true;
            }
            
        }
    
        public function lista_cats($cat_cdg = -1, $count_com_localizacao = false){
            // join com itens para saber a quantidade exata de itens em cada categoria
            $sql = ' SELECT CATEGORIA_CDG, CATEGORIA_NOME,
                     CATEGORIA_IMAGEM, CATEGORIA_ICONE, CATEGORIA_PAI,
                     CATEGORIA_COUNT, COUNT(CATEGORIA_CDG) AS CATEGORIA_COUNT_DO_SQL 
                     FROM CATEGORIA LEFT JOIN ITEM ON ITEM_CATEGORIA = CATEGORIA_CDG
                     WHERE CATEGORIA_COUNT > 0 ';
            
            if ($count_com_localizacao)
                $sql = $sql . " AND ITEM_LAT <> '' AND  (COALESCE(ITEM_LAT,0) <> 0) ";
                     
            if($cat_cdg != -1){
                $sql = $sql . ' AND CATEGORIA_CDG = '.$cat_cdg.' ';
            }
            $sql = $sql . " GROUP BY CATEGORIA_CDG "
                        . " ORDER BY CATEGORIA_NOME ";
                                  
            $result = $this->db->Query($sql);
                        
            while ($row = mysqli_fetch_array($this->db->last_result,MYSQLI_ASSOC)) {
                $cats[]  =  $row;
            }            
            return $cats;
        }
        
        
        public function proximoid($ID){
            return $this->db->NextId('CATEGORIA', 'CATEGORIA_CDG',$ID ,'CATEGORIA_ORDEM');
        }
        
        
        public function anteriorid($ID){
            return $this->db->PriorId('CATEGORIA', 'CATEGORIA_CDG',$ID,'CATEGORIA_ORDEM' );
        }
}

