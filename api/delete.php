<?php
$delete_id  = $_GET['id'];

$connection = mysqli_connect('localhost','root','', 'student');

$query = "DELETE FROM student_data WHERE id = $delete_id";
mysqli_query($connection,$query);

header("Location: ../index.php");

?>