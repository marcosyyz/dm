<?php

include_once(ROOT."model/db_classe.php");


class Item extends Classe{
    private $dbaux ;
    private $sql_base = ' SELECT   ITEM_CDG,               ITEM_NOME,         ITEM_CRIADOR,
                                   ITEM_LAT,               ITEM_LONG,         ITEM_IMAGEM, ITEM_IMAGEM_CAPA,                                  
                                   ITEM_DESCRICAO,         ITEM_URL,      ITEM_BAIRRO,
                                   ITEM_CATEGORIA,         BAIRRO_NOME,       ITEM_ENDERECO,     
                                   ITEM_TELEFONE,          ITEM_TELEFONE2,    ITEM_TELEFONE3,    
                                   ITEM_EMAIL,             ITEM_WEB,          ITEM_H_SEGUNDA , 
                                   ITEM_VIEW,
                                   CATEGORIA_NOME,
                                   CATEGORIA_ICONE                                   
                            FROM ITEM 
                                LEFT JOIN BAIRRO ON BAIRRO_CDG = ITEM_BAIRRO 
                                LEFT JOIN CATEGORIA ON CATEGORIA_CDG = ITEM_CATEGORIA 
                                ';
        
    public $item_cdg;    
    public $item_url_solicitada;
    public $nome;
    public $lat;
    public $long;
    public $imagem;
    public $imagem_capa;    
    public $icone_map;
    public $descricao;
    public $url;
    public $categoria_cdg;
    public $categoria_nome;
    public $bairro;
    public $telefone;
    public $telefone2;
    public $telefon3;
    public $endereco;
    public $email;
    public $web;
    public $h_segunda;
    
    public $carregado;
    
    public function __construct($item_cdg = null,$item_url = null) {                
        parent::__construct();
        
        $this->dbaux = new Mysql();
        $this->carregado = false;                        
        $this->item_cdg = isset($item_cdg) ? $item_cdg : -1;        
        
        $this->item_url_solicitada = isset($item_url) ? $item_url : '-1';
             if(($this->item_cdg != -1) || ($this->item_url_solicitada != '-1')){
                $this->carregar_item();                
             }
             
    }
    
    function getItemUrl($item_cdg){
        $URL = $this->db->QuerySingleValue("SELECT ITEM_URL FROM ITEM WHERE ITEM_CDG = '".$item_cdg."'");
        $URL = (!$URL) ? -1 : $URL;
        return $URL;
        
    }
    
    function carregar_busca($filtro){
         $this->db->Query(" SELECT * FROM ITEM WHERE ITEM_CDG = ".$this->item_cdg);
        $this->db->MoveFirst();
        
    }
           
   //gravar , update ou insert na tabela ATIVDADE
    function gravar($item_cdg,$nome, $lat, $long, $imagem, $imagem_capa, $descricao, $url, $categoria, $bairro,
                    $telefone, $telefone2, $telefon3, $endereco, $email, $web, $h_segunda, $criador){                                  

        // valores a serem inseridos
       $valores["ITEM_NOME"]  = MySQL::SQLValue($nome, MySQL::SQLVALUE_TEXT);
       
       $valores["ITEM_LAT"] = MySQL::SQLValue($lat, MySQL::SQLVALUE_NUMBER);
       $valores["ITEM_LONG"]  = MySQL::SQLValue($long, MySQL::SQLVALUE_NUMBER);
       if(isset($imagem)){
         if(($imagem) != ''){
            $valores["ITEM_IMAGEM"]  = MySQL::SQLValue($imagem, MySQL::SQLVALUE_TEXT);
         }
       }
       
       if(isset($imagem_capa)){
         if(($imagem_capa) != ''){
       $valores["ITEM_IMAGEM_CAPA"]  = MySQL::SQLValue($imagem_capa, MySQL::SQLVALUE_TEXT);
        }
       }
       $valores["ITEM_DESCRICAO"]  = MySQL::SQLValue($descricao, MySQL::SQLVALUE_TEXT);
       $valores["ITEM_ENDERECO"]  = MySQL::SQLValue($endereco, MySQL::SQLVALUE_TEXT);
       $valores["ITEM_BAIRRO"]  = MySQL::SQLValue($bairro, MySQL::SQLVALUE_TEXT);
       $valores["ITEM_CATEGORIA"]  = MySQL::SQLValue($categoria, MySQL::SQLVALUE_TEXT);
       $valores["ITEM_TELEFONE"]  = MySQL::SQLValue($telefone, MySQL::SQLVALUE_TEXT);
       $valores["ITEM_TELEFONE2"]  = MySQL::SQLValue($telefone2, MySQL::SQLVALUE_TEXT);
       $valores["ITEM_EMAIL"]  = MySQL::SQLValue($email, MySQL::SQLVALUE_TEXT);
       $valores["ITEM_WEB"]  = MySQL::SQLValue($web, MySQL::SQLVALUE_TEXT);
       $valores["ITEM_URL"]  = MySQL::SQLValue($url, MySQL::SQLVALUE_TEXT);
       



        //consultar se ja existe
        $this->db->Query(" SELECT * FROM ITEM WHERE ITEM_CDG = ". $item_cdg);
        $this->db->MoveFirst();		


        // se  ja existe
        if($this->db->RowCount() > 0){               
            // update                             
            $where["ITEM_CDG"]  = MySQL::SQLValue($item_cdg, MySQL::SQLVALUE_NUMBER);                
            $this->db->UpdateRows("ITEM", $valores, $where);
            return -1; 
        }else{
            // se nao, executa insert                                   
            $valores["ITEM_CRIADOR"]  = MySQL::SQLValue($criador, MySQL::SQLVALUE_TEXT);                                
            $this->db->InsertRow("ITEM", $valores);
            return $this->db->GetLastInsertID();
        }

    }


    public function carregar_item(){

        $this->db->Query($this->sql_base ." WHERE ITEM_CDG = '".$this->item_cdg."'
                                     OR ITEM_URL = '".$this->item_url_solicitada."'");
        $this->db->MoveFirst();
        if($this->db->RowCount() > 0){
            $row =  $this->db->Row();                        
            $this->item_cdg = $row->ITEM_CDG;
            $this->nome = $row->ITEM_NOME;
            $this->lat = $row->ITEM_LAT;
            $this->long = $row->ITEM_LONG;
            $this->imagem = $row->ITEM_IMAGEM;
            $this->imagem_capa = $row->ITEM_IMAGEM_CAPA;
            $this->icone_map = $this->icone_categoria_pai($row->ITEM_CATEGORIA);
            $this->descricao = $row->ITEM_DESCRICAO;            
            $this->url = $row->ITEM_URL;
            $this->categoria_cdg = $row->ITEM_CATEGORIA;
            $this->categoria_nome = $row->CATEGORIA_NOME;
            $this->bairro_cdg = $row->ITEM_BAIRRO;            
            $this->bairro_nome = $row->BAIRRO_NOME;            
            $this->endereco = $row->ITEM_ENDERECO   ;
            $this->telefone = $row->ITEM_TELEFONE;
            $this->telefone2 = $row->ITEM_TELEFONE2;
            $this->telefon3 = $row->ITEM_TELEFONE3;
            $this->email = $row->ITEM_EMAIL;
            $this->web = $row->ITEM_WEB;
            $this->h_segunda = $row->ITEM_H_SEGUNDA;  
            $this->carregado = true;
            
        }

    }

 
            
       
    public function lista_items($filtro_nome,
                                $cat_cdg = -1,
                                $bairro_cdg = -1,
                                $com_localizacao = true,
                                $limit = -1,
                                $com_imagens = false){
        
        $sql = $this->sql_base.' WHERE (1=1) '; 
        // filtrar por uma categoria
        if($cat_cdg != -1){
            $sql = $sql . ' AND ITEM_CATEGORIA = '.$cat_cdg.' ';
        }
        //filtrar  por bairro
        if($bairro_cdg != -1){
            $sql = $sql . ' AND ITEM_BAIRRO = '.$bairro_cdg.' ';
        }                

        //mostrar itens com lat e long
        if($com_localizacao){
             $sql = $sql . " AND (ITEM_LAT <> '' AND ITEM_LONG <> '') 
                             AND (ITEM_LAT IS NOT NULL AND ITEM_LONG IS NOT NULL )
                             AND (ITEM_LAT <> 0  AND ITEM_LONG <> 0 ) ";
        }
                
        
        if($filtro_nome != ''){
             $sql = $sql . " AND ITEM_NOME LIKE '%".$filtro_nome."%' ";
        }
        
        if($com_imagens){
             $sql = $sql . " AND ITEM_IMAGEM <> '' AND ITEM_IMAGEM IS NOT NULL ";
        }
        
        //ordenar por item_cdg
        $sql = $sql . " ORDER BY ITEM_CDG";
        
        //limitar lista de itens
        if($limit != -1)
            $sql = $sql . "  LIMIT ".$limit;
        return $this->retorna_array($sql);               
    }


    public function proximoid($ID){
        return $this->db->NextId('ITEM', 'ITEM_CDG',$ID ,'ITEM_ORDEM');
    }


    public function anteriorid($ID){
        return $this->db->PriorId('ITEM', 'ITEM_CDG',$ID,'ITEM_ORDEM' );
    }
    
    
    public function itens_similares($item_cdg = -1,$total_de_itens = 5){
        $item_cdg =  ($item_cdg == -1) ? $this->item_cdg  : $item_cdg;
        
        $sql = ' SELECT ITEM_CDG,ITEM_IMAGEM,ITEM_NOME,ITEM_CATEGORIA,ITEM_URL,
                        COALESCE((SELECT COUNT(ITEMCURTIDA_ITEM) FROM ITEM_CURTIDA 
                            WHERE ITEMCURTIDA_ITEM = ITEM_CDG 
                            AND ITEMCURTIDA_TIPOCURTIDA = 1),0) AS TOTAL_CURTIDAS
                 FROM ITEM 
                 LEFT JOIN CATEGORIA ON CATEGORIA_CDG = ITEM_CATEGORIA 
                 WHERE ITEM_CATEGORIA = (SELECT ITEM_CATEGORIA FROM ITEM WHERE ITEM_CDG = '.$item_cdg.') 
                  AND ITEM_CDG <> '.$item_cdg.' LIMIT  5 '; 
        
        $listaitems = $this->retorna_array($sql);
                
        return $listaitems;
        
    }
    
    
    private function retorna_array($sql){
        
        $this->db->Query($sql);

        while ($row = mysqli_fetch_array($this->db->last_result,MYSQLI_ASSOC)) {
            $row['ITEM_IMAGEM'] = $row['ITEM_IMAGEM'] == '' ? 'item-padrao.jpg' : $row['ITEM_IMAGEM'] ;
            $row['CATEGORIA_ICONE'] = $this->icone_categoria_pai($row['ITEM_CATEGORIA']);
            //$row['CATEGORIA_ICONE'] = $row['CATEGORIA_ICONE'];
            $items[]  =  $row;            
        }
        
        $resultado = isset($items) ? $items : array();            
        return $resultado;
    }
    
    public function adicionar_contador($item_cdg = -1){
           $item_cdg =  $item_cdg == -1 ? $this->item_cdg : $item_cdg;           
           $this->db->Query(' UPDATE ITEM SET ITEM_VIEW = ITEM_VIEW + 1 
                      WHERE ITEM_CDG = '.$item_cdg);
    }
    
    //encontrar categoria pai que tenha icone , recursivo.
    public function icone_categoria_pai($cat_cdg){
        $cat_pai_cdg = '';
        $cat_icone = '';
        if(isset($cat_cdg)){
            // Pegar icone e pai da categoria atual
            $this->dbaux->Query('SELECT CATEGORIA_PAI, CATEGORIA_ICONE FROM CATEGORIA WHERE CATEGORIA_CDG = '.$cat_cdg);                
            $this->dbaux->MoveFirst();
            if ($this->dbaux->RowCount() > 0 && $this->dbaux->GetColumnCount() > 0) {
                $row = $this->dbaux->RowArray(null, MYSQLI_NUM);
                $cat_pai_cdg  = $row[0];
                $cat_icone = $row[1];
            }
        
        
            //nao tem icone?
            if(!isset($cat_icone)){
                //nao tem pai?
              if((isset($cat_pai_cdg) ?  $cat_pai_cdg : 0 ) == 0){
                // Pegar icone padrao 
                $cat_icone = $this->dbaux->QuerySingleValue(" SELECT CONFIG_VALOR FROM CONFIG WHERE CONFIG_NOME  = 'ICONE_CATEGORIA_PADRAO' " );
              }else{

                // Pegar icone e pai da categoria pai
                $cat_icone = $this->icone_categoria_pai($cat_pai_cdg);

              }
                return $cat_icone;
             }else{
                return $cat_icone;
            }
        }else{
                return $cat_icone;
        }
    }
    


}

