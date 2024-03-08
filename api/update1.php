<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $con = mysqli_connect('localhost', 'root', '', 'student');
    $id = $_POST['id'];
    $Name = $_POST['Name'];
    $Roll = $_POST['Roll'];
    $Email = $_POST['Email'];
    $Address = $_POST['Address'];

    $query = "UPDATE student_data SET Name='$Name', Roll='$Roll', Email='$Email', Address='$Address' WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: ../index.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
