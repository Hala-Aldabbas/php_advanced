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

// sql to delete a record
$sql = "DELETE FROM product WHERE product_Id=12";

if ($conn->query($sql) === TRUE) {
  echo "Record deleted successfully";
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>



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

$sql = "SELECT product_Id, product_name, product_price FROM product";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
  echo "<table style='border: solid 1px black;margin:50px 0 50px 150px'>
  <tr style='width:150px;border:1px solid black;'>
  <th style='width:150px;border:1px solid black;'>Id</th>
  <th style='width:150px;border:1px solid black;'>name</th>
  <th style='width:150px;border:1px solid black;'>price</>
  </tr>";
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td style='width:150px;border:1px solid black;'>".$row["product_Id"]."</td><td style='width:150px;border:1px solid black;'>".$row["product_name"]."</td><td style='width:150px;border:1px solid black;'>".$row["product_price"]."</td></tr>";
  }
  echo "</table>";
} else {
  echo "0 results";
}
$conn->close();
?>
<?php  include 'footer.php';?>