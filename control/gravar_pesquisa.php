<?php


if(!isset($db_pesquisa))
    $db_pesquisa = New MySQL();

$db_pesquisa->Query(" INSERT INTO PESQUISA(PESQUISA_PALAVRA) VALUES('".$filtro_busca."'); ");
$db_pesquisa->Close();