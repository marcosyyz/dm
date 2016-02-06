$('.search').keypress(function(e) {
    if(e.which == 13) {
         $( "#form_busca" ).submit();
    }
});


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

