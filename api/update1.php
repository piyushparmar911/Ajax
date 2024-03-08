<?php
    $con = mysqli_connect('localhost', 'root', '', 'student');
    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $Roll = $_POST['Roll'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];

    $query = "UPDATE student_data SET Name='$Name', Roll='$Roll', Email='$Email', Address='$Address' WHERE id = $id";
    $result = mysqli_query($con, $query);

    echo "updated";
?>
    