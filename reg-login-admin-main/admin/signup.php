<?php
include "db_conn.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
$email = $firstName = $middleName = $lastName = $familyName = $date = $mobile = $password = $passwordConfirm = null;
$emailErr = $firstNameErr = $middleNameErr = $lastNameErr = $familyNameErr = $dateErr = $mobileErr = $passwordErr = $passwordConfirmErr = null;
$msg = null;
if (isset($_POST['submit'])) {
    if (empty($_POST['email'])) {
        $emailErr = "invalid email";
    }else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $emailErr = "invalid email";
    } else {
        $email = $_POST['email'];
    }

    if (empty($_POST['f-name'])) {
        $firstNameErr = "first name required";
    } else {
        $firstName = $_POST['f-name'];
    }

    if (empty($_POST['fam-name'])) {
        $familyNameErr = "family name required";
    } else {
        $familyName = $_POST['fam-name'];
    }


    if (empty($_POST['mobile'])) {
        $mobileErr = "mobile required";
        
    } else {
        if (strlen($_POST['mobile']) != 14) {
            $mobileErr = "must length 14";
        } else {
            $mobile = $_POST['mobile'];
        }

    }

    if (empty($_POST['date'])) {
        $dateErr = "date name required";
    } else {
        $date = $_POST['date'];
    }


    if (empty($_POST['password'])) {
        $passwordErr = "password name required";
    }else {
        $password=$_POST['password'];
    }
    if (empty($_POST['passwordconfirm'])) {
        $passwordConfirmErr = "password name required";
    }

    if ($_POST['password'] != $_POST['passwordconfirm']) {
        $passwordErr = $passwordConfirmErr = "must match";
    } else {
        $password = $passwordConfirm = $_POST['password'];
    }
    if (isset($email) && isset($firstName) && isset($middleName) && isset($lastName) && isset($familyName) && isset($mobile) && isset($date) && isset($password) && isset($passwordConfirm)) {
        $msg = "registeration is successful";
        $sql = "INSERT INTO users(email,mobile,first_name,middle_name,last_name,family_name,password,date_of_birth,user_type) 
        VALUES('$email','$mobile','$firstName','$middleName','$lastName','$familyName','$password','$date','user')";;
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        

        mysqli_close($conn);
        header("location:index.php");
    }
}

?>

<div class="container " style="margin-top:500px">
    <form action="" method="post" class="w-75" style="margin:0 auto;" onsubmit="return Registervalidate()">
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
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="inputFirstName" class="form-label">First Name</label>
                <input type="text" class="form-control" id="inputFirstName" name="f-name">
                <!-- <div id="fname-error" class="error"></div> -->
                <span >
                    <?php
                    if (isset($firstNameErr)) {
                        echo "* " . $firstNameErr;
                    }
                    ?>
                </span>
            </div>

            <div class="col-md-6">
                <label for="inputFamilyName" class="form-label">Family Name</label>
                <input type="text" class="form-control" id="inputFamilyName" name="fam-name">
                <!-- <div id="fam-name-error" class="error"></div> -->
                <span >
                    <?php
                    if (isset($familyNameErr)) {
                        echo "* " . $familyNameErr;
                    }
                    ?>
                </span>
            </div>
        </div>
        <div class="mb-3">
            <label for="inputphone" class="form-label">Mobile Number</label>
            <input type="tel" class="form-control" id="inputphone" name="mobile">
            <!-- <div id="phone-error" class="error"></div> -->
            <span >
                <?php
                if (isset($mobileErr)) {
                    echo "* " . $mobileErr;
                }
                ?>
            </span>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date of Birth</label>
            <input type="date" class="form-control" id="date" name="date">
            <!-- <div id="date-error" class="error"></div> -->
            <span >
                <?php
                if (isset($dateErr)) {
                    echo "* " . $dateErr;
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
        <div class="mb-3">
            <label for="inputPasswordConfirm" class="form-label">Confirm Password</label>
            <input type="password" class="form-control" id="inputPasswordConfirm" name="passwordconfirm">
            <!-- <div id="confirm-password-error" class="error"></div> -->
            <span >
                <?php
                if (isset($passwordConfirmErr)) {
                    echo "* " . $passwordConfirmErr;
                }
                ?>
            </span>
        </div>
        <span >
            <?php
            if (isset($msg)) {
                echo "* " . $msg;
            }
            ?>
        </span>
        <p class="text-center mt-2 fs-2 text-muted">Already have an account?<a href="index.php">Login</a></p>
        <div class="d-grid gap-2 col-6 mx-auto mt-5 ">
            <button class="btn btn-primary rounded-5 fs-3" type="submit" name="submit" >Sign up</button>
        </div>
    </form>
    </div>