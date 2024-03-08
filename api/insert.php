<?php
$name = $_POST['Name'];
$roll = $_POST['Roll'];
$email = $_POST['Email'];
$address = $_POST['Address'];

$con = mysqli_connect("localhost","root","","student");

$query = "INSERT INTO   student_data (Name, Roll , Email ,Address) values('$name','$roll','$email','$address')";
mysqli_query($con,$query);
?>