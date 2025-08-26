<?php $this->load->view('moneybutton/partials/header')?>
		<div class="main-container">
			<h1>Your money: <?=$this->session->userdata('money'); ?></h1><!--
		 --><form method="post" action="process" class="form-reset">
				<input type="hidden" name="reset" value="reset-session">
				<input type="submit" value ="Reset" class="reset"> 
			</form>

			<h2>Chances left: <?=$this->session->userdata('chances'); ?></h2>

			<form action="process" method="post" class="low bet-box">
				<input type="hidden" name="risk" value="low" />
				<h3>Low Risk</h3>
				<input type="submit" value="Bet" class="bet">
				<label> by -25 up to 100</label>
			</form>
			<form action="process" method="post" class="mod bet-box">
				<input type="hidden" name="risk" value="moderate" />
				<h3>Moderate Risk</h3>
				<input type="submit" value="Bet" class="bet">
				<label> by -100 up to 1000</label>
			</form>
			<form action="process" method="post" class="high bet-box">
				<input type="hidden" name="risk" value="high" />
				<h3>High Risk</h3>
				<input type="submit" value="Bet" class="bet">
				<label> by -500 up to 2500</label>
			</form>
			<form action="process" method="post" class="severe bet-box">
				<input type="hidden" name="risk" value="severe" />
				<h3>Severe Risk</h3>
				<input type="submit" value="Bet" class="bet">
				<label> by -3000 up to 5000</label>
			</form>
			<label class="game-host">Game Host:</label>
			<ul>
<?php 		$logs= $this->session->userdata('gamelogs');
				foreach ($logs as $val) {
					if(strpos($val, '-')){
?>			    <li class = "decrease"><?=$val ?></li>
<?php				}elseif(strpos($val, '!')){
?>			    <li class ="over"><?=$val ?></li>
<?php				}else {
?>			    <li><?=$val ?></li>
<?php				}
				}
?>		   </ul>
		</div>
<?php $this->load->view('moneybutton/partials/footer')?>