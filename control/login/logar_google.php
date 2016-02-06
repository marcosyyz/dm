<?php
//CHAMADO POR AJAX
include '../../config.php';
include ROOT.'model/Login.php';

$Login = new Login('','',$imagem_anonimo);
$Login->logar_google(
            $_POST['id'],
             '', //login
             '', //senha
            $_POST['nome'],
            $_POST['imagem'],
            $_POST['email'] 
        );






