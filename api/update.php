<?php
    $con = mysqli_connect('localhost', 'root', '', 'student');
    $id = $_GET['id'];
    $query = "SELECT * FROM student_data WHERE id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery.min.js"></script>
</head>
<body>
    
    <form>
        <input type="hidden" id="id" value="<?= $row['id'] ?>">
        <div class="mb-3">
            <label class="form-label">Student Name</label>
            <input type="text" id="Name" name="Name" class="form-control" value="<?= $row['Name'] ?>">
        </div>
        <div class="mb-3">
        <label class="form-label">Student Roll</label>
        <input type="number" id="Roll" name="Roll" class="form-control" value="<?= $row['Roll'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Student Email</label>
        <input type="email" id="Email" name="Email" class="form-control" value="<?= $row['Email'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Student Address</label>
        <input type="text" id="Address" name="Address class="form-control" value="<?= $row['Address'] ?>">
    </div>
    <button type="button" onclick="updatedata()" class="btn btn-primary">Update</button>
</form>
</body>
<script>
    function updatedata() {
        let id=$('#id').val();
        let Name=$('#Name').val();
        let Roll=$('#Roll').val();
        let Email=$('#Email').val();
        let Address=$('#Address').val();

        let data = {
            id:id,
           Name: Name,
            Roll: Roll,
            Email: Email,
            Address: Address
        };

        $.ajax({
            url:'./update1.php',
            type: 'POST',
            data,
            success: function(response){
                console.log(response);
                if(response)
                {
                    console.log('updated......');
                            window.location.href = "../index.php"
                }
                else{
                    console.log("Not inserted");   
                }

                
            }
            
        })
    }
</script>
</html>