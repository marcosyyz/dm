<?php
include 'config.php';
?><html>
<body>
<?php


function getUserImagem($id){        
        $graph_url = "https://graph.facebook.com/".$id."/picture?type=large";
		//echo $graph_url.'<br>';
	$user = json_decode(file_get_contents($graph_url));
	
        return $user;
	//if($user != null && isset($user->picture))
          //  return $user;
	//return null;
}



//100007164392247


$user_imagem = getUserImagem($_SESSION['IDSOCIAL']);

var_dump($user_imagem);
echo '<br>';
?>

<br>
<img src="https://graph.facebook.com/100007164392247/picture?type=large" />

