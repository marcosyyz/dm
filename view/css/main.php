<?php
header("Content-type: text/css");
$cor_fundo = '#1184AF';
$cor_fundo_menu_esquerdo = '#1184AF'; // antigo <?php echo $cor_fundo_menu_esquerdo ?>
?>
/*------------------------------------------------------------------
[Main.css]
Project:        My city guide
Version:        1
Last change:    24/02/15 
-------------------------------------------------------------------*/
/*------------------------------------------------------------------
[Table of contents]

1. general styles / #general styles
2. promo index page styles / #promo index page styles
3. Map Page styles / #Map Page styles
4. Inner (place) Page styles / #Inner (place) Page styles
5. User Profile pages / #User Profile pages
6. Place grid / #Place grid
7. Blog page / #Blog page
8. Post page / #Post page

-------------------------------------------------------------------*/





.botaobox {
    float: left;
    width: 150px;
    height: 75px;
    margin: 10px;
    border: 3px solid #73AD21;  
    transition: 0.3s;
    cursor: pointer;
    padding: 10px 20px 10px 20px;
    margin-left: 10px ;
}

a.btn_vermelho{
   background: #c54800;
}

a.btn_vermelho:hover{
   background: #f5f8f0;
}


a.btn_verde {
  background: #95c800;
}

a.btn_verde:hover {
  background: #f5f8f0;
}


.clearfix {
  overflow: auto;
  zoom: 1;
}

.centro{
    position:relative;
    margin: auto;
}

.metade{
  position:relative;
  width:50%;
}


/******************************************************************************************/
/*****************************      itens    **************************************/
/******************************************************************************************/

.item-descricao{
margin:30px;
}


.contador-item{
    display: block;
    position: absolute;
    right: 0px;
    padding: 3px 7px;
    width: 22px;
    height: 22px;
    border-radius: 100px;
    font-size: 12px;
    font-weight: bold; 
}

.cor-like{
    background: #aFFaaF;
    color: #1FB912;
}

.cor-dislike{
    background: #E05D4D;
    color: #FFF9F2;
}

.contador-noticia{
display: block;
position: absolute;
right: 0px;
padding-left: 9px; 


background: #aFFaaF;
width: 25px;
height: 25px;
border-radius: 100px;
color: #4F69A2;
font-size: 12px;
}

.posicao-like-noticia{
position:relative;
   top: -60px;
    left:309px;
}

.posicao-dislike-noticia{
    top: -85px;
    left:377px;
    position:relative;
}


.posicao-like-item{
   top: 310px;
    left:290px;
}

.posicao-dislike-item{
    top: 310px;
    left:350px;
}

.fb-like {
    transform: scale(1.3);
    -ms-transform: scale(1.3);
    -webkit-transform: scale(1.3);
    -o-transform: scale(1.3);
    -moz-transform: scale(1.3);
}

#fbcurtir{    
    float:right;
    padding-top:20px;
    margin:auto;              
    width:50%; /* aqui você ajusta o tamanho do conteudo */
    background-color:#cccccc; /* Deixei a cor de fundo para facilitar seu entendimento */
}

body.inner_page .bg_parallax {
    background: url(../img/bg.jpg);
    background-repeat: repeat;
    background-attachment: fixed;
}


/*<!-------------------------menu topo ---------------------------------------->
<!----------------------------------- ---------------------------------------->*/

.menu-topo {
    padding: 15px;
    margin-top: 12px;
}

.menu-topo ul {
    padding: 0px;
}
.menu-topo ul li {
    list-style: none;
    display: inline-block;
    margin: 0px 1px 7px;
    
}
.menu-topo ul li a {
    padding: 6px 14px;
    border: 1px solid <?php echo $cor_fundo ?>;
    display: block;
    border-radius: 40px;
    background: <?php echo $cor_fundo ?>;
    color: #ffffff;
}
.menu-topo ul li a:hover {
    background: #FFFFFF;
    color: #0f9fcf;
}



.menu-topo ul.sub-menu {	
    float:left;
    max-height: 0;
    transition: max-height 0.15s ease-out;
    overflow: hidden;       
}


.menu-topo ul.sub-menu li {
   clear: left;
   float:left;
   width:150px; 
   heigh:150px; 
   padding: 5px;       
}

.menu-topo  li:hover ul.sub-menu {
    display: block;            
    padding-top: 10px; 
    max-height: 600px;
    transition: max-height 0.25s ease-in;  
}

/*<!-------------------------menu topo ---------------------------------------->*/



.menu-topo-menor {
    padding: 8px; 
    
}

.menu-topo-menor ul {
    padding: 0px;
}
.menu-topo-menor ul li {
    list-style: none;
    display: inline-block;
    margin: 0px 1px 7px;
    
}
.menu-topo-menor ul li a {

    padding: 6px 14px;
    border: 1px solid #0F6FaF;
    display: block;
    border-radius: 40px;
    background: <?php echo $cor_fundo ?>;
    color: #ffffff;
}
.menu-topo-menor ul li a:hover {
    background: #FFFFFF;
    color: #0f9fcf;
}



.menu-topo-menor ul.sub-menu {	
    float:left;
    max-height: 0;
    transition: max-height 0.15s ease-out;
    overflow: hidden;       
}


.menu-topo-menor ul.sub-menu li {
   clear: left;
   float:left;
   width:150px; 
   heigh:150px; 
   padding: 5px;       
}

.menu-topo-menor  li:hover ul.sub-menu {
    display: block;            
    padding-top: 10px; 
    max-height: 600px;
    transition: max-height 0.25s ease-in;  
}


.esquerda{
   float:left;
}

.direita{
    float:right;
    
}



.btn-vermelho {
  color: #fff;
  background-color: #DA4A38;
  border-color: #2e6da4;
}

.page_info {
    padding: 90px 15px 60px;
}
.page_info img {
    width: 100px;
    border-radius: 3px;
    float: left;
    margin-right: 20px;
}
.page_info ul {}
.page_info ul li {
    list-style: none;
    display: inline-block;
    margin-right: 15px;
    margin-bottom: 30px;
}
.page_info ul li a {}
.page_info ul li a:hover {color: #ffffff;}
.page_info h1 {
    color: #ffffff;
    font-weight: 100;
    font-size: 40px;
    padding-top: 10px;
}
.page_info .status {
    color: #ffffff;
}
.page_info .lead {color:#ffffff; width: 70%;}

.status_erro{
    color:#965F24;
    float:right;
    border: #000 1px solid;
    padding: 3px;
    font-size: 24px;
    background-color: #9CE2AE;
}

.status_ok{
    color:#169F84;
    float:right;
    border: #000 1px solid;
    padding: 3px;
    font-size: 24px;
    background-color: #9CE2AE;
}


/*------------------------------------------------------------------
[1. general styles / #general styles]
*/


.direita{
    float:right;
    
}

.span19{
    font-size: 19px;    
}


body {
background: url(../img/start/bg.jpg);
background-size: 100% 100%;
background-repeat: no-repeat;
background-attachment: fixed;
overflow-x:hidden;
}

body.inned {
background: <?php echo $cor_fundo ?>;
background: url(data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/Pgo8c3ZnIHhtbG5zPSJod…EiIGhlaWdodD0iMSIgZmlsbD0idXJsKCNncmFkLXVjZ2ctZ2VuZXJhdGVkKSIgLz4KPC9zdmc+);
background: -moz-linear-gradient(left, <?php echo $cor_fundo ?> 0%, <?php echo $cor_fundo ?> 51%, #f3f3f3 51%, #f3f3f3 51%, #f3f3f3 100%);
background: -webkit-gradient(linear, left top, right top, color-stop(0%,<?php echo $cor_fundo ?>), color-stop(51%,<?php echo $cor_fundo ?>), color-stop(51%,#f3f3f3), color-stop(51%,#f3f3f3), color-stop(100%,#f3f3f3));
background: -webkit-linear-gradient(left, <?php echo $cor_fundo ?> 0%,<?php echo $cor_fundo ?> 51%,#f3f3f3 51%,#f3f3f3 51%,#f3f3f3 100%);
background: -o-linear-gradient(left, <?php echo $cor_fundo ?> 0%,<?php echo $cor_fundo ?> 51%,#f3f3f3 51%,#f3f3f3 51%,#f3f3f3 100%);
background: -ms-linear-gradient(left, <?php echo $cor_fundo ?> 0%,<?php echo $cor_fundo ?> 51%,#f3f3f3 51%,#f3f3f3 51%,#f3f3f3 100%);
background: linear-gradient(to right, <?php echo $cor_fundo ?> 0%,<?php echo $cor_fundo ?> 51%,#f3f3f3 51%,#f3f3f3 51%,#f3f3f3 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='<?php echo $cor_fundo ?>', endColorstr='#f3f3f3',GradientType=1 );
overflow-x: hidden;
}

@import url(http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700);

body.inmap {overflow: hidden; transition: 0.3s;}

a {
color: <?php echo $cor_fundo ?>;
text-decoration: none;
transition: 0.3s;
}

a:hover {
/color: #333;
text-decoration: none;
transition:0.3s;
}

.to_left {
left: 250px;
transition: 0.3s;
}

.to_left.inn {
left: 250px;
position: relative;
margin-left: 0px;
transition: 0.3s;
}


.all_cont {transition: 0.3s;position: relative;}

.sidebar {
    background: rgba(0, 0, 0, 0.2);
    min-height: 100%;
    position: relative;
    padding: 0px;
}

/*////////////////////////Side menu//////////////////////*/

.pushy .profile {
background: #11648F ;
margin: -40px 0px -50px;
padding: 40px 0px 20px;
}


.indexpage .logo {
margin-left: 50px;
}
.indexpage .menu-btn {
color: #242A33;
top: 25px;
}
.indexpage .menu-btn:hover {
top: 25px;
}

.profile .avatar {
width: 110px;
background: <?php echo $cor_fundo_menu_esquerdo ?>;
height: 110px;
border-radius: 100px;
position: relative;
margin: 40px auto 0px;
}

.pushy .profile h3 {
text-align: center;
}

.pushy .profile h3 a {
font-weight: 300;
font-size: 20px;
color: #FFFFFF;
}

.pushy .profile h3 a:hover {
color: #03AAAC;
text-decoration: none;
}

.pushy .profile .log_btn {
width: 100px;
display: block;
border: 2px solid #FFFFFF;
text-align: center;
padding: 8px;
border-radius: 3px;
margin: 20px auto;
color: #FFFFFF;
}

.pushy .profile .log_btn:hover {
border: 2px solid #ffffff; 
color:#ffffff; 
text-decoration: none;
}

 .avatar img {
    width: 110px;
    border-radius: 100px;
    display: block;
    border: 2px solid #FFFFFF;
    padding: 6px;
}

.pushy .profile .avatar span {
display: block;
position: absolute;
right: 0px;
padding: 5px 11px;
background: #FFFFFF;
width: 30px;
height: 30px;
border-radius: 100px;
color: <?php echo $cor_fundo_menu_esquerdo ?>;
font-weight: 500;
top: 80px;
}

.pushy .side_menu {
margin: 50px 0px;
padding: 0px;
}

.pushy .side_menu li {
display: block;
list-style: none;
margin-bottom: 0px;
}

.pushy .side_menu li a {
color: #FFFFFF;
display: block;
border-top: 1px solid <?php echo $cor_fundo_menu_esquerdo ?>;
border-bottom: 1px solid <?php echo $cor_fundo_menu_esquerdo ?>;
margin-bottom: -1px;
}
.pushy .side_menu li a span {padding: 12px 10px;}
.pushy .side_menu li a i {
color: #FFFFFF;
padding: 8px;
display: inline-block;
background: <?php echo $cor_fundo_menu_esquerdo ?>;
margin-right: 16px;
font-size: 14px;
transition: 0.3s;
min-width: 40px;
text-align: center;
}
.pushy .side_menu li a:hover i {
color: #FFFFFF;
padding: 12px;
display: inline-block;
background: #03AAAC;
margin-right: 16px;
font-size: 14px;
transition: 0.3s;
min-width: 40px;
text-align: center;
}
.pushy .side_menu li a:hover {
color: <?php echo $cor_fundo_menu_esquerdo ?>;
text-decoration: none;
background: #FFFFFF;
}

/*------------------------------------------------------------------
[2. Promo Page styles / #Promo Page styles]
*/
.promo {overflow-x:hidden; background: #011222; margin: 0px;}
.animation {
position: absolute;
width: 1200px;
min-width: 1200px;
height: 100%;
overflow: hidden;
bottom: 0px;
left: 50%;
margin-left: -600px;
}

.bgg {
background: url(../img/start/bg.jpg);
background-position: center bottom;
width: 100%;
height: 100%;
position: absolute;
left: 0px;
background-repeat: no-repeat;
}

.green_button {
background: <?php echo $cor_fundo ?>;
padding: 8px 20px;
border-radius: 3px;
color: #ffffff;
font-weight: bold;
transition: 0.3s;
}

.green_button:hover {
background: #353535;
padding: 8px 20px;
border-radius: 3px;
color: #ffffff;
font-weight: bold;
text-decoration: none;
transition: 0.3s;
}

.dark_button {
background: #353535;
padding: 8px 20px;
border-radius: 3px;
color: #ffffff;
font-weight: bold;
transition: 0.3s;
}

.dark_button:hover {
background: #ffffff;
padding: 8px 20px;
border-radius: 3px;
color: #353535;
font-weight: bold;
text-decoration: none;
transition: 0.3s;
}

/*description*/
.start_descrition {
z-index: 9999;
text-align: center;
position: absolute;
width: 1200px;
top: 50%;
margin-top: -260px;
left: 50%;
margin-left: -600px;
}
.start_descrition .start_logo {}
.start_descrition h1 {
font-size: 50px;
text-transform: uppercase;
font-weight: 300;
font-family: 'Roboto', sans-serif;
color: #ffffff;
}
.start_descrition h1 span {
display: block;
width: 150px;
height: 1px;
background: #1F8BEA;
margin: 40px auto;
}
.start_descrition span {
font-family: 'Roboto', sans-serif;
font-size: 23px;
font-weight: 300;
color: #ffffff;
line-height: 36px;
}
.start_descrition .btns {
margin-top: 60px;
}
.start_descrition .btns .green {
background: <?php echo $cor_fundo ?>;
padding: 15px 35px;
border-radius: 3px;
font-family: 'Roboto', sans-serif;
font-weight: 500;
text-decoration: none;
font-size: 16px;
color: #ffffff;
margin: 0 15px;
}
.start_descrition .btns .green:hover {
background: #ffffff;
padding: 15px 35px;
border-radius: 3px;
font-family: 'Roboto', sans-serif;
font-weight: 500;
text-decoration: none;
font-size: 16px;
color: <?php echo $cor_fundo ?>;
margin: 0 15px;
}
.start_descrition .btns .white_border {
background: none;
padding: 14px 35px;
border-radius: 3px;
font-family: 'Roboto', sans-serif;
font-weight: 500;
text-decoration: none;
font-size: 16px;
color: #ffffff;
border: 2px solid;
margin: 0 15px;
}
.start_descrition .btns .white_border:hover {
background: none;
padding: 14px 35px;
border-radius: 3px;
font-family: 'Roboto', sans-serif;
font-weight: 500;
text-decoration: none;
font-size: 16px;
color: #208CEA;
border: 2px solid;
margin: 0 15px;
}
/*img position setings*/
.one_element {
position: absolute;
right: 143px;
bottom: -300px;
z-index: 3;
}

.two_element {
position: absolute;
left: 350px;
bottom: -40px;
z-index: 2;
}
.three_element {
position: absolute;
left: 243px;
bottom: 227px;
z-index: 2;
}
.four_element {
position: absolute;
left: 78px;
bottom: 80px;
z-index: 2;

}
.five_element {
position: absolute;
bottom: 80px;
left: 533px;
z-index: 2;
}
.six_element {
position: absolute;
bottom: 201px;
right: 277px;
z-index: 2;
}
.seven_element {
position: absolute;
right: 82px;
bottom: 164px;
z-index: 2;
}
.eight_element {
position: absolute;
left: 60px;
bottom: 180px;
z-index: 2;
}
.nine_element {
position: absolute;
bottom: 144px;
right: 463px;
z-index: 2;
}
.ten_element {
position: absolute;
bottom: -70px;
left: 57px;
z-index: 1;
}
.quote_element {
position: absolute;
bottom: 246px;
right: 213px;
z-index: 2;
}
.quote_two_element {
position: absolute;
bottom: 205px;
left: 22px;
z-index: 2;
}

/*img time animation settings*/
.start_descrition.option {
-webkit-animation-duration: 1s;
-webkit-animation-delay: 0.4s;
-webkit-animation-iteration-count: 1;
}
.quote_two_element.option {
-webkit-animation-duration: 1s;
-webkit-animation-delay: 1.8s;
-webkit-animation-iteration-count: 1;
}

.quote_element.option {
-webkit-animation-duration: 1s;
-webkit-animation-delay: 1.6s;
-webkit-animation-iteration-count: 1;
}

.one_element.option {
-webkit-animation-duration: 0.5s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;
}

.two_element.option {
-webkit-animation-duration: 1.6s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;
}
.three_element.option {
-webkit-animation-duration: 0.6s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;
}
.four_element.option {
-webkit-animation-duration: 1.2s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;

}
.five_element.option {
-webkit-animation-duration: 1.4s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;
}
.six_element.option {
-webkit-animation-duration: 0.8s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;
}
.seven_element.option {
-webkit-animation-duration: 0.4s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;
}
.eight_element.option {
-webkit-animation-duration: 0.2s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;
}
.nine_element.option {
-webkit-animation-duration: 1s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;
}
.ten_element.option {
-webkit-animation-duration: 1.8s;
-webkit-animation-delay: 0s;
-webkit-animation-iteration-count: 1;
}


/*------------------------------------------------------------------
[3. Map Page styles / #Map Page styles]
*/
/* map style */
.map {
width: 100%;
height: 100%;
position: fixed !important;
}

/*menu*/
.menu {
position: fixed;
z-index: 9;
background: <?php echo $cor_fundo ?>;
width: 100%;
bottom: 0px;
max-height: 75px;
overflow: hidden;
margin: 0px;
padding: 0px;
}
.menu ul {
margin: 0px;
padding: 0px;
text-align: center;
max-width: 1600px;
margin: 0 auto;
}
.menu li {
list-style: none;
display: inline-block;
width: 9%;
margin: 0px -2px;
padding: 0px;
}
.menu li a {
display: block;
color: rgba(255, 255, 255, 1);
font-size: 26px;
font-weight: normal;
text-align: center;
padding: 11px 0px;
text-decoration: none;
transition: 0.3s;
}
.menu ul li a div {
    font-size: 16px;
}
.menu ul li a span {}

.menu li a:hover, .menu li a:focus {
background: #FFffff;
transition: 0.3s;
color: <?php echo $cor_fundo ?>;
}

.container-fluid.menu span, .container-fluid.menu .icon-remove, .container-fluid.menu .mobile_menu {display: none;}


.marker_info .info {
width: 300px;
height: 320px;
border-radius: 5px;
background: rgba(17, 132, 175, 0.95);
position: relative;
z-index: 9999999;
padding: 5px;
}

.marker_info .info img {
display: block;
border-radius: 80px;
width: 200px;
position: absolute;
top: -93px;
left: 50px;
border: 7px solid #e9e5db;
background: #ffffff;
}
.marker_info .info a {
background: #ffffff;
border: 0px;
color: <?php echo $cor_fundo ?>;
transition:0.3s;
}
.marker_info .info a:hover {
background: #242A33;
border: 0px;
color: <?php echo $cor_fundo ?>;
transition: 0.3s;
}
.marker_info .info h2 {
text-align: center;
padding-top: 70px;
font-family: 'Roboto', sans-serif;
font-weight: 300;
color: #ffffff;
}
.marker_info .info h2 span {
width: 70px;
height: 1px;
background: #FFFFFF;
display: block;
margin: 15px auto;
}
.marker_info .info span {
font-family: 'Roboto', sans-serif;
font-weight: 300;
color: #FFFFFF;
line-height: 22px;
text-align: center;
display: block;
padding: 0px 30px;
font-size: 14px;
}
.marker_info .info a {}
a.green_btn {
background: #95c800;
border: 1px solid #000000;
padding: 10px 50px;
color: #ffffff;
font-size: 14px;
border-radius: 4px;
display: block;
width: 180px;
text-align: center;
bottom: 40px;
position: absolute;
left: 60px;
transition: 0.3s;
}
a.green_btn:hover {
background: #ffffff; /* Old browsers */
border: 1px solid #000000;
padding: 10px 50px;
color: #95c800;
font-size: 14px;
box-shadow: none;
border-radius: 4px;
display: block;
width: 180px;
text-align: center;
bottom: 40px;
position: absolute;
left: 60px;
text-decoration: none;
}
.marker_info .arrow {
width: 0px;
height: 0px;
position: absolute;
padding: 0px !important;
left: -28px;
top: 150px !important;
border: 14px solid rgba(255, 0, 0, 0);
top: 0px;
border-right-color: rgba(33, 141, 234, 0.9);
}

/*header*/
.header {
    position: absolute;
    width: 100%;
    height: 85px;
    z-index: 9;
    transition: 0.3s;
}
.header:hover {
background: rgba(255, 255, 255, 0.42);
transition: 0.3s;
}


.header_menor {
    position: fixed;
    width: 100%;
    z-index: 9;
    transition: 0.3s;  
    height: 50px;
    background: rgba(17, 132, 175, 0.95);   
   
}

.header_menor:hover {
    transition: 0.3s;      
    background: rgba(17, 132, 175, 1);   
   
}


.header_menor .logo {
    display: block;
    float: left;
    padding: 8px 30px 0px 0px;
}

.fixed_w {
    max-width: 1140px;
    margin: 0 auto;
}
.fixed_w h2 {
    margin-bottom: 58px;
    font-size: 36px;
    color: #191a22;
}

.header_menor .search {
    margin: 8px 0px 8px 30px;
    float: right;
    background: #ffffff;
    box-shadow: 0px 0px 2px rgba(132, 0, 0, 0.25);
    border: 1px solid rgba(107, 147, 39, 1);
    border-radius: 3px;
    height: 33px;
    font-size: 13px;
    font-style: italic;
    width: 100%;
    padding: 0px 10px;
    max-width: 400px;
}
.innerpage .menu-btn {
    color: #ffffff;
    top: 5px;
}
.innerpage .menu-btn:hover {
    color: #202020;
    top: 5px;
    background: none;
}

.inner_head .menu-btn {
    color: #ffffff;
    top: 5px;
}
.inner_head .menu-btn:hover{
    color: #202020;
    top: 5px;
    background: none;
}

.open_side {
float: left;
font-size: 21px;
padding: 28px 10px 0px 20px;
transition:0.3s;
}

.open_side:hover {
float: left;
font-size: 21px;
color: #03AAAC;
padding: 28px 10px 0px 20px;
cursor: pointer;
transition:0.3s;
}

.header .logo {
display: block;
float: left;
padding: 16px 30px 0px 60px;
}
.header .weather {}
.header .weather i {
font-size: 33px;
padding: 24px 0px;
display: block;
float: left;
}
.header .weather span {
font-size: 36px;
font-weight: 300;
float: left;
display: block;
margin: 18px 10px;
}
.header .search {
margin: 27px 0px;
float: right;
background: #ffffff;
box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
border: 1px solid rgba(0, 0, 0, 0.3);
border-radius: 3px;
height: 33px;
font-size: 13px;
font-style: italic;
width: 100%;
padding: 0px 10px;
max-width: 400px;
}

.header .green_btn_header{
    margin: 28px;
}
.header .green_btn_header:hover{
    margin: 28px;
}

.green_btn_header {
    background: #3582A6;
    padding: 6px 10px;
       margin: 9px;
    color: #ffffff;
    font-size: 14px;
    border-radius: 4px;
    display: block;
    
    text-align: center;
    float: right;
 
    transition: 0.3s;
}

.green_btn_header:hover {
background: #45A2C6; /* Old browsers */
padding: 6px 10px;
color: #ffffff;
font-size: 14px;
border-radius: 4px;
display: block;

text-align: center;
float: right;
margin: 9px;
text-decoration: none;
transition: 0.3s;
}

.central {	
	position:relative;
	top:50%;
	left:50%;	
	margin-left:-50px;
}

/*add place*/
.add_place {
    position: fixed;
    z-index: 999;
    background: rgba(0, 0, 0, 0.83);
    width: 100%;
    height: 100%;
    top: 0px;
    transition: 0.3s linear;
}

.place_form {       
    width: 300px;
    background: #ffffff;
    border-radius: 4px;
    margin: 0 auto;
    top: 50%;
    position: relative;
    height: 480px;
    
}
.subir_form{
    margin-top: -265px;
}

.tela_login{
  width: 300px; 
  
}

.forms{}



.forms h3 {
font-weight: 300;
text-align: center;
padding: 20px 0px;
display: block;
}
.forms h3 span {
display: block;
width: 60px;
height: 1px;
background: #95C800;
margin: 20px auto -16px auto;
}
.forms label {
font-size: 11px;
text-transform: uppercase;
display: block;
padding: 0px 30px;
margin: 20px 0px 20px 0px;
}
.forms label input {
display: block;
width: 100%;
height: 40px;
border-radius: 3px;
border: 1px solid #DDDDDD;
margin-top: 10px;
background: #F9F9F9;
padding: 0px 20px;
font-size: 16px;
font-weight: 300;
}
.forms label input:focus {
outline: none;
border: 1px solid #7CCB18;
background: #ffffff;
color: #7ccb18;
font-size: 16px;
font-weight: 300;
}
.forms label select {
display: block;
width: 100%;
margin-top: 10px;
height: 30px;
}
.forms a {
width: 100%;
margin: 0px;
border-top-left-radius: 0px;
border-top-right-radius: 0px;
padding: 20px;
margin-top: 18px;
}
.forms a:hover {
width: 100%;
margin: 0px;
border-top-left-radius: 0px;
border-top-right-radius: 0px;
padding: 20px;
margin-top: 18px;
}


/*login form*/
.login_form {height: 450px;}
.login_form a i {
padding: 0px 10px 0px 0px;
}
.login_form a, .login_form a:hover {
margin: 10px 30px;
width: 240px;
border-radius: 3px;
padding: 10px;
}
.none {top: -150%; transition: 0.3s linear;}
.close_window {
display: block;
position: absolute;
top: -20px;
right: -20px;
color: #ffffff;
cursor: pointer;
}
.close_window:hover {
color: #E51616;
}

/*Adaptive map page*/





/*------------------------------------------------------------------
[4. Inner (place) Page styless / #Inner (place) Page styles]
*/
.contant {}

.contant .row {
    display: table-row;
}

.contant .row [class*="col-"] {
    float: none;
    display: table-cell;
    vertical-align: top;
}

.contant .basic {
background: #ffffff;
min-height: 100%;
padding:0px;
position: relative;
padding-bottom: 40px;
}


.dark_bg {
background: rgba(0, 0, 0, 0.85);
position: fixed;
width: 100%;
height: 100%;
}

/*head*/
.head {
background: #ffffff;
padding: 20px 30px 30px;
}
.head .logo {}
.head .search {
margin: 0px 30px 0px;
float: right;
background: #ffffff;
box-shadow: 0px 0px 2px rgba(0, 0, 0, 0.25);
border: 1px solid rgba(0, 0, 0, 0.3);
border-radius: 3px;
height: 33px;
font-size: 13px;
font-style: italic;
width: 100%;
padding: 0px 10px;
max-width: 150px;
}
.head .green_btn_header, .head .green_btn_header:hover {
max-width: 40px;
padding: 6px 0px;
text-align: center;
margin: 0px;
}
.menusha {
display: none;
}
.menusha_open {
position: absolute;
top: 20px;
left: 20px;
font-size: 21px;
color: #D0544B;
transition:0.3s;
}
.menusha_open:hover {color:#ffffff; cursor: pointer; transition:0.3s;}
/*header section*/
.header_section {
background: url(../img/c_interior.png) no-repeat;
margin: 0px 0px;
background-size: cover;
min-height: 255px;
overflow: hidden;
position: relative;
width: 900px;
}
.header_section img {
float: left;
margin: 34px;
width: 90px;
border-radius: 3px;
}
.header_section h1 {
color: #ffffff;
font-weight: 300;
padding-top: 20px;
padding-bottom: 5px;
}
.header_section ul {}
.header_section ul li {
list-style: none;
display: inline-block;
margin: 0px 10px 0px 0px;
}
.header_section ul li a:hover, .header_section ul li a:focus {color:#ffffff;}

/*header section diagramm*/
.diagramms {
float: left;
width: 30%;
}
.dial {
font-size: 16px !important;
margin-top: 16px !important;
font-weight: 100 !important;
}
.circle {
float: left;
margin-right: 20px;
}
.dia {
padding: 18px 30px;
background: -moz-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(0,0,0,0) 9%, rgba(0,0,0,0.5) 100%);
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(9%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.5)));
background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 9%,rgba(0,0,0,0.5) 100%);
background: -o-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 9%,rgba(0,0,0,0.5) 100%);
background: -ms-linear-gradient(top, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 9%,rgba(0,0,0,0.5) 100%);
background: linear-gradient(to bottom, rgba(0,0,0,0) 0%,rgba(0,0,0,0) 9%,rgba(0,0,0,0.5) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00000000', endColorstr='#80000000',GradientType=0 );
overflow: hidden;
height: 89px;
position: absolute;
bottom: 0px;
width: 100%;
}
.diagramms span {
color: #ffffff;
display: block;
padding-top: 15px;
font-size: 17px;
font-weight: 300;
}
.circle input:focus {outline: none;}
/*header_icon_descr_section*/

.icon_descr_block {
    width:600px;
    overflow: hidden;
    border-bottom: 1px solid #E8E8E8;
     
}

.icon_descr_block .cols {
    width: 100%;
    padding: 16px 16px 16px 96px;
   
    height:80px;
}

.icon_descr_block .cols .icons {
    position: relative;
    float: right;
    width: 30%;
    padding: 20px;
}
.icon_descr_block .cols .icons .ic {
    display: block;
    padding: 18px 24px;
    border: 2px solid;
    width: 76px;
    height: 76px;
    border-radius: 150px;
    font-size: 24px;
}
.icon_descr_block .cols .icons .ic i {}
.icon_descr_block .cols .icons .num {
display: block;
width: 70px;
position: absolute;
padding: 3px 20px;
font-size: 12px;
font-weight: bold;
border-radius: 3px;
bottom: 8px;
left: 23px;
color: #ffffff;
}
.icon_descr_block .bubble {
float: left;
width: 50%;
}
.icon_descr_block .bubble div {
background: #f3f3f3;
padding: 15px;
border-radius: 3px;
margin: 30px 30px;
color: #5a5a5a;
font-weight: 300;
position: relative;
line-height: 24px;
}
.icon_descr_block .bubble div span {
width: 0px;
height: 0px;
position: absolute;
border: 10px solid rgba(0, 0, 0, 0);
border-right: 10px solid #F3F3F3;
left: -20px;
top: 42px;
}
.id_blue .num {background: #45c3e8;}
.id_green .num {background: #97c900;}
.id_orange .num {background: #ff5700;}
.id_blue {
color: #45c3e8;
}
.id_green {
color: #97c900;
}
.id_orange {
color: #ff5700;
}

/*header_contact section*/
.phone_email {
padding: 14px 30px;
border-bottom: 1px solid #e8e8e8;
min-height: 50px;
}
.phone_email span {
display: block;
float: left;
margin: 0px 40px 0px 0px;
}
.phone_email span i {
display: inline-block;
margin-right: 12px;
font-size: 13px;
color: #A8A8A8;
}

/*Features block*/
.features_block {
    overflow: overlay;
    min-height: 162px;
}
.features_block div {
width: 50%;
float: left;
}
.features_block div ul {
padding: 20px 30px;
}
.features_block div ul li {
list-style: none;
margin: 13px 0px;
}
.features_block div ul li b {}

/*share block*/
.share_block {
background: #f3f3f3;
overflow: overlay;
min-height: 55px;
}
.share_block div {
width: 50%;
float: left;
}
.share_block div a {
display: inline-block;
margin: 10px 30px;
}
.share_block div div {
width: 50%;
float: left;
padding: 10px 30px;
font-size: 13px;
color: #6f6f6f;
}
.share_block div div span {
display: block;
font-weight: bold;
color: #4A4A4A;
}

/*check in block*/
.check_in {}
.check_in div {
padding: 30px;
}
.check_in div a {}
.check_in div a:hover {}
.check_in div .users_group {
padding: 20px 0px;
margin: 0px -10px;
}
.check_in div .users_group a {
display: inline-block;
margin: 0px 10px;
}
.check_in div .users_group a img {
width: 45px;
border-radius: 3px;
}
/*flickr block*/
.flickr_photo h4 {margin-left: 10px;}
.flickr_photo {
padding: 0px 20px;
}
.flickr_photo ul {
margin: 0px;
padding: 0px;
}
.flickr_photo ul li {
list-style: none;
display: inline-block;
margin: 13px;
overflow: hidden;
width: 140px;
border-radius: 3px;
height: 140px;
}
.flickr_photo ul li img {transition:0.3s;}
.flickr_photo ul li img:hover {opacity: 0.8; transition:0.3s;}

.user_avatars {
width: 45px;
height: 45px;
position: relative;
overflow: hidden;
display: block;
}
.user_go {
position: absolute;
width: 45px;
background: rgba(33, 141, 234, 0.8);
height: 45px;
overflow: hidden;
padding: 13px 17px !important;
border-radius: 3px;
bottom: -65px;
transition: 0.3s;
}
.user_go i {color: #ffffff;}
.user_avatars:hover .user_go {bottom: 0px;transition:0.3s;}


/*reviews*/
.reviews {}
.reviews h4 {
padding: 40px 30px 0px 30px;
font-size: 16px;
margin: 0px;
}
.reviews .rev {
padding: 30px;
border-bottom: 1px solid #E4E4E4;
transition:0.3s;
}
.reviews .rev:hover {
background: #F9F9F9;
transition: 0.3s;
}
.reviews .rev .user {
float: left;
margin: 0px 20px 0px 0px;
padding-top: 4px;
overflow: hidden;
}
.reviews .rev .user img{
width: 45px;
border-radius: 3px;
}
.reviews .rev .texts {
padding-left: 65px;
}
.reviews .rev .head_rev {}
.reviews .rev .head_rev span {
color: #B5B5B5;
font-size: 13px;
padding-left: 20px;
}
.reviews .rev .text_rev {
padding-top: 10px;
color: #606060;
max-width: 900px;
overflow:auto;
}

/*Add comment*/
.add_comment h4 {
padding: 30px 0px;
}
.add_comment {
padding: 0px 30px 50px;
}
.add_comment textarea {
width: 100%;
border: 0px;
background: #f1f1f1;
border-radius: 3px;
resize: vertical;
min-height: 100px;
padding: 15px;
}
.add_comment textarea:focus {outline: none;}
.add_comment a {
margin-top: 15px;
}



/*Map*/
.map_place {
    width: 100%;
    height: 254px;
    margin: 0px;
}

/*similar*/
.similar {  
    padding: 0px 20px;
}
.similar div {
  overflow: auto;
    margin: 0px -20px;
    color: #ffffff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.42);
    padding: 16px 20px;
}

.similar a {
display: block;
color: #217FBB;
}
.similar a:hover {color:#a1fFfB;}
.similar h3 {
   font-family: 'Roboto', sans-serif;
    font-weight: 300;
    color: #ffffff;
    padding: 25px 0px 10px;
}
.similar img {
width: 45px;
border-radius: 3px;
display: block;
float: left;
margin-right: 10px;
}
.similar i {
font-size: 10px;
padding-right: 5px;
color: #0A589B;
}
.address {
    background: rgba(53, 130, 166, 1);  
    color: #fff ;
    width: 320px;
    position: absolute;
    height: 100px;
    top: 75px;
    padding: 18px 24px;
    right: -310px;
    z-index: 2;
    font-size: 15px;
}

.setinha {
    width: 0px;
    height: 0px;
    position: absolute;
    border: 10px solid rgba(0, 0, 0, 0);
    border-right: 10px solid #3582A6;
    left: -20px;
    top: 42px;
}

/*mobie places*/
.mobile_place {
padding: 0px 30px 30px;
overflow: auto;
display: none;
}
.mobile_place .similar {}
.mobile_place .similar div {
color: #BABABA;
width: 50%;
float: left;
}
.mobile_place .similar a {
display: block;
}
.mobile_place .similar h3 {
color: #1B1B1B;
}
.mobile_place .similar img {
width: 45px;
border-radius: 3px;
display: block;
float: left;
margin-right: 10px;
}
.mobile_place .similar i {
color: #BABABA;
}
.mobile_place .address {
background: rgba(0, 0, 0, 0.5);
padding: 10px 15px;
margin-top: 15px;
border-radius: 3px;
color: #ffffff;
}




/*------------------------------------------------------------------
[5. User Profile pages / #User Profile pages]
*/
.vp h1{
padding: 0px 30px 30px;
}
.map_user_visits {width: 100%; height: 300px;}
.marker_visit {
background: rgba(0, 0, 0, 0.83);
border-radius: 3px;
width: auto;
position: fixed;
}
.marker_visit .info {
padding: 10px 30px;
}
.marker_visit .info span {
width: 0px;
height: 0px;
position: absolute;
padding: 0px !important;
left: -16px;
top: 12px !important;
border: 8px solid rgba(255, 0, 0, 0);
top: 0px;
border-right-color: rgba(0, 0, 0, 0.83);
}
.marker_visit .info a {font-size: 14px;}
.marker_visit .info a:hover {font-size: 14px; color: #ffffff;}

/*user left column*/
.user_avatar {
margin-top: 100px;
position: relative;
}
.user_avatar img {
width: 100%;
border-radius: 3px;
}
.user_avatar span {
position: absolute;
background: rgba(36, 112, 178, 0.8);
display: block;
bottom: 0px;
width: 100%;
padding: 8px 15px;
font-size: 28px;
font-family: roboto;
font-weight: 300;
color: #ffffff;
border-bottom-left-radius: 2px;
border-bottom-right-radius: 2px;
}

.user_friends {}
.user_friends h4 {
color: #ffffff;
font-size: 20px;
padding: 20px 10px 0px;
}
.user_friends .users_group {
padding: 0px 4px;
}
.user_friends .users_group a {
width: 45px;
display: block;
float: left;
height: 45px;
padding: 0px;
margin: 9px;
}
.user_friends .users_group a img {
width: 100%;
border-radius: 3px;
}

/*userr btn*/
.user_btn {
margin: 20px 10px;
}

.user_btn a {
display: block;
margin-bottom: 12px;
padding: 10px;
}
.profile_mobile_vis {display: none;}
/*------------------------------------------------------------------
[6. Place grid / #Place grid]
*/

.place_gr_cont {overflow: auto;}
.place_gr_cont h1, .place_li_cont h1  {
    padding: 0px 30px 30px;
}
.place_gr_cont * {transition:0.3s;}

.place_gr_cont .pg {
    width: 50%;
    padding: 30px;
    min-height: 300px;
    float: left;
    background-size: cover !important;
    position: relative;
    max-height: 300px;
    overflow: hidden;
}
.place_gr_cont .pg img{
    position: absolute;
    top: 0px;
    left: 0px;
    width: 100%;
}
.place_gr_cont .pg h2 {
    font-size: 26px;
    color: #ffffff;
    margin-top: 0px;
}

.place_gr_cont .pg h2 span {
    width: 80px;
    height: 1px;
    display: block;
    margin: 20px 0px;
}

.place_gr_cont .pg span {
    font-family: roboto;
    font-size: 16px;
    color: #ffffff;
    line-height: 26px;
    font-weight: 300;
}

.place_gr_cont .pg.style_one {transition:0.3s;}

.place_gr_cont .pg.style_two {
    background: <?php echo $cor_fundo ?>;
    transition: 0.3s;
}

.place_gr_cont .pg.style_two h2 span{
    background: #ffffff;
}

.place_gr_cont .pg.style_three {
    background: #1b2027;
}

.place_gr_cont .pg.style_three h2 span, .place_gr_cont .pg.style_one h2 span {
    background: <?php echo $cor_fundo ?>;
}

.place_gr_cont .pg.style_one.bg_one {
    background: url(../img/pl1.jpg);
    transition:0.3s;
}

.place_gr_cont .pg.style_one.bg_two {
    background: url(../img/pl2.jpg);
    transition:0.3s;
}

.place_gr_cont .pg.style_one.bg_three {
    background: url(../img/pl3.jpg);
    transition:0.3s;
}

.place_gr_cont .pg:hover {
    cursor: pointer;
    background: #ffffff !important;
    transition:0.3s;
}

.place_gr_cont .pg:hover h2 {
    color: <?php echo $cor_fundo ?>;
    transition: 0.3s;
}

.place_gr_cont .pg:hover h2 span {
    background: <?php echo $cor_fundo ?>;
    transition: 0.3s;
}

.place_gr_cont .pg:hover span {
    color: #030102;
    transition:0.3s;
}

.more_btn {
    padding: 10px 20px;
    display: block;
    width: 150px;
    text-align: center;
    border: 2px solid #CBCBCB;
    margin: 30px auto;
    border-radius: 3px;
    color: #CBCBCB;
    clear: both;
}
.more_btn:hover {
    text-decoration: none;
    background: <?php echo $cor_fundo ?>;
    border-color: <?php echo $cor_fundo ?>;
    color: #ffffff;
}


.pg:hover .dar_bg_frid {background: #ffffff;}
.places_cat {padding:0px;}
.places_cat li {
    list-style: none;
}
.places_cat li a {
    display: block;
    padding: 12px 15px;
    border-bottom: 1px solid rgba(0, 67, 124, 1);
    color: #ffffff;
}
.places_cat li a:hover {
    background: <?php echo $cor_fundo ?>;
    color: #ffffff;
    border-bottom: 1px solid <?php echo $cor_fundo ?>;
}
.places_cat li a i {
    margin-right: 15px;
}

.tag {
    padding: 15px;
    margin-top: 30px;
}
.tag h3 {
    color: #ffffff;
    margin-bottom: 20px;
}
.tag ul {
    padding: 0px;
}
.tag ul li {
    list-style: none;
    display: inline-block;
    margin: 0px 1px 7px;
}
.tag ul li a {
    padding: 6px 14px;
    border: 1px solid <?php echo $cor_fundo ?>;
    display: block;
    border-radius: 40px;
}
.tag ul li a:hover {
    background: <?php echo $cor_fundo ?>;
    color: #ffffff;
}

.dar_bg_frid {
    background: rgba(0, 0, 0, 0.7);
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0px;
    left: 0px;
    z-index: 2;
}
.p_cont {
    z-index: 99;
    position: relative;
}


.place_li_cont {}


.place_li_cont .style_list {
    margin-bottom: -1px;
    position: relative;
}

.place_li_cont .style_list img {
    display: block;
    float: left;
    max-width: 200px;
    margin: 14px;
    border-radius: 3px;
}
.place_li_cont .style_list div h2 {
    color: #333333;
    font-size: 26px;
}
.place_li_cont .style_list div h2 a {transition:0.3s;}
.place_li_cont .style_list div h2 a:hover {
    transition:0.3s;
    color:#333;
    text-decoration: none;
}
.place_li_cont .style_list div h2 span {
    width: 80px;
    height: 1px;
    display: block;
    margin: 5px 0px;
    background: <?php echo $cor_fundo ?>;
}
.place_li_cont .style_list div span {
    font-family: roboto;
    font-size: 16px;
    color: #333333;
    font-weight: 300;
    line-height: 26px;
    display: block;
    margin-bottom: 0px;
}
.place_li_cont .style_list .con {
    border-top: 1px solid #E5E5E5;
    border-bottom: 1px solid #E5E5E5;
    overflow: hidden;
}

.place_li_cont .comm i {
    display: block;
    float: left;
    margin-right: 10px;
}
.list_dia {
    position: absolute;
    top: 20px;
    right: 0px;
    width: 40%;
}
.list_dia .ld {
    width: 100px;
    float: right;
    margin: 0px 10px;
}
.list_dia .circle {margin-right: 10px;}
.list_dia span {
    font-size: 14px !important;
    line-height: 32px !important;
}

.content_li {
    float: none;
    margin-left: 240px;
    padding-right: 30px;
}
.pg.style_list {
    transition:0.3s;
}
.pg.style_list:hover {
    background: #F9F9F9;
    transition:0.3s;
}
/*------------------------------------------------------------------
[7. Blog page / #Blog page]
*/
.blog_cat {
    float:left;
    padding: 0px 20px;
    margin-bottom: 0px;
    margin-top: 0px;
}

.blog_cat li {
    list-style: none;
    display: inline-block;
    padding: 9px 1px 0px 0px;
}


.blog_cat li a {
    border: 1px solid #E2E2E2;
    padding: 5px 20px;
    border-radius: 50px;
    display: inline-block;
    color:#91BB48;
}

.blog_cat li a:hover {
  color : white;
}

.blog_cat li span {}

.blog_cat li a i{
    padding-right: 14px;
}

.blog_cat ul.sub-menu {	
    float:left;
    max-height: 0;
    transition: max-height 0.15s ease-out;
    overflow: hidden;       
}


.blog_cat ul.sub-menu li {
   clear: left;
   float:left;
   width:150px; 
   heigh:150px; 
   padding: 5px;       
}

.blog_cat  li:hover ul.sub-menu {
    display: block;            
    padding-top: 35px; 
    max-height: 600px;
    transition: max-height 0.25s ease-in;  
}




.menu-top-maior{
 padding-top: 20px ;
 
}

.menu-top-maior li a{
 color:#0E698D ;
}

.menu-top-maior li a:hover {
 color:#91BB48 ;
}


.lead {
margin-left: 30px;
max-width: 700px;
}
/*Post*/
.post {}

.post.p_style_one {
padding: 70px 50px;
}

.post.p_style_one .post_info {
background: #ffffff;
padding: 20px;
}

.post.p_style_one h2 {
margin-top: 0px;
}

.post.p_style_one h2 span {
display: block;
width: 100px;
height: 1px;
background: <?php echo $cor_fundo ?>;
margin: 20px 0px;
}

.post.p_style_one .p_text {}

.post.p_style_one .p_footer {}

.post.p_style_one .p_footer ul {
padding: 0px;
margin-top: 18px;
}

.post.p_style_one .p_footer ul li {
list-style: none;
padding: 10px 20px 0px 0px;
display: inline-block;
}

.post.p_style_one .p_footer ul li a i {
color: #C5C5C5;
font-size: 13px;
display: inline-block;
margin: 0px 8px 0px 0px;
}




.post.p_style_one.vdk {
background: url('../img/blog_post_vdk.jpg');
background-size: cover;
}



/*------------------------------------------------------------------
[8. Post page / #Post page]
*/
.post.p_style_one.open {
padding-bottom: 0px;
min-height: 300px;
position: relative;
}
.open.post_info {
padding-bottom: 0px !important;
margin-bottom: 0px;
margin-top: 136px;
}

.open.post_info h1 {
font-family: 'Oswald', sans-serif;
padding: 0px 10px;
margin: 0px;
font-size: 44px;
line-height: 60px;
}
.linha_azul {
display: block;
width: 100%;
height: 1px;
background: <?php echo $cor_fundo ?>;
margin: 20px 0px;
}

.post_content {
    text-align: justify;
    padding: 10px 70px 30px;
    font-size: 16px;
    font-family: roboto;
    font-weight: 300;
    line-height: 32px;
    color: #383838;
}

.Subscribe {
background: url('../img/blog_post_bg.jpg');
padding: 10px;
margin: 40px 0px;
}
.Subscribe div {border:7px solid #ffffff; padding: 20px;}
.Subscribe div h2 {
margin: 0px;
text-align: center;
color: #ffffff;
}
.Subscribe div form {
width: 500px;
margin: 0 auto;
margin-top: 20px;
margin-bottom: 10px;
}
.Subscribe div form input {
border: 0px;
border-radius: 3px;
margin-right: 10px;
font-size: 14px;
padding: 0px 10px;
min-width: 370px;
}
.Subscribe div form button {}

.post_content .p_footer {
      background: #f1f1f1;
      padding: 20px 30px 20px 30px;
      overflow: hidden;
      width:600px;
      
}
.post_content .p_footer ul {
    padding: 0px;
}
.post_content .p_footer ul li {
    list-style: none;
    display: inline-block;
    padding: 0px 30px 0px 0px;
}

.post_content .p_footer ul li a {}
.post_content .p_footer ul li a i {
    font-size: 13px;
    padding-right: 10px;
    color: #BEBEBE;
}
/*author*/
.author {
background: #f1f1f1;
padding: 20px 90px;
overflow: hidden;
}

.author img {
float: left;
display: block;
border-radius: 100px;
width: 95px;
margin-right: 30px;
}

.author a {
display: block;
font-size: 26px;
font-weight: 300;
margin-bottom: 10px;
}

.author span {}


.reviews.open {}
.reviews.open h4 {
padding: 50px 90px 0px;
}
.reviews.open .rev {
padding: 30px 90px;
}

.reviews.open .add_comment {
padding: 0px 90px 40px;
}

.reviews.open .add_comment h4 {
padding: 35px 0px 20px;
}

.fourzerofour {
background: url(../img/404bg.jpg);
background-size: cover;
}
.fourzerofour div {
max-width: 760px;
margin: 100px auto;
text-align: center;
width: 80%;
}

.fourzerofour div img {
    width: 100%;
    max-width: 731px;
}
.fourzerofour div span {
    font-size: 22px;
    color: #ffffff;
    font-weight: 300;
    font-family: roboto;
    display: block;
    margin-bottom: 40px;
    margin-top: -50px;
}
.fourzerofour div a {}

.menu.mobile #close_menu {
    display: none;
}

.affix {
    position: fixed;
    top: 60px;
    max-width: 300px;
}






/******************************************************************************************/
/*****************************       Menu Direito    **************************************/
/******************************************************************************************/

.menu_direito {
   
}

@media screen and (max-width: 850px) {
  .menu-topo{
    display:none;
  }
  #over_map_right { 
      display:none;
  }
}

@media screen and (max-height: 350px) { 
  #over_map_right { 
      display:none;
  }
}


@media screen and (max-height: 500px) and (min-height: 350px) {     
  #over_map_right { 
      max-height:62%;
  }
}

@media screen and (max-height: 850px) and (min-height: 500px) {     
  #over_map_right { 
      max-height:72%;
  }
}

@media screen and (min-height: 850px) {     
  #over_map_right { 
      max-height:79%;
  }
}







#over_map_right { 
    top:85px;
    position: absolute; 
    background-color: #eee;    
    right: 10px; 
    z-index: 9;  
    width:240px;
    height:auto;
    
    overflow:auto; 
    margin: 0 5px;
}

#over_map_right .item {
    border-top: 1px solid #E5E5E5;
    border-bottom: 1px solid #E5E5E5;    
    overflow: hidden;
}

#over_map_right  .item  {transition:0.7s;}

#over_map_right  .item:hover{    
    background-color:#fff;    
}

#over_map_right img {
    display: block;
    float: left;
    width:70px;
    height: 60px;    
    margin: 5px;
    border-radius: 3px;
}

#over_map_right .conteudo_list {
    position:relative;
    float: none;    
    margin-left:90px;
}

#over_map_right .conteudo_list span{
    font-size:11px;
    top:-5px;
    position:relative;
}




#over_map_right div h4 a{    
    font-weight: bold;
    font-size:14px;   
    color:#0E698D;
}


#over_map_right div h4 a {transition:0.3s;}

#over_map_right div h4   a:hover {
color:#333;
    transition:0.3s;
    
    text-decoration: none;
}




/******************************************************************************************/
/*****************************       NOTICIAS        **************************************/
/******************************************************************************************/


 
.corpo{
    width:700px;
}

.corpo img{
    height:405px; 
    width:582px;
 }

.barra-lateral-direita{
    width:280px;
    height:100%;
    float:left;
    margin-left:20px;
}



/******************************************************************************************/
/*****************************       RANKING USUARIOS  e NOTICIAS RELACIONADAS      **************************************/
/******************************************************************************************/



.ranking_usuario, .noticias_relacionadas{
      background: #f1f1f1;
      padding: 20px 30px 20px 10px;
      overflow: hidden;
      width:300px;
}

.ranking_usuario .avatar {
    width: 70px;
    
    height: 70px;
    border-radius: 100px;
    position: relative;
    margin: 0px 10px 0px;
    float:left;
    position:relative;
}

.ranking_usuario .avatar img {
    top:-5px;
    position:relative;
    width: 70px;
    border-radius: 70px;
    display: block;
    border: 2px solid #95BE48;
    
    padding: 6px 6px 6px 6px;
}

.noticias_relacionadas .texto-pequeno,.ranking_usuario .texto-pequeno{ 
  position:relative;
  font-size:14px;
  line-height:normal;
  
}

.noticias_relacionadas hr  {  
  background-color: #1184AF;
  height: 1px;
  width: 90%;
}

.ranking_usuario  hr {  
  background-color: #95BE48;
  height: 1px;
  width: 90%;
}

.ranking_usuario  .ad {  
         background-color: #1184AF; 
         transition:0.3s;
}

.ranking_usuario  .ad:hover {  
         background-color: #F1F1F1; 
         transition:0.3s;
}
  
.ranking_usuario  .ad a {                    
    color: #FFF;
    text-decoration: none;
    transition: 0.3s;
}

.ranking_usuario .ad a:hover {
    color: #1184AF  ;
    text-decoration: none;        
    transition:0.3s;
}


.noticias_relacionadas img{
    width:100px;
    padding: 0 10px 0 10px;
}



/******************************************************************************************/
/*****************************       RESPONSIVOS      **************************************/
/******************************************************************************************/




@media (max-width: 1200px) {
         .corpo{
            width:500px; 
         }
         
         .corpo img{
            width:500px;
            height:340px;
         }
}

@media (max-width: 1100px) {
  #btn-adicionar-lugares{
    display:none;
  }
}

@media (max-width: 990px) {

   #menu-topo, #logotipo{
       display:none;
   }

    .barra-lateral-direita{
        display:none;
    }
    
      .corpo{
            width:660px; 
         }
         
         .corpo img{
            width:500px;
            height:340px;
         }
}

@media (max-width: 540px) {
    .header{
      display:none;
    }
    
      .corpo{
            width:350px; 
         }
         
         .corpo img{
            width:300px;
            height:200px;
         }
}