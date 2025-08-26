<?php 

class HTML_Generator{
	public $product;
	public $list_items;

	public function render_input($product){
		$this->product = $product;
		foreach ($this->product as $keys => $label) {
			echo '<label>'.$keys.'</label>';
			echo '<input type="text" value="'. $label. '"></br>';
		}
		return $this;
	}
	public function render_list($list_items,$list_type){
		$this->list_items = $list_items;
		if ($list_type=='ordered') {
			echo '<ol>';
			foreach ($this->list_items as $list) {
				echo '<li>'.$list.'</li>';
			}
			echo '</ol>';
		}else {
			echo '<ul>';
			foreach ($this->list_items as $list) {
				echo '<li>'.$list.'</li>';
			}
			echo '</ul>';
		}
		return $this;
	}
	}

$item1 = new HTML_Generator();
$item2 = new HTML_Generator();

$item1->render_input(array('Name'=>'Bag', 'Price'=>'250','Stocks'=>'10'));

$item2->render_list(array('Apple', 'Banana', 'Cherry'),'ordered');
