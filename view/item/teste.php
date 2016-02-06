

<?php 

//phpinfo();


$n = array(
    array("cdg" => 1, "nome" => "marcos"),
    array("cdg" => 20, "nome" => "sees"),
	array("cdg" => 3, "nome" => "mario")
);


$comentarios = array('COMENTARIO_RATING' => '1' , 'USUARIO_NOME' => '11');

$avaliacoes = array(1,2,3,4,5);
foreach(array_values($avaliacoes) as $v) $avaliacoes_invertido[$v] = 1;


foreach($n as  $value){  

				echo $value["cdg"];
				
				//if(in_array($value["cdg"],$teste,true))
					
				if(isset($avaliacoes_invertido[$value["cdg"]]))
				{
					echo 'entrouuu';
				}	
					
				
				echo '<br>';
				
				
				
				
				}
				
				echo '<br>';echo '<br>';echo '<br>';echo '<br>';
				
				
				
				
	
	if(isset($new_haystack[7]))
	{
		echo("Method B : needle " . 3 . " found in haystack<BR>");
	}
				?>
				
				
				
				
				