

 
<div id="over_map_right" >
    <?php foreach($itens_do_mapa as $i) {
        echo '<div class="item">                ';
        echo '<a href="'.ROOT_URL.'lugares/'.$i['ITEM_URL'].'">';
        echo '    <img src="'.ROOT_URL.'view/img/uploads/mini/'.$i['ITEM_IMAGEM'].'" alt="'.$i['ITEM_NOME'].'">';
        echo '        </a>';
        echo '        <div class="conteudo_list">';
        echo '            <h4><a href="'.ROOT_URL.'lugares/'.$i['ITEM_URL'].'"> '.$i['ITEM_NOME'].' </a></h4>';
        if(trim($i['ITEM_TELEFONE']) != ''){
            echo '            <span>Tel:'.$i['ITEM_TELEFONE'].'</span><br>';
        }
        
        echo '            ';
        echo '            <a href="#" class="comm"><i class="fa fa-comment-o"></i>';
        echo '                '.$i['BAIRRO_NOME'].'  ';
        echo '            </a>                      ';
        echo '        </div>';
        echo ' </div>';
    }?>

 </div>
    
    
    