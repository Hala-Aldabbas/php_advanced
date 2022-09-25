<?php
//variables to connect to db
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

//getting user details from data base
$sql = "SELECT * FROM "
// $result = $conn->query($sql);

if ($result->num_rows > 0) {

    echo "<table><tr><th>Id</th></tr>";
    echo "<tr><td><h3>user_Name</h3></td><td><h3>product_Name</h3></td></tr><tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo $row['user_Id'] . " " . $row['user_name']. " " . $row['user_mobile']. " " . $row['location']. " " . $row['product_Id']. " " . $row['product_name']. " " . $row['product_price']. " " . $row['expiry_date'];
    echo "</table>";

} else {
    echo $lookingto;
    echo "No details found, please check your details and try again";
}
$conn->close();
?>