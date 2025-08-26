<?php
// index.php
// include connection page
require_once('db_connection.php');
// get a single record from the interests table joining musics
$query = "SELECT subjects.title AS subject, lessons.topic AS lesson, lessons.handout_url
          FROM lessons
          LEFT JOIN subjects ON lessons.subject_id = subjects .id LIMIT 1";
// since we've included the connection page, we can use the $connection variable
$result = fetch_record($query);
$password = 'password';
echo md5($password);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>playing with sql and connection</title>
</head>
<body>
    <div>
      <h3>Subject: <?= $result['subject'] ?></h3>
      <h3>Lesson: <?= $result['lesson'] ?></h3>
      <a href="<?= $result['handout_url'] ?>">Click here to download handout!</a>
    </div>

    <?php
// get multiple records from the table interests
$query = "SELECT subjects.title AS subject, lessons.topic AS lesson, lessons.handout_url
          FROM lessons
          LEFT JOIN subjects ON lessons.subject_id = subjects .id";
$results = fetch_all($query);
//var_dump($results);
foreach($results as $row)
{
?>
    <div>
      <h3>Subject: <?= $row['subject'] ?></h3>
      <h3>Lesson: <?= $row['lesson'] ?></h3>
      <a href="<?= $row['handout_url'] ?>">Click here to download handout!</a>
    </div>
<?php
}
?>

<form action="process.php" method="post">
    <p><label for="topic">Lesson topic: </label><input type="text" name="topic" id="topic"></p>
    <p><label for="handout_url">Lesson topic URL:</label> <input type="text" name="handout_url" id="handout_url"></p>
    <input type="hidden" name="insert" value="insert">
    <select name="subjects" id="subjects">
<?php   $subject_query = "SELECT * from subjects";
        $subject_result = fetch_all($subject_query);
        //var_dump($subject_result);
        foreach($subject_result as $value)
        {
?>
        <option value="<?= $value['id']?>"><?= $value['title']?></option>
<?php }
?>
        <input type="submit" value="Insert Lesson"></form>
    </select>

<table>
    <tr>
        <th>ID</th>
        <th>Subjects</th>
        <th>Lesson Topics</th>
        <th>Lesson Topic Link</th>
    </tr>

<?php   $table_query = "SELECT lessons.id, subjects.title as Subjects, lessons.topic as Topic, lessons.       handout_url as Topic_Link FROM lessons inner Join subjects on lessons.subject_id = subjects.id order by lessons.id;";
        $table_result = fetch_all($table_query);
        //var_dump($subject_result);
        foreach($table_result as $value)
        {
?>
        <tr>
            <td><?= $value['id'] ?></td>
            <td><?= $value['Subjects'] ?></td>
            <td><?= $value['Topic'] ?></td>
            <td><?= $value['Topic_Link'] ?></td>
            <td><input type="submit" name ="edit" value="edit"> | <input type="submit" name = "delete" value="delete"></td>
        </tr>
<?php  }
?>
</table>

</body>
</html>

    

