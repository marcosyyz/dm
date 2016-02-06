<?php

class Ad
{  

  protected $host    = "mysql.diretoriomogi.com.br"; // server name
  protected $user    = "diretoriomogi04";          // user name
  protected $pass    = "aGmrzl2112";          // password
  protected $dbname  = "diretoriomogi04";          // database name
  protected $charset = "utf8";   
	
  public function __construct()
  {  
  }

  # FUNCTIONS TO RETRIEVE INFO
  public function getHost()
  {    
    return $this->host;
  }
  
  public function getUser()
  {    
    return $this->user;
  }
  
    public function getPass()
  {    
    return $this->pass;
  }
  
    public function getDBname()
  {    
    return $this->dbname;
  }
    public function getCharset()
  {    
    return $this->charset;
  }


public function __destruct() {
		
	}

	
}
?>