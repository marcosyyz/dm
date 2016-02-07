        <?php include ROOT.'view/head.php';  ?>       
        <title><?php echo $SEO->getTitle() ?></title>
    </head>

    <?php include ROOT.'view/inc/template_pagina.php';?>

    
    
<div class="tela_login forms place_form ">
    <form name="form_cadastrar" method="post" action="<?php echo ROOT_URL.'control/cadastro/salvar_usuario.php'?>">
            <label>Nome Completo:<input name="nome" type="text"></label>
            <label>Login:<input name="login" type="text"></label>
            <label>Senha:<input name="senha" type="password"></label>
            <label>Confirmação de Senha:<input type="password"></label>
            <label>E-mail:<input name="email" type="text"></label>
            <a href="javascript:form_cadastrar.submit();" class="btn btn-success">Cadastrar</a>          
    </form>
</div>
    

<!--Parallax bg-->
<script type="text/javascript">
   "use strict";
$('#inb').parallax({
'elements': [
{
'selector': '#inb',
'properties': {
'x': {
'background-position-x': {
'initial': 0,
'multiplier': 0.03,
'invert': true
}
},
'y': {
'background-position-y': {
'initial': 30,
'multiplier': 0.03,
'invert': true
}
}
}
}
]
});
</script>

</body>
</html>

