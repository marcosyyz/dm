<?php
include '../../config.php';
include ROOT.'model/Item.php';
include ROOT.'model/Categoria.php';
include ROOT.'model/Bairro.php';
include ROOT.'model/SEO.php';


if(!isset($_SESSION['USUARIO_CDG'])){
  header('Location: '.ROOT_URL.'?s=a');
}

//carregar parametros do item
$item_cdg = isset($_GET['i']) ? $_GET['i'] : '-1';
$item_cdg = $item_cdg == '' ? -1 : $item_cdg ;
$item_cdg = !is_numeric($item_cdg) ? -1 : $item_cdg ;

$Cat = New Categoria();
$Bairro = New Bairro(); 
$Item = New Item($item_cdg); 
$SEO = New SEO();



$bairros = $Bairro->lista_bairros();
$cats = $Cat->lista_cats();

require ROOT.'view/item/add_item.php';