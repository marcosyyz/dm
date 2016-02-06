<?php
session_start();


$_SESSION['state'] = md5(uniqid(rand(), TRUE)); // CSRF protection
$app_id = "700713416653239";//change this
$redirect_url = "http://diretoriomogi.com.br/view/login/callback.php"; //change this
$dialog_url = "https://www.facebook.com/dialog/oauth?client_id=" 
       . $app_id . "&redirect_uri=" . urlencode($redirect_url) . "&state="
       . $_SESSION['state'] . "&scope=user_birthday,email";

?>
<html>
<body>
<h1>Facebook OAuth Dailog Demo</h1>

Click the image to see how OAuth works in Facebook.
<a href="<?php echo $dialog_url;?>"><img src="login-fb2.jpg"></a>
</html>

<br>

<!-- http://www.facebook.com/dialog/oauth/?
                   client_id=700713416653239&
                   redirect_uri=http://diretoriomogi.com.br/view/login/callback.php&
                   scope=email,read_friendlists
                   &state=RANDOM_NUMBER -->