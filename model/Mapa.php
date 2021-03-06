<?php
include_once(ROOT."model/db_classe.php");
include_once(ROOT."model/Item.php");
include_once(ROOT."model/Categoria.php");




class Mapa {
    public $item;
    public $cat;
    public $cats_atuais;
    
  
    public function __construct() {
         $this->item = New Item();      
         $this->cat = New Categoria();
         
    }
     
     
    function carregar_categoria(){
    
    }

    function carregar_tudo($limit = -1,&$items){
       
        // todas categorias , mas apenas com localizacao (param true)
        $this->cats_atuais = $this->cat->lista_cats(-1,true);
        
        $total_cats  = count($this->cats_atuais);          
        //inicializar contadores   
        $contador_cats = 1;
        $contador_items = 1;
        $items = array();
        $items_atual = array();
        //rodar todas as categorias
        foreach($this->cats_atuais as $cat){ 
          
            //carregar todos items da categoria atual do loop            
            $items_atual = $this->item->lista_items('',$cat['CATEGORIA_CDG'],-1,true,$limit);
            $items  = array_merge($items,$items_atual);
            
            $total_items  = count($items);
            
            if (empty($items_atual))
                continue;
            
            //insere nome da categoria
            echo  "'".$cat['CATEGORIA_NOME']."': [";

            //loop nos itens
            foreach($items_atual as $i){
               echo '{';
               echo " cdg: '". str_replace("'","\'", $i['ITEM_CDG'])."',";
               echo " name: '". str_replace("'","\'", $i['ITEM_NOME'])."',";
               echo " location_latitude: ".str_replace(",",".", $i['ITEM_LAT']).',';
               echo ' location_longitude: '.str_replace(",",".", $i['ITEM_LONG']).',';
               if('item-padrao.jpg' != trim($i['ITEM_IMAGEM'])){
                   echo " map_image_url: '".ROOT_URL.'view/img/uploads/mini/'.$i['ITEM_IMAGEM']."',";
               }else{
                   echo " map_image_url: '',";
               }                   
               if (file_exists(ROOT.'view/img/icon/'.$i['CATEGORIA_ICONE'])) 
               echo " map_icon_url: '".ROOT_URL.'view/img/icon/'.$i['CATEGORIA_ICONE']."',";
               echo " name_point: '".str_replace("'","\'",$i['ITEM_NOME'])."'   ,";
               //echo ' description_point: '.$i['ITEM_DESCRICAO'].',';
               echo " description_point: '".$i['ITEM_TELEFONE']."',";
               echo " url: '".$i['ITEM_URL'],"'}";
               //colocar virgula se é antes do ultimo
               if($contador_items < $total_items){
                   echo ",";
               }else{
                   //se nao , é o ultimo, apenas zera o contador e nao incrementa mais
                   $contador_items = 1;
                   continue;
               }
               //incrementa contador de item
               $contador_items++;
            }
            echo "]"; // fim categoria
            
            // se é menor q total de cats, nao é a ultima categoria , entao coloca virgula
            if($contador_cats < $total_cats){
                echo ",";                         
            }else{
                $contador_cats = 1;
                continue;                
            }
                        
            //incrementa contador de cats
            $contador_cats++;
        }
    }


function carregar_busca($busca,$categoria,$categoria_url,$bairro,&$items,$só_com_imagens = false){
    $contador_items = 1;
    //se nao tem catcdg entao tenta caturl, senao tiver url tambem, é -1
    $categoria = $categoria == -1 ?  $this->cat->getCategoriaCDG($categoria_url) : $categoria; 
  
    $items = $this->item->lista_items($busca,$categoria,$bairro,true,-1,$só_com_imagens);
    
    
    $total_items  = count($items);
    echo  "'".'BUSCA'."': [";
    //loop nos itens
    foreach($items as $i){
       echo '{';
       echo " cdg: '". str_replace("'","\'", $i['ITEM_CDG'])."',";
       echo " name: '". str_replace("'","\'", $i['ITEM_NOME'])."',";
       echo " location_latitude: ".str_replace(",",".", $i['ITEM_LAT']).',';
       echo ' location_longitude: '.str_replace(",",".", $i['ITEM_LONG']).',';
       if('item-padrao.jpg' != trim($i['ITEM_IMAGEM'])){
           echo " map_image_url: '".ROOT_URL.'view/img/uploads/mini/'.$i['ITEM_IMAGEM']."',";
       }else{
           echo " map_image_url: '',";
       }                   
       if (file_exists(ROOT.'view/img/icon/'.$i['CATEGORIA_ICONE'])) 
            echo " map_icon_url: '".ROOT_URL.'view/img/icon/'.$i['CATEGORIA_ICONE']."',";
       echo " name_point: '".str_replace("'","\'",$i['ITEM_NOME'])."'   ,";
       //echo ' description_point: '.$i['ITEM_DESCRICAO'].',';
       echo " description_point: '".$i['ITEM_TELEFONE']."',";
       echo " url: '".$i['ITEM_URL'],"'}";
       //colocar virgula se é menor que o ultimo
       if($contador_items < $total_items){
           echo ",";
       }else{
           //se nao , apenas zera o contador e nao incrementa mais
           $contador_items = 1;
           continue;
       }
       //incrementa contador de item
       $contador_items++;
    }
    echo "]"; // fim categoria BUSCA
       
}

function gerar_markersdata($palavra_busca,$categoria,$categoria_url,$bairro,$limit,&$itens_do_mapa){    
    if(( $palavra_busca == '' ) && ($categoria == -1 ) && ($categoria_url == '-1' ) && ($bairro == -1)){               
       //$this->carregar_tudo($limit,$itens_do_mapa);
      $this->carregar_busca($palavra_busca,$categoria,$categoria_url,$bairro,$itens_do_mapa,true);
    }else{
        $this->carregar_busca($palavra_busca,$categoria,$categoria_url,$bairro,$itens_do_mapa);
    }             
}

}