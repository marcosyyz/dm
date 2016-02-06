<script language="javascript" type="text/javascript">
    
var nota = -1;

$(function() {
    $("#rating_star").codexworld_rating_widget({
        starLength: '5',
        initialValue: '',
        callbackFunctionName: 'processRating',
        imageDirectory: '',
        inputAttr: 'postID'
    });
});


(function(a){
    a.fn.codexworld_rating_widget = function(p){
        var p = p||{};
        var b = p&&p.starLength?p.starLength:"5";
        var c = p&&p.callbackFunctionName?p.callbackFunctionName:"";
        var e = p&&p.initialValue?p.initialValue:"0";
        var d = p&&p.imageDirectory?p.imageDirectory:"images";
        var r = p&&p.inputAttr?p.inputAttr:"";
        var f = e;
        var g = a(this);
        b = parseInt(b);
        init();
        g.next("ul").children("li").hover(function(){
          
           
            
            $(this).parent().children("li").css('background-position','0px 0px');
            var a = $(this).parent().children("li").index($(this));
            $(this).parent().children("li").slice(0,a+1).css('background-position','0px -28px');
            if(a+1 == 1)      
                $('#legenda-rating').html('<h3>Precisa Melhorar.</h3>');
            if(a+1 == 2)
                $('#legenda-rating').html('<h3>Regular.</h3>');
            if(a+1 == 3)
                $('#legenda-rating').html('<h3>Bom.</h3>');     
            if(a+1 == 4)      
                $('#legenda-rating').html('<h3>Muito bom!</h3>');     
            if(a+1 == 5)      
                $('#legenda-rating').html('<h3>O melhor!!</h3>');     
            
        },function(){});
        g.next("ul").children("li").click(function(){
            var a = $(this).parent().children("li").index($(this));
            var attrVal = (r != '')?g.attr(r):'';
            f = a+1;
            g.val(f);
            if(c != ""){
                eval(c+"("+g.val()+", "+attrVal+")")
            }
             
        });
        g.next("ul").hover(function(){},function(){           
            if(f == ""){
                $(this).children("li").slice(0,f).css('background-position','0px 0px')
            }else{
                $(this).children("li").css('background-position','0px 0px');
                $(this).children("li").slice(0,f).css('background-position','0px -28px')
            }
        });
        function init(){
            //$('<div style="clear:both;"></div>').insertAfter(g);
            g.css("float","left");
            var a = $("<ul>");
            a.addClass("codexworld_rating_widget");
            for(var i=1;i<=b;i++){
                a.append('<li style="background-image:url(http://localhost/diretorionew/view/img/widget_star.gif)"><span>'+i+'</span></li>')
            }
            a.insertAfter(g);
            if(e != ""){
                f = e;
                g.val(e);
                g.next("ul").children("li").slice(0,f).css('background-position','0px -28px')
            }
        }
    }
})(jQuery);

function processRating(val, attrVal){ 
 nota = val;    
}

</script>

<style>
    .estrelas{        
        position:relative; 
        float:right;
    }
    
    #legenda-rating{
        
        position:relative; 
        float:right;
        margin: 0px;        
        width:250px;
        padding-left: 25px;
        padding-right:10px;       
        min-width:250px;
        
}
    
.codexworld_rating_widget{
    padding-right: 00px;
    padding-bottom: 5px;
    padding-top: 18px;
    margin: 0px;
    float: right;
    
  
}
.codexworld_rating_widget li{
    line-height: 0px;
    width: 28px;
    height: 28px;
    padding: 0px;
    margin: 0px;
    margin-left: 2px;
    list-style: none;
    float: left;
    cursor: pointer;
}
.codexworld_rating_widget li span{
    display: none;
}
</style>



      
<div  id="legenda-rating" >
    <h3>Deixe a sua Nota.</h3>
</div>
<div class="estrelas">
    <input name="rating" value="0" id="rating_star" type="hidden" postID="1" />
</div>             
