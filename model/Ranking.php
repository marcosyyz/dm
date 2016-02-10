<?php
include_once(ROOT."model/db_classe.php");


class Ranking extends Classe{
    
    public $bairro_cdg;
    
    
    public function __construct() {
        parent::__construct();                             
    }
    
    
    
    public function lista_ranking_usuarios($limit = 5){
            // join com itens para saber a quantidade exata de itens em cada categoria
            $sql = ' SELECT USUARIO_CDG, USUARIO_NOME , COALESCE(USUARIO_IMAGEM,"") AS USUARIO_IMAGEM,
                           USUARIO_TIPO,
                           COUNT(ITEM_CDG) AS CADASTROS,
                           (SELECT COUNT(ITEMCOMENTARIO_ITEM) FROM ITEM_COMENTARIO
                                     WHERE ITEMCOMENTARIO_USUARIO = USUARIO_CDG) AS AVALIACOES,                 
                           (
                              (COUNT(ITEM_CDG) * 3) + (SELECT COUNT(ITEMCOMENTARIO_ITEM) FROM ITEM_COMENTARIO
                                     WHERE ITEMCOMENTARIO_USUARIO = USUARIO_CDG )
                            ) AS PONTOS
                     FROM USUARIO
                        LEFT JOIN ITEM ON ITEM_CRIADOR = USUARIO_CDG
                     WHERE USUARIO_CDG <> 1
                     GROUP BY USUARIO_CDG
                     ORDER BY PONTOS DESC 
                     LIMIT '.$limit;
                      
                     
                                  
            $result = $this->db->Query($sql);
                        
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
                
                $cats[]  =  $row;
            }            
            return $cats;
        }
        
        

}

