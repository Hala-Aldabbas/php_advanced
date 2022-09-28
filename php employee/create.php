<?php
  // include('add.php')
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css">
    <title>register</title>
</head>

<body style="background-color:white;">
<nav class="navbar navbar-expand-md navbar-light navbar-laravel">
      <div class="container">
      
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto"></ul>
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a class="btn btn-outline-primary" href="index.php"><i class="fa fa-sign-out-alt"></i>&nbsp;Back</a></li>
            </ul>
        </div>
      </div>
    </nav>
    <div class="container ">
    <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="card w-100">
              <div class="card-header">Create</div>
              <div class="card-body">
                <form id="form-reg" onsubmit="validationForm(event)" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
                    <h1>add employee</h1>
                  


                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" name="name">
                        <div class="error" id="nameErr"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" name="address">
                        <div class="error" id="nameErr"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputName1" class="form-label">Salary:</label>
                        <input type="text" class="form-control" id="exampleInputName1" aria-describedby="nameHelp" name="salary">
                        <div class="error" id="nameErr"></div>
                    </div>

                  
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label><h5>Image</h5></label>
                            <input type="file" name="image">
                        </div>
                  
                
                    <div class="d-grid gap-2">
                        <button type="submit"  class="form-control btn btn-primary" value="Submit" name="upload_save_btn">Add employee</button>
                  
                    </div>

                </form>
            </div>
            </div>
            </div>
          </div>
   



        </div>
    </div>

    <?php


include("db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

  if(isset($_POST['upload_save_btn']))
  {
    $username=stripslashes($_POST['name']);
    $image=time() . '-' . $_FILES['image']['name'];

   // the image to a specific folder first and this folder for example called (images)

   $target_dir="images/";
   $target_file=$target_dir . basename($image);
    
      
     
      $name = $_POST["name"];
      $address = $_POST["address"];
      $salary = $_POST["salary"];
  
  
      if(!isset($errorMsg)){
        $sql="INSERT INTO employees (name, image,	address, salary) 
       VALUES('$name','$image','$address','$salary')";

       
//if the data has been saved in the database , redirect the user to the main page
        if(mysqli_query($conn, $sql)){
            header('location:index.php');
        }
    }
  }

}	


?>
<?php
  require_once('db.php');
  $upload_dir = 'uploads/';

  if (isset($_POST['Submit'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $salary = $_POST['salary'];

    $imgName = $_FILES['image']['name'];
		$imgTmp = $_FILES['image']['tmp_name'];
		$imgSize = $_FILES['image']['size'];

    if(empty($name)){
			$errorMsg = 'Please input name';
		}elseif(empty($address)){
			$errorMsg = 'Please input address';
		}elseif(empty($salary)){
			$errorMsg = 'Please input salary';
		}else{

			$imgExt = strtolower(pathinfo($imgName, PATHINFO_EXTENSION));

			$allowExt  = array('jpeg', 'jpg', 'png', 'gif');

			$userPic = time().'_'.rand(1000,9999).'.'.$imgExt;

			if(in_array($imgExt, $allowExt)){

				if($imgSize < 5000000){
					move_uploaded_file($imgTmp ,$upload_dir.$userPic);
				}else{
					$errorMsg = 'Image too large';
				}
			}else{
				$errorMsg = 'Please select a valid image';
			}
		}


		if(!isset($errorMsg)){
			$sql = "insert into employees(image ,name, address, salary )
					values('".$userPic."','".$name."', '".$address."', '".$salary."')";
			$result = mysqli_query($conn, $sql);
			if($result){
				$successMsg = 'New record added successfully';
				header('Location: index.php');
			}else{
				$errorMsg = 'Error '.mysqli_error($conn);
			}
		}
  }
?>


</body>
</html>