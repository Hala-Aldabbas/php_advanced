<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>OOP</title>

 <style>
 body {
  padding: 0;
  margin: 0;
  background: skyblue;
 }

 #form {
  width: 30%;
  height: 400px;
  background: white;
  margin: 0 auto;
  padding: 20px;
  border: 1px solid #ccc;
 }

 input {
  width: 400px;
  height: 40px;
  margin: 10px;
  display: block;
 }

 label {
  margin: 10px;
  font-weight: bold;
 }

 h1 {

  text-align: center;
  padding: 20px;
  color: blue;
 }
 .btn{
    width: 200px;
    margin-top: 50px;
    background-color:#EBA487;
    border-style: none;
 }
 </style>
</head>

<body>

 <h1>Login Form Using OOP</h1>
 <div id="form">
  <form action="index.php" method="post">
   <label for="">Name:</label>
   <input type="text" name="name" id="" placeholder="Enter Your Name" required="required">
   <label for="">Email:</label>
   <input type="email" name="email" id="" placeholder="Enter Your Email" required="required">
   <label for="">Password:</label>
   <input type="password" name="password" id="" placeholder="Enter Your Password" required="required">

   <input class="btn" type="submit" name="signup" value="Login">
  </form>
 </div>
</body>

</html>

<?php 
include("reg_process.php");
$db = new db();

if(isset($_POST['signup']))
{
 $name = $_POST['name'];
 $email = $_POST['email'];
 $password = $_POST['password'];
//  $password = md5($_POST['password']);

 $query = "INSERT INTO users(user_name, user_email, user_pass) VALUES('$name', '$email', '$password')";
 $db->insert($query);
 
}