<?php
include '../../config.php';
    	include ROOT.'view/wide/demo/helpers/common.php';
	require_once ROOT.'view/wide/lib/WideImage.php';
// File and new size
$filename = ROOT.'view/img/uploads/111220151517513_obj4.jpg';

$image = WideImage::load($filename);

if($image->getWidth() > $image->getHeight()){
    $inicio_corte = ($image->getWidth() - $image->getHeight()) / 2;
    $image = $image->resizeCanvas($image->getHeight(),$image->getHeight(),-$inicio_corte,0);
}
if($image->getHeight() > $image->getWidth()){
    $inicio_corte = ($image->getHeight() - $image->getWidth()) / 2;
    $image = $image->resizeCanvas($image->getWidth(),$image->getWidth(),0,-$inicio_corte);
}

$image->saveToFile(ROOT.'view/img/uploads/111220151517513_obj4.jpg');

//WideImage::load('111220151517513_obj4.jpg')->resize(50, 30)->saveToFile('small.jpg');