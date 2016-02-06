<?php
include("../../config.php"); //include config file
include ROOT.'model/Noticia.php';

$numero_paginas_rodadas = filter_var($_POST["page"], FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
$caminho_completo_imagem = $_POST["caminho_imagem"];
$filtro_noticia  = isset($_POST['filtro_busca']) ? $_POST['filtro_busca'] : '';

//throw HTTP error if page number is not valid
if(!is_numeric($numero_paginas_rodadas)){
	header('HTTP/1.1 500 Invalid page number!');
	exit();
}
$posicao = ($numero_paginas_rodadas * 5);

$Noticia = New Noticia();
$noticias = $Noticia->lista_noticias($filtro_noticia,' LIMIT '.$posicao.',5');


     
                foreach ($noticias as $n){
                    $link_noticia = ROOT_URL.'control/noticia/post.php?n='.$n['NOTICIA_CDG'];
                    echo '<div class="pg style_list">';
                    echo '<div class="con">';
                    echo '<a href="'.$link_noticia.'"><img src="'.$n['NOTICIA_IMAGEMPREVIEW'].'" alt=""></a>';
                    echo '<div class="content_li">';
                    echo '<h2><a href="'.$link_noticia.'">'.$n['NOTICIA_TITULO'].'</a><span></span></h2>';
                    echo '<span> '.$n['NOTICIA_RESUMO'].'...<a href="'.$link_noticia.'">ver mais...</a></span>';
                    echo '<br><a href="#" class="comm"><i class="fa fa-comment-o"></i>'.$n['TOTAL_COMENTARIOS'].' '.($n['TOTAL_COMENTARIOS'] > 1 ? 'Comentários' : 'Comentário').'</a>';
                    echo '<a href="#">&nbsp;&nbsp;&nbsp;'
                    . '&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar"></i>&nbsp;&nbsp;&nbsp;'.$n['NOTICIA_DATA'].'</a>';
                    echo '</div>'; 
                    echo '</div>';
                    echo '</div>';
                }
              



?>