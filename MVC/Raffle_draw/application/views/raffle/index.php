
<?php $this->load->view('raffle/partials/header') 
?>
	  <p>There are <?= $this->session->userdata('count'); ?> lucky winners selected</p>
	 	  <form class="form-coupon" action="process" method="POST">
			<label class="ticket-number"><?= rand(1000000,9999999); ?></label>
<?php	if($this->session->userdata('count')==0){
?>			<input class = "btn-claim" type="submit" value="Reset"></a>
<?php	}else{
?>			<input class = "btn-claim" type="submit" value="Pick more"></a>
<?php	}
?>		  </form>
<?php $this->load->view('raffle/partials/footer') 
?>