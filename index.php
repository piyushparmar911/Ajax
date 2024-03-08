<?php
$con = mysqli_connect('localhost','root','','student');
$query = "SELECT * FROM student_data";
$result = mysqli_query($con,$query);

$data = mysqli_fetch_all($result ,MYSQLI_ASSOC);

$index=0;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="./js/jquery.min.js"></script>
</head>

<body>
    <div class="container mt-5 d-flex flex-row">
        <div class="student col-4">

            <div class="card border-success mb-3" style="max-width: 30rem;">
                <div class="card-header">Insert Student-detail</div>
            </div>

            <form>
            <div class="mb-3">
                <label  class="form-label">Student Name</label><br>
                <input type="text" id="Name" class="w-75 border border-muted">
            </div>
            <div class="mb-3">
                <label class="form-label">Student Roll</label><br>
                <input type="number" id="Roll" class="w-75 border border-muted">
            </div>

            <div class="mb-3">
                <label class="form-label">Student Email</label><br>
                <input type="email" id="Email" class="w-75 border border-muted">
            </div>

            <div class="mb-3">
                <label  class="form-label">Student Address</label><br>
                <input type="text" id="Address" class="w-75 border border-muted">
            </div>

            <button type="submit" onclick="insert()" class="btn btn-primary">Submit</button>


        </form>
    </div>

    <div class="showstudetn mx-5 px-5 col-6">
    <div class="card border-info mb-3" style="max-width: 30rem;">
                <div class="card-header">Show Student-detail</div>
            </div>
    <table class="table text-center">
  <thead>
    <tr>
      <th scope="col">Index</th>
      <th scope="col">Name</th>
      <th scope="col">Roll</th>
      <th scope="col">Email</th>
      <th scope="col">Address</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($data as $row){?>
    <tr>
        <th><?=++$index?></th>
        <td><?=$row['Name']?></td>
        <td><?=$row['Roll']?></td>
        <td><?=$row['Email']?></td>
        <td><?=$row['Address']?></td>
        <td><button class="border border-danger bg-light"><a href="./api/update.php?id=<?= $row['id'] ?>" class="text-decoration-none text-dark">Update</a></button></button></td>
        <td><button class="border border-danger bg-light"><a class="text-decoration-none text-dark" href="./api/delete.php?id=<?=$row['id']?>">Delete</a></button></td>
    </tr>
<?php } ?>
   
  </tbody>
</table>
    </div>
    </div>
    
</body>
<script>
    function insert()
    {
        let Name = $('#Name').val();
        let Roll= $('#Roll').val();
        let Email= $('#Email').val();
        let Address= $('#Address').val();

        $.ajax({
            url: './api/insert.php',
            type: 'POST',
            data: {
                Name: Name,
                Roll: Roll,
                Email: Email,
                Address: Address
            },
            success: function(response){
                console.log(response);
                if(response)
                {
                    console.log("inserted");
                } else {
                    console.log("Not inserted");
                }
            }
        });
    }
</script>
</html>
