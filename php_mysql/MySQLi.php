<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo "Connection failed"."<br>";
}
echo "Connected successfully"."<br>";

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "homework";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
// $sql = "CREATE TABLE MyGuests (
// id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
// firstname VARCHAR(30) NOT NULL,
// lastname VARCHAR(30) NOT NULL,
// email VARCHAR(50),
// reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// )";

// if ($conn->query($sql) === TRUE) {
//   echo "Table MyGuests created successfully";
// } else {
//   echo "Error creating table: " . $conn->error;
// }

// $conn->close();


$sql = "SELECT firstName,lastName ,trainer_name  user_name FROM trainee_name";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo " Name: " . $row["firstName"]. " " . $row["lastName"]. "<br>";
  }
} else {
  echo "0 results";
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
  echo "<table style='border: solid 1px black;>
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