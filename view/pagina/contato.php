    <?php include ROOT.'view/head.php';  ?>      
    <link rel="stylesheet" href="<?php echo ROOT_URL.'view/css/contato.css' ?>" media="all" />
    
    <title><?php echo $SEO->getTitle() ?></title>
</head>
    <title>Notícias de Mogi das Cruzes - Diretório Mogi </title>

    <?php include ROOT.'view/template_pagina.php' ?>

<!--content-->
<div class="col-md-12 basic" >   
<br>
			
<div class="container">
    <div class="row">

<h2>Mande suas sugestões, dúvidas ou reclamações</h2>
<p>pelo perfil do <a title="https://www.facebook.com/diretoriomogi" href="https://www.facebook.com/diretoriomogi" target="_blank">Facebook de Mogi das Cruzes</a>,</p>
<p>pela  <a title="http://facebook.com/guiadiretoriomogi" href="http://facebook.com/guiadiretoriomogi" target="_blank">FanPage Diretório Mogi</a>,</p>
<p>Ou envie sua mensagem:</p>

  <h2>Formulário de contato</h2>
    <form name="formContato" method="post" onsubmit="validaForm(); return false;" class="form">
    <p class="name">
        <label  for="nome">Nome</label>
        <input id="nome" name="nome" type="text" placeholder="Seu Nome" />
    </p>
    <p class="email">
        <label  for="email">E-mail</label>
        <input id="email" name="email" type="text" placeholder="mail@exemplo.com.br" />
    </p>
    <p class="text">
        <label  for="mensagem">Mensagem</label>
        <textarea id="mensagem" name="mensagem" placeholder="Escreva sua mensagem" /></textarea>
    </p>
    <p class="submit">
        <input type="submit" value="Enviar" name="enviar" />
    </p>
    </form>
  
  
 
  <script type="text/javascript">
            $(document).ready( function() {
				//alert('Seja bem Vindo');
                $("#formContato").validate({
                    // Define as regras
                    rules:{
                        txtNome:{
                            // será obrigatorio (required) e terá tamanho minimo (minLength)
                            required: true, minlength: 2
                        },
                        txtEmail:{
                           // será obrigatorio (required) e tem que ser um e-mail válido (email)
                            required: true, email: true
                        },
                        txtMensagem:{
                            // será obrigatorio (required) e terá tamanho minimo (minLength)
                            required: true, minlength: 5
                        }
                    },
                    // Mensagens de erro para cada regra
                    messages:{
                    txtNome:{
								ired: "Digite o seu nome.",
                            minlength: "O seu nome deve conter, no mínimo 2 caracteres."
                        },
                        txtEmail:{
                          required: "Digite o seu e-mail para contato.",
                            email: "Digite um e-mail válido."
                  },
                        txtMensagem:{
                            required: "Digite a sua mensagem.",
                            minlength: "A sua mensagem deve conter, no mínimo 5 caracteres."
                        }
                    }
               });
            });
        </script>
 
 
 
 <?php

//      Formulário
// =================================================== //

// campos
if (isset($_POST['enviar'])){
$data                   = date("d/m/Y - H:i");
$nome                   = $_POST['nome'];
$email                  = $_POST['email'];
$info                   = $_POST['mensagem'];

//      Email que chega até você
// =================================================== //


$para           = "marcos@diretoriomogi.com.br";
$assunto        = "Contato de $nome";
$header         = "
<b>Nome:</b>    $nome <br>
<b>Email:</b>   $email<br>
<br><br>
<b>Mensagem:</b><br>
$info
<br><br>

==============================================<br>
        $data <br>
==============================================<br>
";

// Função HTML :)
$headers = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html;charset=iso-8859-1\r\n";
$headers .= "From: Site Infoparty <contato@infoparty.com.br>\r\n";

// Envia para você
if (mail($para, $assunto, $header, $headers)){
        echo "<script>alert (' seu email foi enviado com sucesso!')</script>";
	}
  	else{
		echo "</b>Falha no envio do E-Mail!</b>";
	}


}
?>