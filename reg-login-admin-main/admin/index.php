<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="manager.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
         <label for="inputEmail" class="form-label">Email address</label>
            <input type="text" class="form-control" id="inputEmail" name="email">

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>

	 
</body>
</html>



<?php include "db_conn.php" ?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
session_start();

$email = $password = null;
$emailErr = $passwordErr = null;

if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        $emailErr = "invalid email";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "invalid email";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['password'])) {
        $passwordErr = "password required";
    } else {
        $password = $_POST['password'];
    }

    if (isset($email) && isset($password)) {
        

            $sql = "SELECT * FROM users WHERE email ='$email' AND password='$password'";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if ($row['email'] === $email && $row['password'] === $password && $row['user_type'] == "user") {
                $_SESSION['firstname'] = $row['first_name'];
                $_SESSION['lastname'] = $row['family_name'];
                $_SESSION['userType'] = $row['user_type'];
                print_r($_SESSION);
                header("location:welcome.php");
            } else if ($row['email'] === $email && $row['password'] === $password && $row['user_type'] == "admin") {
                $_SESSION['userType'] = $row['user_type'];
                $_SESSION['firstname'] = $row['first_name'];
                $_SESSION['lastname'] = $row['family_name'];
                print_r($_SESSION);
                header("location:welcome.php");
            }else{
                $_SESSION['userType'] = $row['user_type'];
                $_SESSION['firstname'] = $row['first_name'];
                $_SESSION['lastname'] = $row['family_name'];
                header("location:superadmin.php");
            }
            mysqli_close($conn);
        }else{
            $emailErr = "wrong pass or email";
        }
    }

}


?>

	 <form action="" class="w-75" method="post" style="margin:0 auto;" onsubmit="return validateLogin()">
        <div class="mb-3">
            <label for="inputEmail" class="form-label">Email address</label>
            <input type="text" class="form-control" id="inputEmail" name="email">
            <!-- <div id="email-error" class="error"></div> -->
            <span >
                <?php
                if (isset($emailErr)) {
                    echo "* " . $emailErr;
                }
                ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="inputPassword" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword" name="password">
            <!-- <div id="password-error" class="error"></div> -->
            <span >
                <?php
                if (isset($passwordErr)) {
                    echo "* " . $passwordErr;
                }
                ?>
            </span>
        </div>
        <p class="text-center mt-2 fs-2 text-muted">Don't have an account?<a href="signup.php">Register</a></p>
        <div class="d-grid gap-2 col-6 mx-auto mt-5 ">
            <button class="btn btn-primary rounded-5 fs-3" type="submit" name="submit" style="background-color:palevioletred ;">login</button>
        </div>
    </form>
</body>
</html>