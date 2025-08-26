<div id="quotes">
<?php  
foreach($quotes as $quote)
{     ?>        
    <div class="quote">
        <h1><?= $quote['author'] ?></h1>
        <p><?= $quote['quotes'] ?></p>
    </div>
<?php 
}  ?>
</div>