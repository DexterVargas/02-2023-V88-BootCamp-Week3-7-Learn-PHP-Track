<?php $this->load->view('main/partials/header')?>
<?php if(!isset($num)){
?>    <img src="<?= base_url('assets/img/ninja'.rand(1,5).'.jpg'); ?>" alt="Ninjas1">
<img src="<?= base_url('assets/img/ninja'.rand(1,5).'.jpg'); ?>" alt="Ninjas2">
<img src="<?= base_url('assets/img/ninja'.rand(1,5).'.jpg'); ?>" alt="Ninjas3">
<img src="<?= base_url('assets/img/ninja'.rand(1,5).'.jpg'); ?>" alt="Ninjas4">
<img src="<?= base_url('assets/img/ninja'.rand(1,5).'.jpg'); ?>" alt="Ninjas5">
<?php
    }else{
        for($ninjas=1; $ninjas<=$num;$ninjas++){
?>    <img src="<?= base_url('assets/img/ninja'.rand(1,5).'.jpg'); ?>" alt="Ninjas">
<?php    }
           
    }
?>
<?php $this->load->view('main/partials/footer')?>