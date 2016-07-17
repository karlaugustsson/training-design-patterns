<?php

class GravatarService{
	private $email = null;
	private $gravatar_url  = 'https://www.gravatar.com/avatar/'; 
	
	public function __construct($email){
		$this->setEmail($email) ;
		$this->setGravatarUrl(); 
	}

	private function setEmail($email){
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  		throw new Exception("email : ". $email . " is not valid", 1);
  		
		}
		$this->email = $email;
	}

	private function getEmail(){return $this->email;}

	private function setGravatarUrl(){
		$this->gravatar_url = $this->gravatar_url . md5( strtolower( trim( $this->getEmail() ) ) );
	}

	public function Getgravatar($size , $default = "mm" , $r = "g" , $img = false , $attributes = array() ){
		$url = $this->gravatar_url . "?s=$size&d=$default&r=$r";
	    if ( $img ) {
	        $url = '<img src="' . $url . '"';
	        foreach ( $atts as $key => $val )
	            $url .= ' ' . $key . '="' . $val . '"';
	        $url .= ' />';
	    }
	    return $url;
	}


}