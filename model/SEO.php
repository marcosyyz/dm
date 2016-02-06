<?php

class SEO {
        
    private $title;
    private $description;  
    private $image;  
    private $url;  
    private $keywords; 
    //titulo 70 linhas
    //description 160  linhas

    
    public function __construct(){
        $this->setTitle('Diret&oacute;rio Mogi - O guia de Mogi das Cruzes e região SP');        
        $this->setImage(ROOT_URL.'view/img/logo-Diretorio-Mogi.png');
        $this->setDescription('Encontre tudo que precisa sem sair de Mogi das Cruzes, SP. Veja notícias sobre a cidade, dicas , avalia&ccedil;&otilde;es, telefone, endere&ccedil;o, mapas e rotas');
        $this->setKeyWords('Notícias, Mogi das Cruzes, endereço, avalia&ccedil;&otilde;es, dicas, eventos');
        $this->setUrl('http://diretoriomogi.com.br');        
    }
    
    public function setTitle($title){
        $this->title = $title;
    }
    
    public function getTitle(){
        return $this->title;
    }
    
     public function setDescription($desc){
        $this->description = $desc;
    }
    
    public function getDescription(){
        return $this->description;
    }
    
    public function setImage($img){
        $this->image = $img;
    }
    
    public function getImage(){
        return $this->image;
    }
    
    public function setUrl($param){
        $this->url = $param;
    }
    
    public function getUrl(){
        return $this->url;
    }
    
    public function setKeyWords($param){
        $this->keywords = $param;
    }
    
    public function getKeyWords(){
        return $this->keywords;
    }
}
