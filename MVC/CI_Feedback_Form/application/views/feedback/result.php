<?php $this->load->view('feedback/partials/header')?>
		<form action="feedback" method="post">
			<h1>Submitted Entry</h1>
			<label>Your name (optional):</label> <span><?= (!$name)? 'Anonymous': $name?></span>
			<p></p>
			<label> Course Title:</label><span><?= $course?></span>
			<p></p>
			<label>Give Score(1-10):</label><span><?= $score?>pts</span>
			<p></p>
			<label>Reason:</label>
			<p><?= (!$reason)? '--no reason--': $reason; ?></p>
			<input type="submit" value="Return">
		</form>
<?php $this->load->view('feedback/partials/footer')?>