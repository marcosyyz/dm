<link rel="stylesheet" type="text/css"  href="estilo.css" />

<script language="Javascript">
var YY = 2014;
var MM = 07;
var DD = 12;
var HH = 00;
var MI = 00;
var SS = 00; 

function atualizaContador() 
{  
var hoje = new Date();  
var futuro = new Date(YY,MM-1,DD,HH,MI,SS);   
var ss = parseInt((futuro - hoje) / 1000);  
var mm = parseInt(ss / 60);  
var hh = parseInt(mm / 60);  
var dd = parseInt(hh / 24);   
ss = ss - (mm * 60);  
mm = mm - (hh * 60);  
hh = hh - (dd * 24);   
var faltam = '';  
faltam += (dd && dd > 1) ? dd+' dias, ' : (dd==1 ? '1 dia, ' : '');  
faltam += (toString(hh).length) ? hh+' Horas <br> ' : '';  
faltam += (toString(mm).length) ? mm+' Min <br> ' : '';  
faltam += ss+' Seg';   

 if (dd+hh+mm+ss > 0) 
 {
  document.getElementById('contador').innerHTML = faltam;	
  setTimeout(atualizaContador,1000);  
 }
 else
 {
  location.href = "felizaniversariooooo.php"; 
 }
}
</script>

<body onLoad="atualizaContador()" ">
<img src="snoopy.png"> 
   <br/><br><B><br><br>
  <h1>
  <div id="balao_contagem"> 
    
    <span id="contador"></span>
	
	
  </div>
<//h1>
</body>