<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $con = mysqli_connect('localhost', 'root', '', 'student');
    $id = $_GET['id'];
    $query = "SELECT * FROM student_data WHERE id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
}

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
        header("Location: ../index.php"); // Redirect to index page after successful update
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    mysqli_close($con);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form action="./api/update.php" method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">
        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" name="Name" class="form-control" value="<?= $row['Name'] ?>">
        </div>
        <div class="mb-3">
        <label class="form-label">Student Roll</label>
        <input type="number" name="Roll" class="form-control" value="<?= $row['Roll'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Student Email</label>
        <input type="email" name="Email" class="form-control" value="<?= $row['Email'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Student Address</label>
        <input type="text" name="Address" class="form-control" value="<?= $row['Address'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

</body>
</html>