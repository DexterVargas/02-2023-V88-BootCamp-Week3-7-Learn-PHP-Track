<?php 
define ('A_b', 7);
$bb = A_b+A_b;
echo $bb;
$val = 'iikkk dka sjd';
$x = explode(' ', $val);
print_r ($x); 
$posts = array();
var_dump($posts);

$exams = array(
    array(
     'title' => 'Web Fundamentals Track Exam',
     'language' => 'HTML &amp; CSS'
    ),
    array(
     'title' => 'PHP Track Exam',
     'language' => 'PHP using CodeIgniter, Ajax'
    ),
    array(
     'title' =>'JS Track Exam',
     'language' => 'Express, Sockets'
    )
   );

   foreach($exams as $exam) {
    //echo "<p>" . $exam['title'] ."-". $exam['language'] . "</p>";
    echo "<p> {$exam['title']} - {$exam['language']} </p>";
   }

?>


<ul>
<?php
for($player = 1; $player <= 5; $player++) {
    echo "<li>Player #$player runs!<ul>";
    for($cycle = 1; $cycle <= $player; $cycle++) {
       echo "<li> Done running cycle $cycle...</li>";
    }
    echo "</ul></li>";
}
?>
</ul>