<link rel="stylesheet" type="text/css"  href="estilo.css" />
<script language="javascript" src="jquery-1.11.0.min.js"></script>

<script type="text/javascript"> 
alert('Buuuuuuuuu!!');
alert('Feliz Aniversárioooooooo!!!!!!!!');
document.getElementById("mp3").play();
</script>

<script language="javascript">
<!--
estado=0
function pisca(){
	if(estado==0){
       document.fgColor="BLACK";
       estado=1;
	}
	else{
		if(estado==1){
			document.fgColor="GREEN";
			estado=2;
		}
		else{
    	  document.fgColor="RED";
    	  estado=0;
		}
	}
	setTimeout("pisca()",471)
};
//-->
</script>

<script>
$(document).ready(function(){	
	  event.preventDefault();
		 	
	  $("#bolinho").hide(0.1);	 	
	  $("#presente").hide(0.1);	
	 		  
	  $("#bolinho").show(20000);
     $("#presente").delay(30000);	  
      $("#presente").show(10000);	  
});
</script>

<script language="JavaScript">
var palavra = ".";
var velocidade = 940;
var valor = 1;
function pisca() {
if (valor == 1) {
texto.innerHTML = palavra;
valor=0;
} else {
texto.innerHTML = "";
valor=1;
}
setTimeout("pisca();",velocidade);
}
</script>

<body onload="pisca();">
<div id="texto"></div>


<body   onLoad="" onLoad="pisca()" onLoad="atualizaContador()" >

  <div id="happy"> 
    
     <h2>Feliz Nivers&aacute;riooo! 
     <br> Aeee!</div>
	 </h2>
	 <br><br><br>
	
  
  
  <div  id="bolinho">
     <img src="bolinho.png"> 
     <br><br><br><br>
     
		<audio controls="true" autoplay="true">
		<source src="musica.mp3">
		<p> <a href="musica.mp3"></a>.</p>
		</audio>
	
  </div>
  
   <div id="presente">
	 <img src="presente.png"> 
	 <a href="presente.php"><h5>Retire aqui o seu presente! </h5> </a>	
	 </div>
 



</body>



