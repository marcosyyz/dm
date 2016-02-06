<?php
    header("HTTP/1.0 404 Not Found");
  
    include_once '../config.php';
    include ROOT.'model/SEO.php';

     //$item_cdg = isset($_GET['i']) ? $_GET['i'] : '-1' ;


    $SEO = New SEO();
  
    
    require ROOT.'view/404.php';