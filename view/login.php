<!--autorization-->
<?php
//facebook ---------------- config
$_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
$app_id = "700713416653239";//change this
$redirect_url = "http://diretoriomogi.com.br/control/login/logar_face.php"; //change this
$dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
       . $app_id . "&redirect_uri=" . urlencode($redirect_url) . "&state="
       . $_SESSION['state'] . "&scope=user_birthday,email";


$_SESSION['URL_ATUAL'] =  $_SERVER ['REQUEST_URI'];
?>


<script>
    


    
 
function logout_google()
{
    gapi.auth.signOut();
    location.reload();
}

function login_google() 
{
  var myParams = {
    'clientid' : '339200231393-fcac5rrbvldanq33soufk58bp65nnk4d.apps.googleusercontent.com',
    'cookiepolicy' : 'single_host_origin',
    'callback' : 'googleloginCallback',
    'approvalprompt':'force',
    'scope' : 'https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email'
  };
  gapi.auth.signIn(myParams);
}
 
function googleloginCallback(result)
{
    if(result['status']['signed_in'])
    { 
        
        var request = gapi.client.plus.people.get(
        {
            'userId': 'me'
        });
        
        function getEmail(resp)
        {
          var email,isFound=false;
          console.log(resp);
          for(var i=0;i<resp.emails.length && !isFound;i++)
          {
            if(resp.emails[i].type==='account')
            {
                email=resp.emails[i].value;
                isFound=true
            }   
           }
           return email;    
         }


        request.execute(function (resp)
        {            
            //alert(resp.displayName);
            var p_email = '';
  
            p_email = getEmail(resp);
          
            $.ajax({
                type: "POST",
                url: "<?php echo ROOT_URL.'control/login/logar_google.php'; ?>",
                data: {
                  id:  resp['id'] ,
                  nome:resp['displayName'],
                  imagem:resp['image']['url'],
                  email:p_email
                },
                success: function(data) {
                 
                  window.location = "<?php //echo ROOT_URL ?>";
                  //alert(data);
                }
            });     
        
          /*  var str = "Name:" + resp['displayName'] + "<br>";
            str += "Image:" + resp['image']['url'] + "<br>";
            str += "<img src='" + resp['image']['url'] + "' /><br>";                        
            str += " -  " + resp['gender'] + " <br>";
            str += "  -  " + resp['id'] + " <br>";
            str += " - " + resp['circledByCount'] + "<br>";
            str += " - " + resp['domain'] + "<br>";
            str += " - " + resp['isPlusUser'] + "<br>";
            str += " - '" + resp['ageRange']['min'] + "<br>";                        
            str += "URL:" + resp['url'] + "<br>";          
            */            
        });
 
    }
}



function onLoadCallback()
{
    gapi.client.setApiKey('AIzaSyDqeMSI78Q7sfnmehr-Y6ROl1H40TjZHeg');
    gapi.client.load('plus', 'v1',function(){});
}
 
</script>
 
<script type="text/javascript">
      (function() {
       var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
       po.src = 'https://apis.google.com/js/client.js?onload=onLoadCallback';
       var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
     })();
</script>
    
    
<div class="add_place none" id="autorized">
        <div class="place_form forms login_form subir_form">          
            <i class="fa fa-times close_window" id="closeau"></i>
            <h3>Entrar no Diretório Mogi!<span></span>
            </h3>
            <center><h4><span style="color:green"> Colabore com a cidade avaliando e cadastrando novos lugares! </span></h4></center>
            
            <form name="form_login" action="<?php echo ROOT_URL.'control/login/logar.php' ?>"  method="post">
                <label>Login:<input id="input-nome" name="nome" type="text"></label>
                <label>Senha:<input id="input-senha" name="senha" type="password"></label>
                <a href="javascript:form_login.submit();" id="btn-entrar-normal" class="btn btn-success">Entrar/Cadastrar</a>
                <a href="<?php echo $dialog_url ?>" class="btn btn-primary"><i class="icon-facebook"></i>Entrar com Facebook</a>
                <a href="javascript:login_google();" class="btn btn-vermelho">Entrar com Gmail</a>
            </form>
        </div>
</div>

            <script>
                $( "#input-nome" ).keydown(function( event ) {
                  if ( event.which == 13 ) {
                         form_login.submit();         
                  }
                });

                $( "#input-senha" ).keydown(function( event ) {
                  if ( event.which == 13 ) {
                         form_login.submit();         
                  }
                });                               
            </script>


