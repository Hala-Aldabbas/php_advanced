<!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

<?php

// $connection=mysqli_connect("localhost","root","","adminpanel");

if(isset($_post['registerbtn']))
{

  $username=$_post['username'];
  $email=$_post['email'];
  $password=$_post['password'];
  $cpassword=$_post['confirmpassword'];

  if($password===$cpassword)
  {

$query="INSERT INTO register (username,email,password) VALUES('$username','$email','$password')";
$query_run=mysqli_query($connection,$query);

if($query_run)
{
//echo"Saved";

$_SESSION['success']="Admin Profile Added";
header('location:register.php');
}
else
{
$_SESSION['status']="Admin Profile NOT Added";
header('location:register.php');

}
  }

else
{
$_SESSION['status']="Password and confirm password Dose Not Match
";
header('location:register.php');

}

}

?>