<?php

class Router 
{
    private $requestURI;
    private $address = array();
    private $params = array();

    public function __construct($requestURI = "") {
        $this->requestURI = $requestURI;
        $this->address  = explode("/", explode("?", $requestURI)[0]);
        $this->params = array_merge($_POST, $_GET);
    }

    public function exec(){
      switch( $this->address[1] ){
	case "products":
          require_once(BASE_DIR . "/view/products.php");
          break;
        case "":
        case "home":
          require_once(BASE_DIR . "/view/home.php");
          break;
      }
    }
}
