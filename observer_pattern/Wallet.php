<?php 

class Wallet {
	private $cards = array();

	public function addCard(Card $card){
		array_push($this->cards, $card);
		print "<p> Added " . $card->getcardName() ." to your wallet.</p>";
	}
	public function removeCard(Card $card){

		$index = array_search($card, $this->cards);

		if( $index === false){

			throw new Exception("the card:({$card->getCardName()}) you tried to remove doesnt exist", 1);
			
		}
		array_splice($this->cards, $index ,1);

		print "<p> removed " . $card->getcardName() ." from your wallet.</p>";
	}


}

interface Card{
	public function getName();
	public function setName($first_name , $last_name);
}

class Visa implements Card{
	private $first_name = "";
	private $last_name = "";
	private $card_name = "VISA";

	public function __construct($first_name,$last_name){
		$this->setName($first_name , $last_name);
	}
	public function setName($first_name ,$last_name){
		$first_name[0] = strtoupper($first_name[0]);
		$last_name[0] = strtoupper($last_name[0]);
		$this->first_name = $first_name;
		$this->last_name = $last_name;
	}
	public function getName(){
		return $this->first_name . " " . $this->last_name ; 
	}
	public function getCardName(){
		return $this->card_name ; 
	}
}


$wallet = new Wallet();

$card = New Visa("karl" , "Augustsson");


$wallet->addCard($card);

$wallet->removeCard($card);

