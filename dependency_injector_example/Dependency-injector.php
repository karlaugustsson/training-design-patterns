<?php
require_once __DIR__  . "/Gravatar-service.php";
class DependencyInjector{

	private $service_list = array();
	
	public function getService($service_name){
		
		if (! array_key_exists($service_name, $this->service_list)){
			throw new Exception("The service : " . $service_name . " doesnt exist");
		}
		return $this->service_list[$service_name]();
	}

	public function registerService($service_name, callable $callable){
		
		if(array_key_exists($service_name, $this->service_list)){
			throw new Exception("The service : " . $service_name . " already exist");
		}
		$this->service_list[$service_name] = $callable; 
	}
}
$config = array("gravatar" => array("email" => "karl.augustsson@gmail.com"));

$di = new DependencyInjector();

$di->registerService("gravatar",function() use($config) { 
	$obj = new GravatarService($config["gravatar"]["email"]);

	return $obj;

});
	

$gravatar = $di->getService("gravatar");
print($gravatar->getGravatar(500,"mm","g",true));
 //;

