<?php
session_start();
$con = mysqli_connect('localhost', 'root' , '' , 'mysite');
if (!$con) 
{
echo "not connected to server ";	
}
if (isset($_POST['user_save'])) {
    echo $_POST["username"];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$salary=$_POST['salary'];
	$department_name=$_POST['department_name'];


	$sql="INSERT INTO users (username ,email, password ,department_id , salary)  VALUES ('$username' , '$email' , '$password','$department_name','$salary' )";

	if (mysqli_query($con , $sql)) 
	{
		$_SESSION["success"] = "YOUR DATA IS INSERTED" ; 
		header("Location: users.php");	}
	 else
	{
		$_SESSION['statue'] = "YOUR DATA IS NOT INSERTED" ; 
		header("Location: users.php");	}

	 
}

if (isset($_POST['updatebtn']))
{  
	 $id = $_POST['edit_id'];

	$username= $_POST['edit_username'];
	$email= $_POST['edit_email'];
	$password=$_POST['edit_password'];
	$salary=$_POST['edit_salary'];
	$department_name=$_POST['edit_department'];


	$query ="UPDATE users SET  username='$username',salary='$salary' , email= '$email' , password= '$password' , department_id='$department_name' WHERE userid= '$id' " ;
	$query_run = mysqli_query($con , $query);

	if($query_run)
	{
		$_SESSION["success"] = "YOUR DATA IS UPDATED" ; 
		header("Location: users.php");

	}
	else
	{
		$_SESSION['statue'] = "YOUR DATA IS NOT UPDATED" ; 
		header("Location: users.php");
		

	} 
}



if (isset($_POST['delete_btn']))
{
      $id = $_POST['delete_id'];

      $query = "DELETE FROM users WHERE userid='$id' " ;
      $query_run = mysqli_query($con , $query);


	if($query_run)
	{
		$_SESSION["success"] = "YOUR DATA IS DELETED" ; 
		header("Location: users.php");

	}
	else
	{
		$_SESSION["status"] = "YOUR  DATA IS NOT DELETED" ; 
		header("Location: users.php");
		

	} 
}
////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['manager_save'])) {
    echo $_POST["username"];
	$username=$_POST['username'];
	$email=$_POST['email'];
	$password=$_POST['password'];


	$sql="INSERT INTO manager (username ,email, password)  VALUES ('$username' , '$email' , '$password' )";

	if (mysqli_query($con , $sql)) 
	{
		$_SESSION["success"] = "YOUR DATA IS INSERTED" ; 
		header("Location: manager.php");	}
	 else
	{
		$_SESSION['statue'] = "YOUR DATA IS NOT INSERTED" ; 
		header("Location: manager.php");	}

	 
}

if (isset($_POST['manager_edit']))
{  
	 $id = $_POST['edit_id'];

	$username= $_POST['edit_username'];
	$email= $_POST['edit_email'];
	$password=$_POST['edit_password'];

	$query ="UPDATE manager SET  username='$username' , email= '$email' , password= '$password'  WHERE managerid= '$id' " ;
	$query_run = mysqli_query($con , $query);

	if($query_run)
	{
		$_SESSION["success"] = "YOUR DATA IS UPDATED" ; 
		header("Location: manager.php");

	}
	else
	{
		$_SESSION['statue'] = "YOUR DATA IS NOT UPDATED" ; 
		header("Location: manager.php");
		

	} 
}



if (isset($_POST['delete_manager']))
{
      $id = $_POST['delete_id'];

      $query = "DELETE FROM manager WHERE managerid='$id' " ;
      $query_run = mysqli_query($con , $query);


	if($query_run)
	{
		$_SESSION["success"] = "YOUR DATA IS DELETED" ; 
		header("Location: manager.php");

	}
	else
	{
		$_SESSION["status"] = "YOUR  DATA IS NOT DELETED" ; 
		header("Location: manager.php");
		

	} 
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['dep_save'])) {
    echo $_POST["dep_name"];
	$department_name=$_POST['department_name'];
	


	$sql="INSERT INTO department (dep_name)  VALUES ('$department_name')";

	if (mysqli_query($con , $sql)) 
	{
		$_SESSION["success"] = "YOUR DATA IS INSERTED" ; 
		header("Location: department.php");	}
	 else
	{
		$_SESSION['statue'] = "YOUR DATA IS NOT INSERTED" ; 
		header("Location: department.php");	}

	 
}

if (isset($_POST['department_edit']))
{  
	 $id = $_POST['edit_id'];

	$edit_dep= $_POST['edit_dep'];


	$query ="UPDATE department SET  dep_name='$edit_dep'   WHERE dep_id= '$id' " ;
	$query_run = mysqli_query($con , $query);

	if($query_run)
	{
		$_SESSION["success"] = "YOUR DATA IS UPDATED" ; 
		header("Location: department.php");

	}
	else
	{
		$_SESSION['statue'] = "YOUR DATA IS NOT UPDATED" ; 
		header("Location: department.php");
		

	} 
}



if (isset($_POST['delete_dep']))
{
      $id = $_POST['delete_id'];

      $query = "DELETE FROM department WHERE dep_id='$id' " ;
      $query_run = mysqli_query($con , $query);


	if($query_run)
	{
		$_SESSION["success"] = "YOUR DATA IS DELETED" ; 
		header("Location: department.php");

	}
	else
	{
		$_SESSION["status"] = "YOUR  DATA IS NOT DELETED" ; 
		header("Location: department.php");
		

	} 
}
