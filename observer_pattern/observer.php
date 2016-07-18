<?php
	interface Observer{
		public function add(Company $subject);
		public function notify($price);
	}


	class StockSim implements Observer{
		private $companies = array();


		public function add(Company $subject){
			array_push($this->companies, $subject);
		}
		public function updatePrices(){

			$this->notify(rand(23.00,199.88));  
		}
		public function notify($price){
			foreach ($this->companies as $company ) {
				$company->update($price + rand(23.00,199.88)); 
			}
		}

	}
	interface Company{
		public function buy();
		public function sell(); 
		public function update($price);
	}
	class Google implements Company{
		private $price ; 

		public function __construct($price){
			$this->prince = $price;
			print "<p> creating google at " . $price . "</p>";

		}
		public function buy(){}
		public function sell(){}  
		public function update($price){
			$this->price = $price;
			print "<p> current wallmart price at  " . $this->price . "</p>";
		}
	}
	class Walmart implements Company{
		private $price ; 

		public function __construct($price){
			$this->prince = $price;
			print "<p> creating walmart at " . $price . "</p>";

		}
		public function buy(){}
		public function sell(){}  
		public function update($price){
			$this->price = $price;
			print "<p> current google price at " . $this->price . "</p>";
		}
	}

	 $stockSim = new StockSim();
	 $comp1 = new Google(99.99);
	 $comp2 = new Walmart(25.55);

	 $stockSim->add($comp1);
	 $stockSim->add($comp2);
	 $stockSim->updatePrices();
