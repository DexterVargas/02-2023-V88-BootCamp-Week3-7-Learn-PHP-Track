<?php

class Item{
	public $name;
	public $price;
	public $stock;
	public $sold;

	public function __construct($name, $price, $stock){
		$this->sold = 0;
		$this->name =$name;
		$this->price=$price;
		$this->stock=$stock;
	}
	public function logDetails(){
		echo "</br> Item Name: ". $this->name;
		echo "</br> Item Price: ". $this->price;
		echo "</br> Item Stock: ". $this->stock;
		echo "</br> Item Sold: ". $this->sold;
        return $this;
	}
	public function buy(){
		if ($this->stock!=0) {
			echo "</br> Buying.. ";
			$this->sold += 1;
			$this->stock-=1;
		}else {
			echo "</br> Buying.. ";
			echo "</br><em> Out of stock.. </em>";
		}
        return $this;
	}
	public function return(){
		
		if ($this->sold !=0) {
			echo "</br> Returning.. ";
			$this ->sold -=1;
			$this->stock+=1;
		}else {
			echo "</br> Returning.. ";
			echo "</br> <em> Stock is full. maybe you returned wrong item.. </em>";
		}
        return $this;
	}
}

$instance1 = new Item('Palamig',10,10);
$instance2 = new Item('pisbol',2,20);
$instance3 = new Item('kikyam',5,10);

echo "<br><br>";
$instance1->buy()->buy()->buy()->return()->logDetails();

echo "<br><br>";
$instance2->buy()->buy()->return()->return()->logDetails();

echo "<br><br>";
$instance3->return()->return()->return()->logDetails();

