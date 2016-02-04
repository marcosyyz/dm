<?php 
include 'config.php';
require ROOT.'model/Item.php';
require ROOT.'model/Categoria.php'; 
include ROOT.'model/SEO.php';
include ROOT.'model/Mapa.php';

$map = New Mapa();
$itens_do_mapa = array();
$Cat = New Categoria();

$status = isset($_GET['s']) ?  $_GET['s'] : -1;

//filtro de categoria
$filtro_categoria = isset($_GET['c']) ?  $_GET['c'] : -1;
$filtro_categoria = $filtro_categoria == '' ? -1 : $filtro_categoria ;
$filtro_categoria = (!is_numeric($filtro_categoria)) ? -1 : $filtro_categoria ;
$filtro_categoria_url = isset($_GET['c_url']) ?  $_GET['c_url'] : '-1';
$filtro_categoria_url = $filtro_categoria_url == '' ? '-1' : $filtro_categoria_url ;
//filtro de bairro
$filtro_bairro = isset($_GET['b']) ?  $_GET['b'] : -1;

//filtro de paavra chave
$filtro_busca     = isset($_POST['filtro_busca']) ?  trim($_POST['filtro_busca']) : '';
if($filtro_busca == '-1') $filtro_busca  = '';

//no index usar parametros padroes de SEO

$SEO = New SEO();         

if(($filtro_categoria != -1) || ($filtro_categoria_url != '-1')){
  if($filtro_categoria_url != '-1'){
    $categoria_nome =  $Cat->getCategoriaNome($Cat->getCategoriaCDG($filtro_categoria_url));
  }else{
    $categoria_nome =  $Cat->getCategoriaNome($filtro_categoria);  
  }
   
 
 
 $SEO->setDescription(' Encontre '.$categoria_nome.' em Mogi das Cruzes, veja endereços, contatos, telefones, dicas e avaliações.');

 
}
    include ROOT.'view/head.php';     
    ?>

    <script type="text/javascript" src="<?php echo ROOT_URL ?>view/js/infobox.js" defer></script>
    <script src="https://apis.google.com/js/platform.js" async="defer"></script> 
       
    <title><?php echo $SEO->getTitle() ?></title>	
    
</head>

<body onload="initialize()" class="indexpage">
    
<?php include ROOT.'view/menu_esquerdo.php'; ?>
    

<?php include ROOT.'view/add_local.php'; ?>

    
<?php include ROOT.'view/login.php'; ?>
    


<div class="site-overlay"></div>

<?php include ROOT.'view/cabecalho.php'; ?>



<!--categori menu-->
<div class="container-fluid menu mobile">
    <div class="row">
        <div class="col-md-12">
            <span>Categoria menu</span>
            <i class="fa fa-times" id="close_menu"></i>
            <ul>
                <li><a href="<?php echo ROOT_URL.'cat/escolas-municipais' ?>" class="shop"><i class="fa fa-graduation-cap"></i><div>Escolas</div></a></li>
                <li><a href="<?php echo ROOT_URL.'cat/comercios' ?>" class="cinema"><i class="fa fa-shopping-cart"></i><div>Comercios</div></a></li>
                <li><a href="<?php echo ROOT_URL.'cat/creches' ?>" class="club"><i class="fa fa-child"></i><div>Creches</div></a></li>
                <li><a href="<?php echo ROOT_URL.'cat/pracas' ?>" class="cafe"><i class="fa fa-tree"></i><div>Praças</div></a></li>
                <li><a href="<?php echo ROOT_URL.'cat/pizzarias' ?>" class="sport"><i class="fa fa-cutlery"></i><div>Pizzas</div></a></li>
                <li><a href="<?php echo ROOT_URL.'cat/padarias' ?>" class="port"><i class="fa fa-coffee"></i><div>Padarias</div></a></li>
                <li><a href="<?php echo ROOT_URL.'cat/postos-policiais-e-delegacias' ?>" class="cap"><i class="fa fa-cab"></i><div>Polícia</div></a></li>
                <li><a href="<?php echo ROOT_URL.'cat/postos-de-combustiveis' ?>" class="post"><i class="fa fa-car"></i><div>Combustivel</div></a></li>
                <li><a href="<?php echo ROOT_URL.'cat/mercados' ?>" class="showplace"><i class="fa fa-cart-plus"></i><div>Mercados</div></a></li>
                <li><a href="<?php echo ROOT_URL.'cat/postos-de-saude' ?>" class="park"><i class="fa fa-medkit"></i><div>Saúde</div></a></li>
                <li class="mobile_menu"><a href="#"><i class="fa fa-bars"></i></a></li>
            </ul>
        </div>
    </div>
</div>


<div id="map" class="map"></div><!--map-->


<!--- SCRIPT FILES FOR MAP--->    
    <?php require ROOT.'view/js/map.php'; ?><!--Map js-->
<?php include ROOT.'view/menulista_direita.php' ?>    
</body>
</html>

<?php if($status == 'a'){  ?>
  <script>       
      
       $('.place_form h3').html(" Você precisa logar no site para cadastrar novos lugares");
       $('.place_form').height(545);
       $('#autorized').removeClass("none");
     
  </script>
<?php } ?>

