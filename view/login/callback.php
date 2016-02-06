<?php 
   $app_id = "700713416653239"; //change this
   $app_secret = "eb9c49990e94cc0c35f3b61c8852fde9"; //change this
   $redirect_url = "http://diretoriomogi.com.br/view/login/callback.php"; //change this

   
   $code = $_REQUEST["code"];
   session_start();

   if(empty($code)) 
   {
	header( 'Location: http://diretoriomogi.com.br/view/login/loginwithfb.php' ) ; //change this
	exit(0);
   }
   
   $access_token_details = getAccessTokenDetails($app_id,$app_secret,$redirect_url,$code);
   if($access_token_details == null)
   {
		echo "Unable to get Access Token";
		exit(0);
   }   
   
   if($_SESSION['state'] == null || ($_SESSION['state'] != $_REQUEST['state'])) 
   {
		 header('location: http://diretoriomogi.com.br ');
   }
	 
   $_SESSION['access_token'] = $access_token_details['access_token']; //save token is session 
   
   $user = getUserDetails($access_token_details['access_token']);
   $user_imagem = getUserImagem($user->id);
   
   if($user)
   {
		echo "Facebook OAuth is OK<br>";
		echo "<h3>User Details</h3><br>";
		echo "<b>ID: </b>".$user->id."<br>";
		echo "<b>Name: </b>".$user->name."<br>";
		echo "<b>First Name: </b>".$user->first_name."<br>";
		echo "<b>Last Name: </b>".$user->last_name."<br>";
		echo "<b>Username: </b>".$user->username."<br>";
		echo "<b>Profile Link: </b>".$user->link."<br>";
		echo "<b>email: </b>".$user->email."<br>";
		echo "<br><b>imagem: </b>".$user_imagem->picture->data->url;
                
   }
   
       /*var_dump $user {
       ["id"]=> string(15) "100000078362129" 
        ["email"]=> string(21) "marcosyyz@hotmail.com" 
        ["first_name"]=> string(6) "Marcos" 
        ["gender"]=> string(4) "male" 
        ["last_name"]=> string(5) "Ortiz" 
        ["link"]=> string(60) "https://www.facebook.com/app_scoped_user_id/100000078362129/" 
        ["locale"]=> string(5) "en_US" 
        ["name"]=> string(12) "Marcos Ortiz" 
        ["timezone"]=> int(-2) 
        ["updated_time"]=> string(24) "2015-06-06T04:07:40+0000" 
        ["verified"]=> bool(true)
    }
    
    *var_dump $user_imagem{
                                "picture": {
                                            "data": {
                                                    "is_silhouette": false,
                                                    "url": "https://fbcdn-profile-a.akamaihd.net/hprofile-ak-xaf1/v/t1.0-1/p50x50/10991163_961369187209018_6604826732783600125_n.jpg?oh=f681bb90c28ac407cf45cc4a04b7dbc5&oe=56E34322&__gda__=1457576341_2d65db18b15faafc9241635d34109698"
                                            }
                                },
                                "id": "100000078362129"
                                }
    */
	
	
function getAccessTokenDetails($app_id,$app_secret,$redirect_url,$code){
	$token_url = "https://graph.facebook.com/oauth/access_token?"
	  . "client_id=" . $app_id . "&redirect_uri=" . urlencode($redirect_url)
	  . "&client_secret=" . $app_secret . "&code=" . $code;

	$response = file_get_contents($token_url);
	$params = null;
	parse_str($response, $params);
	
	return $params;

}

function getUserDetails($access_token){
	$graph_url = "https://graph.facebook.com/me?access_token=". $access_token;
	$user = json_decode(file_get_contents($graph_url));
	if($user != null && isset($user->name))
            return $user;   	
	return null;
}

function getUserImagem($id){
        $graph_url = "https://graph.facebook.com/".$id."?fields=picture.type(small)";
	$user = json_decode(file_get_contents($graph_url));
	if($user != null && isset($user->picture))
            return $user;
	return null;
}

 ?>

