
<?php 
$url = $_POST['url'];
if(!empty($_POST['url'])) {
  echo "<script> location.href= \"$url \" </script>";
}
else{
    echo "please enter your URL <br>";
}


?>
