<?php

class GravatarService{
	private $email = null;
	private $gravatar_url  = 'https://www.gravatar.com/avatar/'; 

	private $allowed_imageset = array("404" , "mm" , "identicon" , "monsterid" , "wavatar" ) ;
	
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

		if( ! in_array($default , $this->allowed_imageset) ){
			throw new Exception("incorrect imageset given: " . $default. " , allowed imagset are " . implode("," , $this->allowed_imageset  ) ,1);
			
		}
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