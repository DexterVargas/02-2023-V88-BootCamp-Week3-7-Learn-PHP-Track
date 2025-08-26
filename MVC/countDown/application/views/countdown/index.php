<?php $this->load->view('countdown/partials/header') 
?>
<div> 
    <h1>Countdown before day ends.</h1>
    <h2><?= $time;?> seconds</h2>
    <h2><?= $date;?></h2>
</div>
<?php $this->load->view('countdown/partials/footer') 
?>
