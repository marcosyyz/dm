<?php
include_once(ROOT."model/db_classe.php");

class Curtida extends Classe{
    
    public $item;
    public $noticia;
    public $usuario;
    public $tipo;
    

    public function __construct($item, $noticia,$usuario) {
        parent::__construct();  
        $this->item = $item;
        $this->noticia = $noticia;
        $this->usuario = $usuario; 
        
    }    
    
    public function total($tipo){
        $retorno = -99;         
            if (($this->noticia != -1) && ($this->item == -1)){
                // noticia
                $retorno = $this->total_noticia($tipo);                
            }else {
                //item 
                if($this->item != -1)
                    $retorno = $this->total_item($tipo);                
            }
        return $retorno;
    }
    
    public function total_noticia($tipo){
        return  $this->db->QuerySingleValue(" SELECT COALESCE(COUNT(NOTCURTIDA_NOTICIA),0) FROM NOTICIA_CURTIDA 
                              WHERE NOTCURTIDA_NOTICIA        = ".$this->noticia." "                          
                           ." AND   NOTCURTIDA_TIPOCURTIDA = ".$tipo);
    }
    
    public function total_item($tipo){
        return  $this->db->QuerySingleValue("SELECT COALESCE(COUNT(ITEMCURTIDA_ITEM),0) FROM ITEM_CURTIDA 
                              WHERE ITEMCURTIDA_ITEM        = ".$this->item." "                          
                           ." AND   ITEMCURTIDA_TIPOCURTIDA = ".$tipo);
    }
    
    
    
    
    public function noticia_verificar_ja_curtida($tipo){         
         return  ($this->db->QuerySingleValue("SELECT COUNT(NOTCURTIDA_NOTICIA) FROM NOTICIA_CURTIDA
                              WHERE NOTCURTIDA_NOTICIA        = ".$this->noticia." "
                           ." AND   NOTCURTIDA_USUARIO     = ".$this->usuario
                           ." AND   NOTCURTIDA_TIPOCURTIDA = ".$tipo) > 0);                                
    }
     
    public function item_verificar_ja_curtido($tipo){ 
         return  ($this->db->QuerySingleValue("SELECT COUNT(ITEMCURTIDA_ITEM) FROM ITEM_CURTIDA 
                              WHERE ITEMCURTIDA_ITEM        = ".$this->item." "
                           ." AND   ITEMCURTIDA_USUARIO     = ".$this->usuario
                           ." AND   ITEMCURTIDA_TIPOCURTIDA = ".$tipo) > 0);                                
    }
     
    
    
    public function enviar_curtida($tipo){         
        //se for noticia 
        if (($this->noticia != -1) && ($this->item == -1)){
            ////ja curtiu, remover                
            //if($this->noticia_verificar_ja_curtida($tipo)){
//                $this->remover_noticia($tipo); 
//                return -1;
//            }else{
                $this->adicionar_noticia($tipo);
                return 1;
  //          }                                
        }else{// se nao é item       
            //ja curtiu , remover
        //    if($this->item_verificar_ja_curtido($tipo)){
          //      $this->remover_item($tipo); 
            //    return -1;        
            //}else{//se nao adicionar
                $this->adicionar_item($tipo);
                return 1;
            //}
        }
    }



    public function adicionar_noticia($tipo){
        $valores["NOTCURTIDA_NOTICIA"]  = MySQL::SQLValue($this->noticia, MySQL::SQLVALUE_NUMBER);
        $valores["NOTCURTIDA_USUARIO"]  = MySQL::SQLValue($this->usuario, MySQL::SQLVALUE_TEXT);
        $valores["NOTCURTIDA_TIPOCURTIDA"]  = MySQL::SQLValue($tipo, MySQL::SQLVALUE_TEXT);
       
        $this->db->InsertRow("NOTICIA_CURTIDA", $valores);        
    }
    
    public function remover_noticia($tipo){
        $sql = " DELETE FROM NOTICIA_CURTIDA WHERE NOTCURTIDA_NOTICIA = ".$this->noticia."
                   AND NOTCURTIDA_USUARIO = ".$this->usuario."";
       
        if(isset($tipo))
            $sql = $sql ." AND NOTCURTIDA_TIPOCURTIDA = ".$tipo;
        
        
        $this->db->Query($sql);        
    }
    



     public function adicionar_item($tipo){
        $valores["ITEMCURTIDA_ITEM"]  = MySQL::SQLValue($this->item, MySQL::SQLVALUE_NUMBER);
        $valores["ITEMCURTIDA_USUARIO"]  = MySQL::SQLValue($this->usuario, MySQL::SQLVALUE_TEXT);
        $valores["ITEMCURTIDA_TIPOCURTIDA"]  = MySQL::SQLValue($tipo, MySQL::SQLVALUE_TEXT);
       
        $this->db->InsertRow("ITEM_CURTIDA", $valores);        
    }
    
    public function remover_item($tipo){
        $sql = " DELETE FROM ITEM_CURTIDA WHERE ITEMCURTIDA_ITEM = ".$this->item.
                  " AND   ITEMCURTIDA_USUARIO = ".$this->usuario."";
       
        if(isset($tipo))
            $sql = $sql ." AND ITEMCURTIDA_TIPOCURTIDA = ".$tipo;
        
        
        $this->db->Query($sql);        
    }
    
}
    
    