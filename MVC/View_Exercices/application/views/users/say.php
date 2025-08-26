<?php $this->load->view('main/partials/header') 
?>
<?php if(!isset($num)){
?>
    <p><?= $say; ?></p>
<?php 
}else{
    for($times =1; $times<=$num; $times++){
?>
    <p><?= $say; ?></p>
<?php }
}
?>


<?php $this->load->view('main/partials/footer') 
?>
