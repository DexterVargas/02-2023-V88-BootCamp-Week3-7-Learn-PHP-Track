<?php 

class Character{
	public $name;
	public $health=100;
	public $stamina=100;
	public $manna=100;

	public function walk(){
		$this->stamina -=1;
		return $this;
	}
	public function run(){
		$this->stamina-=3;
		return $this;
	}
	public function showStats(){
		echo    "<br>Name: " . $this->name . 
				"<br>Health: " . $this->health .
				"<br>Stamina: " . $this->stamina .
				"<br>Manna: " . $this->manna .
				"<br>";
	}    
}

class Shaman extends Character{
	public function __construct(){
		$this->health = 150;
	}
	public function heal(){
		$this->health += 5;
		$this->stamina += 5;
		$this->manna += 5;
		return $this;
	}
}

class Swordsman extends Character{
	public function __construct(){
		$this->health = 170;
	}
	public function slash(){
		$this->manna -= 10;
		return $this;
	}
	public function showStats(){
		parent::showStats();
		echo "I am Atomic.";
	}
}

$character = new Character;
$character->name = "Dexter";

$character->walk()->walk()->walk()->run()->run()->showStats();

$shaman = new Shaman;
$shaman->name = "Shaman King Yoh";

$shaman->walk()->walk()->walk()->run()->run()->heal()->showStats();

$swordsman = new Swordsman;
$swordsman->name = "Shadow";

$swordsman->walk()->walk()->walk()->run()->run()->slash()->slash()->showStats();
?>