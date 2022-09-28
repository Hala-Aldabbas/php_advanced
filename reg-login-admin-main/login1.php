<?php
session_start();
include "db_conn.php";
$usern = $_POST['uname'];
$passw = $_POST['password'];
$_SESSION['admin'] = '';
$_SESSION['user'] = '';

$sql = " SELECT * FROM manager WHERE username = '$usern' AND password = '$passw'";
$result = mysqli_query($conn, $sql);

if ($result->num_rows === 1) {
    //Current user is in Admin table, hence he/she is an admin
    $_SESSION['admin'] = $usern;
    header("location:admin/users.php?log=".$_SESSION['admin']);
    exit(0);
} elseif ($result->num_rows > 1) {
      //there should not be more than one rows with same credentials. Two rows with same (username, password), Make username primary key.
      throw new Exception("Multiple entry with same username and password in admin table");
} else {
    $sql1 = " SELECT * FROM users WHERE username = '$usern' AND password = '$passw'";
    $result1 = mysqli_query($conn, $sql1);
    
    if ($result1->num_rows === 1) {
        //Current user is in Admin table, hence he/she is an admin
        $_SESSION['user'] = $usern;
        header("Location:home.php");
        exit(0);
    } elseif ($result1->num_rows > 1) {
          //there should not be more than one rows with same credentials. Two rows with same (username, password), Make username primary key.
          throw new Exception("Multiple entry with same username and password in admin table");
    }
    else {
        //Nither in User nor in admin table
        header("location:index.php");
    }

}

?>