<?php
include_once(ROOT."model/db_classe.php");


class Comentario extends Classe{
    
    public $comentario_cdg;
    public $texto;   
    public $usuario;
    public $data;
    public $noticia;
    public $item;
    public $total_atual;
        
    
    public function __construct($item_cdg = -1,$noticia_cdg = -1) {
        parent::__construct();
        $this->total_atual = 0;
        $this->noticia = isset($noticia_cdg) ? $noticia_cdg : -1;
        $this->item = isset($item_cdg) ? $item_cdg : -1;
        
        //if($this->comentario_cdg != -1)
          //  $this->carregar_comentario_noticia();
             
    }
    
    public function carregar_comentario_noticia(){
            
            $this->db->Query(" SELECT COMENTARIO_TEXTO,DATE_FORMAT(COMENTARIO_DATA,'%d/%m/%Y') AS DATA,
                       USUARIO_NOME,NOTICIA_CDG, COMENTARIO_DATA
                       FROM COMENTARIO 
                       LEFT JOIN NOTICIA_COMENTARIO ON NOTCOMENTARIO_COMENTARIO = COMENTARIO_CDG
                       LEFT JOIN USUARIO ON USUARIO_CDG = NOTCOMENTARIO_USUARIO
                       WHERE COMENTARIO_CDG = '".$this->comentario_cdg."'");
            
            $this->db->MoveFirst();
            
            if($this->db->RowCount() > 0){
                $row =  $this->db->Row();                
                $this->texto = $row->COMENTARIO_TEXTO;
                $this->usuario = $row->USUARIO_NOME;              
                $this->data = $row->DATA;  
                $this->noticia = $row->NOTICIA_CDG;  
            }
           $this->total_atual = $this->db->RowCount();
            
    }
    
         public function lista_comentarios_item($item_cdg = -1){
            
            $sql = ' SELECT COMENTARIO_TEXTO,DATE_FORMAT(COMENTARIO_DATA,"%d/%m/%Y %h:%i") AS DATA,
                       USUARIO_NOME, ITEMCOMENTARIO_ITEM, COMENTARIO_DATA, COMENTARIO_RATING,
                       USUARIO_CDG, USUARIO_IMAGEM, USUARIO_TIPO
                       FROM COMENTARIO 
                       LEFT JOIN ITEM_COMENTARIO ON ITEMCOMENTARIO_COMENTARIO = COMENTARIO_CDG
                       LEFT JOIN USUARIO ON USUARIO_CDG = ITEMCOMENTARIO_USUARIO
                       WHERE (1=1)  ';
            
            if($item_cdg != -1){
                $sql = $sql . " AND ITEMCOMENTARIO_ITEM =  '".$item_cdg."'";
            }
            
            $sql = $sql . " ORDER BY COMENTARIO_DATA DESC ";
            
            return $this->retorna_array($sql);
        }
    
    
      public function lista_comentarios_noticia($noticia_cdg = -1){
            
            $sql = ' SELECT COMENTARIO_TEXTO,
                            DATE_FORMAT(COMENTARIO_DATA,"%d/%m/%Y %h:%i") AS DATA,
                            USUARIO_NOME, USUARIO_CDG, USUARIO_IMAGEM,COMENTARIO_DATA,
                            NOTCOMENTARIO_NOTICIA, USUARIO_TIPO
                       FROM COMENTARIO 
                       LEFT JOIN NOTICIA_COMENTARIO ON NOTCOMENTARIO_COMENTARIO = COMENTARIO_CDG
                       LEFT JOIN USUARIO ON USUARIO_CDG = NOTCOMENTARIO_USUARIO
                       WHERE (1=1)  ';
            
            if($noticia_cdg != -1){
                $sql = $sql . ' AND NOTCOMENTARIO_NOTICIA =  '.$noticia_cdg.' ';
            }
            
            $sql = $sql . " ORDER BY COMENTARIO_DATA DESC ";
            
            return $this->retorna_array($sql);
          
        }
        
        function inserir_comentario($texto,$usuario,$data,$noticia,$item,$rating){
                // valores a serem inseridos
              $retorno = false;
              $valores_coment["COMENTARIO_TEXTO"]  = MySQL::SQLValue($texto, MySQL::SQLVALUE_TEXT);
              $valores_coment["COMENTARIO_DATA"]  =  MySQL::SQLValue( ($data != -1 ? $data : date("d-m-Y G:i")), MySQL::SQLVALUE_DATETIME); 
              $valores_coment["COMENTARIO_USUARIO"]  = MySQL::SQLValue($usuario, MySQL::SQLVALUE_NUMBER); 
              $valores_coment["COMENTARIO_RATING"]  = MySQL::SQLValue($rating, MySQL::SQLVALUE_NUMBER); 
              
              $this->db->InsertRow("COMENTARIO", $valores_coment);
              $comentario_inserido = $this->db->GetLastInsertID();
              
              if(($noticia != -1) && ($comentario_inserido != -1)){
                   $valores_relacaocoment["NOTCOMENTARIO_NOTICIA"]  = MySQL::SQLValue($noticia, MySQL::SQLVALUE_NUMBER); 
                   $valores_relacaocoment["NOTCOMENTARIO_COMENTARIO"]  = MySQL::SQLValue($comentario_inserido, MySQL::SQLVALUE_NUMBER); 
                   $valores_relacaocoment["NOTCOMENTARIO_USUARIO"]  = MySQL::SQLValue($usuario, MySQL::SQLVALUE_NUMBER); 
                   $this->db->InsertRow("NOTICIA_COMENTARIO", $valores_relacaocoment);
                   $retorno =  true;
              }
              if(($item != -1) && ($comentario_inserido != -1)){
                   $valores_relacaocoment["ITEMCOMENTARIO_ITEM"]  = MySQL::SQLValue($item, MySQL::SQLVALUE_NUMBER); 
                   $valores_relacaocoment["ITEMCOMENTARIO_COMENTARIO"]  = MySQL::SQLValue($comentario_inserido, MySQL::SQLVALUE_NUMBER); 
                   $valores_relacaocoment["ITEMCOMENTARIO_USUARIO"]  = MySQL::SQLValue($usuario, MySQL::SQLVALUE_NUMBER); 
                   $this->db->InsertRow("ITEM_COMENTARIO", $valores_relacaocoment);
                   $retorno =  true;
              }
              return $retorno;
        }
        
        private function retorna_array($sql){
            $this->db->Query($sql);
            $this->total_atual = $this->db->RowCount();
            $comentarios = array();            
            while ($row = mysqli_fetch_array($this->db->last_result,MYSQLI_ASSOC)) {
                if($row['USUARIO_TIPO'] == 0){
                    if($row['USUARIO_IMAGEM'] == ''){
                        $row['USUARIO_IMAGEM'] = IMAGEM_ANONIMO;
                    }else{
                        $row['USUARIO_IMAGEM'] = ROOT_URL.'view/img/uploads/'.$row['USUARIO_IMAGEM'];
                    }
                }
                
                if($row['USUARIO_IMAGEM'] == ''){
                        $row['USUARIO_IMAGEM'] = IMAGEM_ANONIMO;
                }
                
                $comentarios[]  =  $row;
            }                 
            return $comentarios;                              
        }  

}