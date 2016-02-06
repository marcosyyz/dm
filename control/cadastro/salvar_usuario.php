<?php
include '../../config.php';
include ROOT.'model/Usuario.php';
 

$Usuario = New Usuario();

$usuario_cdg = isset($_POST['usuario_cdg']) ? $_POST['usuario_cdg'] : -1;
$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$login = isset($_POST['login']) ? $_POST['login'] : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';


$Usuario->gravar($usuario_cdg,
                    $nome,
                    $login,
                    $senha,
                    '',
                    $email,
                    null,
                    null,
                    null
                );


header('Location: '.ROOT_URL.'control/login/login.php?s=1');


