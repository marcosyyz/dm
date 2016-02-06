  
        <?php include ROOT.'view/head.php';  ?>       
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:600" type="text/css" rel="stylesheet" />
        <link href="<?php echo ROOT_URL ?>view/js/add_item/estilo.css" type="text/css" rel="stylesheet" />

        <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
        <script type="text/javascript" src="<?php echo ROOT_URL ?>view/js/add_item/jquery.min.js"></script>
       
        <script type="text/javascript" src="<?php echo ROOT_URL ?>view/js/add_item/jquery-ui.custom.min.js"></script>     
    
        <title><?php echo $SEO->getTitle() ?></title>            
   
        <style>
          #status_endereco, #status_nome{
            color:red;
          }
        </style>
          
</head>

   
<body onload="initMap()" class="inner_page innerpage">
    
<div class="bg_parallax" id="inb">

    <?php include ROOT.'view/menu_esquerdo.php'; ?>

    <?php include ROOT.'view/add_local.php'; ?>

    <?php include ROOT.'view/login.php'; ?>

    <div class="site-overlay"></div>

    <div id="container">

    <?php include ROOT.'view/cabecalho_menor.php'; ?>

      
      
      
      
      
      
      
      
      
      
      
      
      <p><br><p><br><p><br><p><br>

<div class="container contant">
<div class="row cont">
  

<!--content-->

    <div style="margin:auto;" class="col-md-9  basic forms "> 
      <form id="form_cadastrar_item" name="form_cadastrar_item" method="post" action="<?php echo ROOT_URL.'control/item/salvar_item.php'?>"  enctype="multipart/form-data">
        <input type="hidden" name="item_cdg" value="<?php echo $item_cdg  ?>"/>
        
        <?php 
        if($item_cdg != -1){
          echo "<br>";
         echo "&nbsp;<a href='".ROOT_URL."control/item/item.php?i=".$Item->item_cdg."' > Ver item no mapa </a>";
        }
        ?>
         
        <label  for='campo-nome'>Nome do Local:<input id="campo-nome" type='text' value="<?php echo $Item->nome ?>" name='campo-nome'/>
        <span id="status_nome" > </span> 
        </label>
        
      <div class="header_section" ">
        <div  class="metade esquerda"">
                    
          <div style="padding:15px 0 0 30px; ">
            <div style="margin-bottom: 7px;"><strong>Imagem Principal:</strong></div>
                <input style="height: 20px; size:20px; " type="file" name="arquivo" /><br>
          </div>
          
          <div style="padding:15px 0 0 30px; ">
            <div style="margin-bottom: 7px;"><strong>Imagem de Capa (opcional):</strong></div>
                <input style="height: 20px; size:20px; " type="file" name="arquivo-capa" /><br>
          </div>
          
          <label  for='campo-cat'>Categoria
            <select  value='' name='campo-cat'/>
            <?php              
              foreach($cats as $c){
                echo "<option ".($c['CATEGORIA_CDG'] == $Item->categoria_cdg ? ' selected="selected" ': '')." value='".$c['CATEGORIA_CDG']."' >".$c['CATEGORIA_NOME']."</option>";
              }
            ?>
            </select>
          </label>
          
          
          <label  for='campo-bairro'>Bairro
            <select  id="campo-bairro" value='' name='campo-bairro'/>
            <?php            
              foreach($bairros as $b){
                echo "<option  ".($b['BAIRRO_CDG'] == $Item->bairro_cdg ? ' selected="selected" ': '')."    value='".$b['BAIRRO_CDG']."'>".$b['BAIRRO_NOME']."</option>";
              }
            ?>
            </select>
            </label>
          
            <label  for='txtEndereco'>Endereço:
                     <input type='text' value="<?php echo $Item->endereco ?>" id="txtEndereco" name="txtEndereco"/>
                     <span id="status_endereco" > </span>
                     <input type="button" id="btnEndereco" name="btnEndereco" value="Localizar no mapa" />
                     
            </label> 
                   
            <div id="mapa"></div> 

            <input style="margin-left:30px" type="hidden" id="txtLatitude" name="campo-lat"  value="<?php echo $Item->lat ?>"/>
            <input style="margin-left:30px" type="hidden" id="txtLongitude" name="campo-long" value="<?php echo $Item->long ?>"/>
                         
            <br>
            
            <label  for='txtEndereco'>Descrição sobre o Local:
              <textarea name="campo-descricao" id="txtArea" rows="10" cols="60"><?php echo $Item->descricao ?></textarea>
              
            </label>
            
            <br>
            
            <label  for='campo-telefone'>Telefone 1:
                     <input type='text' value="<?php echo $Item->telefone ?>" id="campo-telefone" name="campo-telefone" placeholder="Ex.: (11) 9999-9999"/>
            </label> 
            <label  for='campo-telefone2'>Telefone 2:
                     <input type='text' value="<?php echo $Item->telefone2 ?>" id="campo-telefone2" name="campo-telefone2" placeholder="Ex.: (11) 9999-9999"/>
            </label>             
              
            <label  for='campo-email'>E-mail:
                     <input type='text' value="<?php echo $Item->email ?>" id="campo-email" name="campo-email"  placeholder="Ex.: emaildolocal@email.com.br"/>
            </label>    
           
            <label  for='campo-web'>Web:
              <input type='text' value="<?php echo $Item->web ?>" id="campo-web" name="campo-web" placeholder="Ex.: www.site.com.br"/>
            </label>  
            
            <br><br>
                     
            <a style="margin-left: 30px;width: 130px;"href="javascript:form_alterar.submit();" class="btn btn_vermelho">Cancelar</a> 
            <a style="margin-left: 30px; width: 130px;"href="javascript:enviar_submit();" class="btn btn_verde">Salvar</a> 
           
            
          <br><br><br>
           
           
           
        </div> <!-- metade esquerda-->
        <div class="metade direita">
          
          <div style=" position: relative;margin-top:30px; margin-left:30px; width:100%" >
          
            <span style="margin-left: 30px"><strong>Imagem Principal:</strong></span>
            <img style=" width:300px" src="<?php echo ROOT_URL.'view/img/uploads/'.
                   ($Item->imagem !=  '' ? $Item->imagem : 'item-padrao.jpg' ) ?>" id="img-item" />
          
            <p><p><p><p></p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
          
            <span style="margin-left: 30px"><strong>Imagem Capa:</strong></span>
            <img style=" width:350px;" src="<?php echo ROOT_URL.'view/img/uploads/'.
                   ($Item->imagem_capa !=  '' ? $Item->imagem_capa : 'item-padrao.jpg' ) ?>" id="img-item" />
          
          
          </div>
        </div>
      </div>

       
      
      </form>  
    
    </div>
</div>
</div>
      
      
      <script>
        
   var geocoder;
var map;
var marker;

function initialize() {
	var latlng = new google.maps.LatLng(<?php echo ($Item->lat == '' ? '-23.4686739' : $Item->lat ) ?>, <?php echo ($Item->long == '' ? '-46.2494206' : $Item->long ) ?>);
	var options = {
		zoom: 16,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
                scrollwheel:false
	};
	
	map = new google.maps.Map(document.getElementById("mapa"), options);
	
	geocoder = new google.maps.Geocoder();
	
	marker = new google.maps.Marker({
		map: map,
		draggable: true,
	});
	
	marker.setPosition(latlng);
}

$(document).ready(function () {

	initialize();
	
	function carregarNoMapa(endereco) {
		geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {
					var latitude = results[0].geometry.location.lat();
					var longitude = results[0].geometry.location.lng();
		
					$('#txtEndereco').val(results[0].formatted_address);
					$('#txtLatitude').val(latitude);
                   	$('#txtLongitude').val(longitude);
		
					var location = new google.maps.LatLng(latitude, longitude);
					marker.setPosition(location);
					map.setCenter(location);
					map.setZoom(16);
				}
			}
		})
	}
	
	$("#btnEndereco").click(function() {
		if($(this).val() != "")
			carregarNoMapa($("#txtEndereco").val());
	})
	

	
	google.maps.event.addListener(marker, 'drag', function () {
		geocoder.geocode({ 'latLng': marker.getPosition() }, function (results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				if (results[0]) {  
					$('#txtEndereco').val(results[0].formatted_address);
					$('#txtLatitude').val(marker.getPosition().lat());
					$('#txtLongitude').val(marker.getPosition().lng());
				}
			}
		});
	});
	
	$("#txtEndereco").autocomplete({
		source: function (request, response) {
			geocoder.geocode({ 'address': request.term + ', Brasil', 'region': 'BR' }, function (results, status) {
				response($.map(results, function (item) {
					return {
						label: item.formatted_address,
						value: item.formatted_address,
						latitude: item.geometry.location.lat(),
          				longitude: item.geometry.location.lng()
					}
				}));
			})
		},
		select: function (event, ui) {
			$("#txtLatitude").val(ui.item.latitude);
    		$("#txtLongitude").val(ui.item.longitude);
			var location = new google.maps.LatLng(ui.item.latitude, ui.item.longitude);
			marker.setPosition(location);
			map.setCenter(location);
			map.setZoom(16);
		}
	});
	


});
      
      
      
      	function enviar_submit(){
                sair = false;              
		
		
		var endereco = $("#txtEndereco").val();
		var latitude = $("#txtLatitude").val();
		var nome = $("#campo-nome").val();
		
		if(endereco.trim() == '') {
                   $('#status_endereco').html('Preencha o endereço do lugar');
                   sair = true;
                   this.location = "#campo-bairro";
                   $('#status_endereco').fadeIn('slow');
                }else{
                   sair = false;                   
                   $('#status_endereco').fadeOut('slow');
                }
                
                if(latitude.trim() == '') {
                   $('#status_endereco').html('localizade o endereço no mapa.');
                   sair = true;
                   this.location = "#campo-bairro";
                   $('#status_endereco').fadeIn('slow');
                }else{
                   sair = false;                   
                   $('#status_endereco').fadeOut('slow');
                }
                
                if(nome.trim() == '') {
                   $('#status_nome').html('Preencha o nome do local');
                   sair = true;
                   this.location = "#form_cadastrar_item";
                   $('#status_nome').fadeIn('slow');
                }else{
                   sair = false;                   
                   $('#status_nome').fadeOut('slow');
                }
                

                if(!sair){
                  $('#form_cadastrar_item').submit();
                }
	}
        
        
      </script>