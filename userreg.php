<?php 
require "connect.php";
$name = $_POST["name"];
$place = $_POST["place"];
$username = $_POST["username"]; 
$password = $_POST["password"];

$mysql_qry = "insert into user_data (username, name, place, password) values('$username','$name','$place','$password')";
if($conn->query($mysql_qry) === TRUE) {
echo "Registration Successful!!!";

 header("Location: index.php ");
}
else {
echo "Error: " . $mysql_qry . "<br>" . $conn->error;
}
$conn->close();
?>