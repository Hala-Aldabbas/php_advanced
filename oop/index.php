<?php 
include("reg_process.php");
$db = new db();

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  $sql = "select * from users where id = ".$id;
  $result = mysqli_query($conn, $sql);
  if(mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
    $image = $row['image'];
    unlink($upload_dir.$image);
    $sql = "delete from users where id=".$id;
    if(mysqli_query($conn, $sql)){
      header('location:index.php');
    }
  }
}

?>
<!doctype html>
<html lang="en">

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>registration form using with php oop</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body>
 <div class="container position-absolute top-50 start-50 translate-middle">
  <div class="row">
   <div class="col-lg-12">
    <div class="card">
     <div class="card-header">
      <h2>User Data</h2>
     </div>
     <div class="card-body">
      <?php $db->get_user_data(); ?>
  

     </div>
    </div>
   </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
   integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>

</html>