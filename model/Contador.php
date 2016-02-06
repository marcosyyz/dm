<?php
include_once(ROOT."model/db_classe.php");

Class Contador{
    
   
      
    public static function adicionar_contador($tabela,$id){
         $db = new Mysql();
         switch ($tabela){
             case 'NOTICIA':
                 $campo_id = 'NOTICIA_CDG';
                 
                 break;
             case 'ITEM':
                 $campo_id = 'ITEM_CDG';
                 break;
         }
         
         $db->Query(' UPDATE '.$tabela.' SET '.$tabela.'_VIEW = '.$tabela.'_VIEW + 1 
                      WHERE '.$campo_id.' = '.$id);
    }
}
