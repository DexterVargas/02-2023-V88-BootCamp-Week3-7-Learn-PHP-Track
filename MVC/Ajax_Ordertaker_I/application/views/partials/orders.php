

<?php  
foreach($orders as $order){            
?>    <div class="order">
        <h1>#: <?= $order['id'] ?></h1>
        <h2><?= $order['order'] ?></h2>

    </div>
<?php 
}  ?>
