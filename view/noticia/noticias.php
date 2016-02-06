<?php
    include ROOT.'view/head.php';
    
?>
<title><?php echo $SEO->getTitle() ?></title>
</head>


<body class="inner_page innerpage">
    <div class="bg_parallax" id="inb">
    <?php include ROOT.'view/menu_esquerdo.php'; ?>    
    <?php include ROOT.'view/login.php'; ?>
    <div class="site-overlay"></div>
    <div id="container">
    <?php include ROOT.'view/cabecalho_menor.php'; ?>
        
    <div class="container page_info">
        <div class="col_md_12">
            <h1>Notícias de Mogi das Cruzes e região</h1>
        </div>
    </div>
    <div class="container contant">
        <div class="row cont">
            <!-- Left column-->
            <div class="col-md-3 mobile_none sidebar">
                <div class="affix-top" id="myAffix" data-spy="affix" data-offset-top="30" data-offset-bottom="20">
                    <ul class="places_cat">
                        <li><a><strong>Mais pesquisados...</strong></a></li>
                        <li><a href="<?php echo ROOT_URL.'index.php?c=254' ?>" class="shop"><i class="fa fa-heartbeat"></i>Postos de saúde</a></li>                            
                        <li><a href="<?php echo ROOT_URL.'index.php?c=223' ?>" class="cafe"><i class="fa fa-hand-o-right"></i>Escolas Públicas</a></li>
                        <li><a href="<?php echo ROOT_URL.'index.php?c=12' ?>" class="sport"><i class="fa fa-university"></i>Postos Policiais</a></li>
                        <li><a href="<?php echo ROOT_URL.'index.php?c=133' ?>" class="port"><i class="fa fa-fire"></i>Bombeiros</a></li>
                        <li><a href="<?php echo ROOT_URL.'index.php?c=174' ?>" class="bank"><i class="fa fa-car"></i>Postos de Combustiveis</a></li>
                        <li><a href="<?php echo ROOT_URL.'telefones-uteis'?>" class="post"><i class="fa fa-phone"></i>Telefones úteis</a></li>
                        <li><a href="<?php echo ROOT_URL.'telefones-prefeitura'?>" class="showplace"><i class="fa fa-phone"></i>Telefones Prefeitura</a></li>
                        <li><a href="<?php echo ROOT_URL.'horarios-trem-expresso-leste'?>" class="park"><i class="fa fa-leaf"></i>Horários Expresso Leste</a></li>
                    </ul>
                    <div class="tag">
                        <h3>Tag</h3>
                        <ul>
                          <li><a href="#">Cidade</a></li>
                           <li><a href="#">Eventos</a></li>
                            <li><a href="#">Emprego</a></li>
                        </ul>
                    </div>
                </div>
            </div>


            <!--content-->
            <div class="col-md-9 basic">
                <div class="place_li_cont">


                <?php 
                foreach ($noticias as $n){
                    $link_noticia = ROOT_URL.'noticia/'.$n['NOTICIA_URL'];
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


                
                    <div id="results"></div>
                    <a href="#" class="more_btn load_more" id="load_more_button">Mais Notícias...</a>                                                  
                </div>   
            </div>
        </div>
    </div>
</div>
</div>



<!--
#################################
- SCRIPT FILES -
#################################
-->

    
<script type="text/javascript">
"use strict";
$('#myAffix').affix({
offset: {
top: 300,
bottom: function () {
return (this.bottom = $('.footer').outerHeight(true))
}
}
})
</script>

<script type="text/javascript">
"use strict";
$('#inb').parallax({
'elements': [
{
'selector': '#inb',
'properties': {
'x': {
'background-position-x': {
'initial': 0,
'multiplier': 0.03,
'invert': true
}
},
'y': {
'background-position-y': {
'initial': 30,
'multiplier': 0.03,
'invert': true
}
}
}
}
]
});
</script>

<script type="text/javascript">
$(document).ready(function() {
   
	var track_click = 0; //track user click on "load more" button, righ now it is 0 click
	
	var total_pages = <?php echo $total_pages; ?>;
	$('#results').load("fetch_pages.php", {'page':track_click}, function() {track_click++;}); //initial data to load

	$(".load_more").click(function (e) { //user clicks on button
	
		$(this).hide(); //hide load more button on click
		$('.animation_image').show(); //show loading image

		if(track_click <= total_pages) //make sure user clicks are still less than total pages
		{
			//post page number and load returned data into result element
			$.post('<?php echo ROOT_URL.'control/noticia/mais_noticias.php'?>',{'page': track_click,
                                                    'caminho_imagem':'<?php echo $n['NOTICIA_IMAGEMPREVIEW'] ?>',
                                                    'filtro_busca' : '<?php echo $filtro_noticia ?>'
                                                    }, function(data) {
			
				$(".load_more").show(); //bring back load more button
				
				$("#results").append(data); //append data received from server
				
				//scroll page to button element
				$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
				
				//hide loading image
				$('.animation_image').hide(); //hide loading image once data is received
	
				track_click++; //user click increment on load button
                                if(data == '')
                                     $(".load_more").hide(); 
			
			}).fail(function(xhr, ajaxOptions, thrownError) { 
				alert(thrownError); //alert any HTTP error
				$(".load_more").show(); //bring back load more button
				$('.animation_image').hide(); //hide loading image once data is received
			});
			
			
			if(track_click >= total_pages-1)
			{
				//reached end of the page yet? disable load button
				$(".load_more").attr("disabled", "disabled");
			}
		 }
		  
		});
});
</script>
</body>
</html>