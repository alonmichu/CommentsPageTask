<?php  

$name = $_POST['name'];

$comment = $_POST['comment'];

$connection = mysqli_connect("localhost","root","","my_test");  

$name = mysqli_real_escape_string($connection, $name);
$comment = mysqli_real_escape_string($connection, $comment);
$result = mysqli_query($connection,'INSERT INTO Comments (name, comment) VALUES ("'.$name.'", "'.$comment.'")');
header('Location: ../index.php');

?>