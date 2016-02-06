<?php
include_once(ROOT."model/db_classe.php");


class Noticia extends Classe{
    
    public $noticia_cdg;
    public $titulo;
    public $texto;
    public $imagem;
    public $imagem_preview;
    public $imagem_url;
    public $resumo;
    public $data;
    public $data_eua;
    public $criador;
    public $publicado;
    public $carregado; 
    public $noticia_url_solicitada;
    
    public function __construct($noticia_cdg = null,$noticia_url = null) {
        parent::__construct($noticia_cdg);
        $this->carregado = false;           
        $this->noticia_url_solicitada = isset($noticia_url) ? $noticia_url : '-1';        
        $this->noticia_cdg = isset($noticia_cdg)  ? $noticia_cdg :  -1; 
        if(($this->noticia_cdg != -1) || ($this->noticia_url_solicitada != '-1')){            
            $this->carregar_noticia();
        }
    }
    
    function carregar_noticia(){
        $this->db->Query(" SELECT NOTICIA_CDG,       NOTICIA_TITULO,    NOTICIA_TEXTO, 
                                  NOTICIA_RESUMO,    NOTICIA_CATEGORIA, NOTICIA_IMAGEM,
                                  DATE_FORMAT(COALESCE(NOTICIA_DATA,CURRENT_DATE),'%d/%m/%Y') AS NOTICIA_DATA, 
                                  DATE_FORMAT(COALESCE(NOTICIA_DATA,CURRENT_DATE),'%Y/%m/%d') AS NOTICIA_DATA_EUA, 
                                  CONCAT(SUBSTRING(NOTICIA_TEXTO,1,199),'...') AS RESUMO,
                                  CATNOTICIA_NOME,   USUARIO_NOME AS CRIADOR,
                                  NOTICIA_IMAGEMURL, NOTICIA_IMAGEMPREVIEW,
                                  NOTICIA_PUBLICADO, NOTICIA_URL
                            FROM NOTICIA 
                            LEFT JOIN CATEGORIA_NOTICIA ON CATNOTICIA_CDG = NOTICIA_CATEGORIA
                            LEFT JOIN USUARIO ON USUARIO_CDG = NOTICIA_CRIADOR
                            WHERE NOTICIA_CDG = ".$this->noticia_cdg."
                            OR NOTICIA_URL = '".$this->noticia_url_solicitada."'");
        $this->db->MoveFirst();
        if($this->db->RowCount() > 0){
            $row =  $this->db->Row();
            $this->noticia_cdg = $row->NOTICIA_CDG;
            $this->titulo = $row->NOTICIA_TITULO;           
            $this->url = $row->NOTICIA_URL;
            $this->texto = htmlspecialchars_decode($row->NOTICIA_TEXTO);
            $this->imagem = $row->NOTICIA_IMAGEM;
         
            if(!isset($row->NOTICIA_IMAGEMPREVIEW))
                $this->imagem_preview = $row->NOTICIA_IMAGEM;
            else
                $this->imagem_preview = $row->NOTICIA_IMAGEMPREVIEW;
            $this->imagem_url = $row->NOTICIA_IMAGEMURL;           
            $this->data = $row->NOTICIA_DATA;
            $this->data_eua = $row->NOTICIA_DATA_EUA;
            $this->categoria = $row->CATNOTICIA_NOME;
            $this->resumo = $row->NOTICIA_RESUMO;
            $this->criador = $row->CRIADOR;
            $this->publicado = $row->NOTICIA_PUBLICADO;     
            $this->carregado = true;
        }
    }
    
    
    public function lista_noticias($filtro_nome,$limit= -1,$cat_cdg = -1,$publicado = true){
        $sql = " SELECT NOTICIA_CDG, NOTICIA_TITULO, NOTICIA_TEXTO, NOTICIA_DATA AS NOTICIA_DATA_RAW,
                        DATE_FORMAT(NOTICIA_DATA,'%d/%m/%Y') AS NOTICIA_DATA , NOTICIA_CATEGORIA ,NOTICIA_IMAGEM,
                        NOTICIA_RESUMO, (COUNT(NOTCOMENTARIO_NOTICIA)) AS TOTAL_COMENTARIOS,
                        NOTICIA_IMAGEMURL, NOTICIA_IMAGEMPREVIEW, NOTICIA_URL
                 FROM NOTICIA
                 LEFT JOIN CATEGORIA_NOTICIA ON CATNOTICIA_CDG = NOTICIA_CATEGORIA
                 LEFT JOIN NOTICIA_COMENTARIO ON NOTCOMENTARIO_NOTICIA = NOTICIA_CDG
                 WHERE (1=1) "; 
        
        // filtrar por uma categoria
        if($publicado){
            $sql = $sql . ' AND NOTICIA_PUBLICADO = 1 ';
        }
        
        // filtrar por uma categoria
        if($cat_cdg != -1){
            $sql = $sql . ' AND NOTICIA_CATEGORIA = '.$cat_cdg.' ';
        }
        
        
        if($filtro_nome != ''){
             $sql = $sql . " AND NOTICIA_TITULO LIKE '%".$filtro_nome."%' ";
        }
        
        //ordenar por item_cdg
        $sql = $sql . "  GROUP BY NOTICIA_CDG
                 ORDER BY  NOTICIA_DATA_RAW  DESC ";

        $sql = $sql . $limit;
        
        return $this->retorna_array($sql);               
    }
    
    
     private function retorna_array($sql){
        
        $this->db->Query($sql);

        while ($row = mysqli_fetch_array($this->db->last_result,MYSQLI_ASSOC)) {                         
            $row['NOTICIA_RESUMO'] = htmlspecialchars_decode($row['NOTICIA_RESUMO']);
            if(!isset($row['NOTICIA_IMAGEMPREVIEW']))
                $row['NOTICIA_IMAGEMPREVIEW'] = $row['NOTICIA_IMAGEM'];
            
            //montar link da imagem de preview 
            if(!isset($row['NOTICIA_IMAGEMPREVIEW'])){
                if(!isset($row['NOTICIA_IMAGEM']))
                    $row['NOTICIA_IMAGEMPREVIEW'] = $row['NOTICIA_IMAGEMURL'];
                else
                    $row['NOTICIA_IMAGEMPREVIEW'] = ROOT_URL.'view/img/uploads/'.$row['NOTICIA_IMAGEM'];         
            }else {
                $row['NOTICIA_IMAGEMPREVIEW'] = ROOT_URL.'view/img/uploads/'.$row['NOTICIA_IMAGEMPREVIEW'];
            }

            $items[]  =  $row;            
        }
        
        $resultado = isset($items) ? $items : array();            
        return $resultado;
    }            
    
    
    //gravar , update ou insert na tabela ATIVDADE
    function gravar($noticia_cdg,$titulo,$url,$texto, $resumo, 
            $imagem = null,
            $imagem_preview = null , 
            $imagem_url = null,
            $data,
            $publicado){
        
        // valores a serem inseridos ou alterados
       if(isset($imagem))        
           $valores["NOTICIA_IMAGEM"]  = MySQL::SQLValue($imagem, MySQL::SQLVALUE_TEXT);       
       if(isset($imagem_preview))
           $valores["NOTICIA_IMAGEMPREVIEW"]  = MySQL::SQLValue($imagem_preview, MySQL::SQLVALUE_TEXT);       
       if(isset($imagem_url)){           
           $valores["NOTICIA_IMAGEMURL"]  = MySQL::SQLValue($imagem_url, MySQL::SQLVALUE_TEXT);                     
       }
       $valores["NOTICIA_TITULO"] = MySQL::SQLValue($titulo, MySQL::SQLVALUE_TEXT);
       $valores["NOTICIA_URL"] = MySQL::SQLValue($url, MySQL::SQLVALUE_TEXT);
       $valores["NOTICIA_TEXTO"]  = MySQL::SQLValue($texto, MySQL::SQLVALUE_TEXT);
       if($resumo != '') 
           $valores["NOTICIA_RESUMO"]  = MySQL::SQLValue($resumo, MySQL::SQLVALUE_TEXT);
       else
           $valores["NOTICIA_RESUMO"]  = MySQL::SQLValue(substr($texto,0,200), MySQL::SQLVALUE_TEXT);
       $valores["NOTICIA_DATA"]  = MySQL::SQLValue($data, MySQL::SQLVALUE_DATE);
       $valores["NOTICIA_PUBLICADO"]  = MySQL::SQLValue($publicado, MySQL::SQLVALUE_BIT);

        //consultar se ja existe
        $this->db->Query(" SELECT NOTICIA_CDG FROM NOTICIA  WHERE NOTICIA_CDG = ".  $noticia_cdg);
        $this->db->MoveFirst();		


        // se  ja existe
        if($this->db->RowCount() > 0){               
            // update      
            
            $where["NOTICIA_CDG"]  = MySQL::SQLValue($noticia_cdg, MySQL::SQLVALUE_NUMBER);                
            $this->db->UpdateRows("NOTICIA", $valores, $where);
            return -1; 
        }else{
            // se nao, executa insert                                   
            //$valores["ITEM_CRIADOR"]  = MySQL::SQLValue($criador, MySQL::SQLVALUE_TEXT);                                
            $this->db->InsertRow("NOTICIA", $valores);
            return $this->db->GetLastInsertID();
        }

    }
    
    public function adicionar_view($noticia_cdg = -1){
           $noticia_cdg =  $noticia_cdg == -1 ? $this->noticia_cdg : $noticia_cdg;           
           $this->db->Query(' UPDATE NOTICIA SET NOTICIA_VIEW = NOTICIA_VIEW + 1 
                      WHERE NOTICIA_CDG = '.$noticia_cdg);
    }
    
    
    public function montar_link_imagem(){
        //montar link da imagem de preview 
         if(!isset($this->imagem_preview)){
            if(!isset($this->imagem))
                $imagem_preview_link_completo = $this->imagem_url;
            else
                $imagem_preview_link_completo = ROOT_URL.'view/img/uploads/'.$this->imagem;
        }else {
            $imagem_preview_link_completo = ROOT_URL.'view/img/uploads/'.$this->imagem_preview;
        }

        if($this->imagem != '')
            return ROOT_URL.'view/img/uploads/'.$this->imagem;
        else
            return  $imagem_preview_link_completo ;
    }
}