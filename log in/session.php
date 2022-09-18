
<?php 
session_start();
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];
if(!empty($_POST['password'])) {
    echo " your password: ".$_SESSION['password']."<br>";

}
else{
    echo "please enter your password <br>";
}

if(!empty($_POST['email'])) {
    echo " your email: ".$_SESSION['email'];
}else{
    echo "<br> please enter your email";
}
echo "<br><br>";
?>

<?php
 $count_page = ("count.dat");
$hits = file($count_page);
$hits[0] ++;
 
$fp = fopen($count_page , "w");
fputs($fp , "$hits[0]");
fclose($fp);
echo "Number of Visitors ";
echo $hits[0];
echo "<br><br>";
?>

<?php
// Do stuff
usleep(mt_rand(100, 10000));

// At the end of your script
$time = microtime(true) - $_SERVER["REQUEST_TIME_FLOAT"];

echo "Requested time:  $time seconds\n";
?>