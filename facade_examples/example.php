<?php

class Enemy{

	private $name;
	private $weakness;

	public function __construct($name){
		$this->setName($name);
		$this->setWeakness(new Weakness);
		$this->printName();
		$this->printWeekness();
	}
	private function printName(){
		print "your name is " . $this->getName() . ". ";
	}
	private function setName($name){ $this->name = $name;}
	
	private function getName(){ return $this->name;}
	
	private function setWeakness( Weakness $weakness){
		$this->weakness = $weakness->getWeakness();
	}
	private function getWeakness(){ return $this->weakness;}
	
	private function printWeekness(){
		print "your weekness is " . $this->getWeakness() . ".\n\r";
	}
}

class Weakness{
	private $weakness = null;
	private $weaknessess = array("fire","water","air" , "rotten food");
	
	public function __construct(){

		$this->setWeakness(rand(0,count($this->weaknessess) -1));

	}

	private function setWeakness($number){ $this->weakness = $this->weaknessess[$number]; }
	public function getWeakness(){ return $this->weakness;}
}

$enemy = new Enemy("JAFAR");
$enemy = new Enemy("Hitler");