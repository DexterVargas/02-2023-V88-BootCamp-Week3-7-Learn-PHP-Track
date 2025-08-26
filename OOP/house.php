<?php 

class House{
    public $location;
    public $price;
    public $lot;
    public $type;
    public $discount;
    public $total_price;

    public function __construct($location, $price, $lot, $type){
        $this->location = $location;
        $this->price = $price;
        $this->lot = $lot;
        $this->type = $type;
        if ($this->type =='Pre-selling') {
            $this->discount = 0.2;
            $this->total_price = $this->price - ($this->price * $this->discount);
        }else{
            $this->discount = 0.05;
            $this->total_price = $this->price -($this->price * $this->discount);
        }
        $this->show_all();
    }
    public function show_all(){
        echo    "Location: " . $this->location . 
                "<br> Price: " . $this->price .
                "<br> Lot: " . $this->lot .
                "<br> Type: " . $this->type .
                "<br> Discount: " . $this->discount .
                "<br> Total Price: " . $this->total_price;
    }
}

$instance1_house = new House('China',2000000,'150sqm','Ready for Occupancy');

echo "<br><br>";

$instance1_house = new House('Russia',5000000,'120sqm','Ready for Occupancy');

echo "<br><br>";

$instance1_house = new House('Maynila',2800000,'110sqm','Pre-selling');

echo "<br><br>";

$instance1_house = new House('Davao',5000000,'190sqm','Ready for Occupancy');

echo "<br><br>";

$instance1_house = new House('Ilocos',4000000,'120sqm','Pre-selling');

echo "<br><br>";
?>