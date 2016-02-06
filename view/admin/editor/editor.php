<?php
 include '../../../config.php';
 include ROOT.'model/Noticia.php';
 
 $noticia_cdg = isset($_GET['n'])  ?  $_GET['n'] : -1; 
 $status_msg = isset($_GET['s'])  ?  $_GET['s'] : '-1'; 
 
 $noticia = New Noticia($noticia_cdg);
 
 //montar link da imagem de preview 
 if(!isset($noticia->imagem_preview)){
    if(!isset($noticia->imagem))
        $imagem_preview_link_completo = $noticia->imagem_url;
    else
        $imagem_preview_link_completo = ROOT_URL.'view/img/uploads/'.$noticia->imagem;
}else {
    $imagem_preview_link_completo = ROOT_URL.'view/img/uploads/'.$noticia->imagem_preview;
}

if($noticia->imagem != '')
    $imagem_link_completo = ROOT_URL.'view/img/uploads/'.$noticia->imagem;
else
    $imagem_link_completo = $imagem_preview_link_completo ;


?>
<html>

<head>
	<meta charset="utf-8">
	<title>Editar Notícia</title>


	<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
	
	<script src="js/editor.js"></script>
	<script src="js/jquery.js"></script>
	<link href="css/editor.css" rel="stylesheet">
        <link href="<?php echo ROOT_URL ?>view/css/admin.css" rel="stylesheet">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
         <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<style>

		#editable
		{
			padding: 10px;
			float: left;
		}

	</style>
	<script>

		CKEDITOR.disableAutoInline = true;
                CKEDITOR.config.height = 500;
                
		$( document ).ready( function() {
                     $('#editor1').attr('rows', '40');
			$( '#editor1' ).ckeditor(); // Use CKEDITOR.replace() if element is <textarea>.
			//$/( '#editable' ).ckeditor(); // Use CKEDITOR.inline().
                       document.getElementById("editor1").style.height = "550px"; 
                       
                          
		} );
                
                
                                       
                   
                 


		function setValue() {
			$( '#editor1' ).val( $( 'input#val' ).val() );
		}

	</script>
        <script>
        $(function() {
            $( "#datepicker" ).datepicker({dateFormat: "dd/mm/yy"});
        });
        </script>
</head>


<body>
  <form action="<?php echo ROOT_URL ?>control/noticia/salvar_editor.php" method="post" enctype="multipart/form-data">	
      <div id="corpo" class="bordas esquerda">         
      <?php                                      
                if($status_msg == 's'){
                    echo '<span class="esquerda status_ok">';
                    echo 'Salvo.';
                    echo '</span>';
                }                
       ?>
 

                <input type="hidden" name="noticia"  value='<?php echo $noticia_cdg?>' />
                <span class="esquerda"><strong>Notícia</strong>: <?php echo $noticia_cdg?> <br></left></span><br>
                <span class="esquerda"><strong>Titulo</strong>:
                <input class="campo titulo" name="titulo" type="text" value="<?php echo isset($noticia->titulo) ? $noticia->titulo : '' ?>"/></span>
                <br><br>
                <span class="esquerda"><a href="<?php echo ROOT_URL.'control/noticia/post.php?n='.$noticia->noticia_cdg ?>"> Ver Post</a></span>        <strong>Corpo:</strong>
                </p>
                
		<textarea cols="80" id="editor1" name="editor1" rows="4">
			<?php echo isset($noticia->texto) ? $noticia->texto : ''; ?>
		</textarea>

		<p style="overflow: hidden"></p>
                <hr>
                </p>
                        Imagem: <input class="campo titulo" name="imagem_principal" type="text" 
                       value="<?php echo isset($noticia->imagem) ? $noticia->imagem : '' ?>"></input>            
                <p>
                <strong>Imagem Preview:</strong> <input id="imagem_preview" name="imagem_preview" class="campo imagem_preview" type="text" value="<?php echo $noticia->imagem_preview ?>" /> <input type="button" value="seleciona" onClick="abrir()"> <p>
                <strong>Imagem URL:</strong> <input name="imagem_url" type="text" class="campo titulo" value="<?php echo $noticia->imagem_url ?>" /> <p>

                <strong>Alterar Imagem Principal:</strong><input type="file" name="arquivo" /><br>
                <strong>Alterar Imagem Preview:</strong><input type="file" name="arquivo_preview" />

                <p></p>        
                <strong>Resumo:</strong><br>
            <textarea cols="90" id="resumo" name="resumo" rows="6">
    		<?php echo isset($noticia->resumo) ? $noticia->resumo : ''; ?>
            </textarea><p>
            <input type="submit" value="Salvar"/> 
    </div>
      
      
    <div id="menu_lateral" class="direita bordas">
        <p>Data: <input name="data" type="text" id="datepicker" value="<?php echo $noticia->data ?>"></p>
        <input type="checkbox" name="publicado" value="1"
               <?php echo ($noticia->publicado == 1 ? 'checked' : '') ?>  > Publicado <br>
        
    </div>
      
      
    <div id="menu_lateral" class="direita bordas">
        <strong>Imagem Preview</strong><br>
        <img id="img_imagem_preview" src="<?php echo $imagem_preview_link_completo ?>" width="200px" />
        <p>
        <strong>Imagem Principal</strong><br>
        <img src="<?php echo $imagem_link_completo ?>" width="200px" />
        <p>
        <strong>Imagem URL</strong><br>
        <img src="<?php echo $noticia->imagem_url ?>" width="200px" />
    </div>
      
  </form>  
</body>
</html>

<script>
var janela;    
function abrir(){
    quintow = (window.screen.width/5);
    quintoh = (window.screen.height/4);
    janela = window.open("<?php echo ROOT_URL ?>view/galeria/galeria.php?cbc=imagem_preview&cbimg=img_imagem_preview", "Galeria de Imagens", 
        "width="+(window.screen.width-quintow)+", height="+(window.screen.height-quintoh)+", left="+(quintow/2)+", top="+(quintoh/2));
    
}
</script>