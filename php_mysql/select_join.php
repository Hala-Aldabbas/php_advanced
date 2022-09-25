<?php  include 'header.php';?>

<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$result = mysqli_query($conn,"SELECT * FROM `users`
INNER JOIN `product` on users.user_Id = product.product_Id; ");
if ($result->num_rows > 0) {
echo "<table style='border: solid 1px black;margin:0 0 50px 150px'>
<tr style='width:150px;border:1px solid black;'>
<th style='width:150px;border:1px solid black;'>Id</th>
<th style='width:150px;border:1px solid black;'>user_name</th>
<th style='width:150px;border:1px solid black;'>user_mobile</>
<th style='width:150px;border:1px solid black;'>location</th>
<th style='width:150px;border:1px solid black;'>product_name</>
<th style='width:150px;border:1px solid black;'>product_price</th>
<th style='width:150px;border:1px solid black;'>expiry_date</>
</tr>";

while($row = mysqli_fetch_array($result)) {
 echo"<tr><td style='width:150px;border:1px solid black;'>". $row['user_Id']."</td><td style='width:150px;border:1px solid black;'>".$row['user_name']."</td><td style='width:150px;border:1px solid black;'>". $row['user_mobile']."</td><td style='width:150px;border:1px solid black;'>". $row['location']."</td><td style='width:150px;border:1px solid black;'>". $row['product_name']."</td><td style='width:150px;border:1px solid black;'>". $row['product_price']."</td><td style='width:150px;border:1px solid black;'>".$row['expiry_date']."</td></tr>";
  echo "<br>";
}  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>


<?php  include 'footer.php';?>