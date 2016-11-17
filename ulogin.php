<?php 
require "connect.php";
$username = $_POST["username"]; 
$password = $_POST["password"];
$mysql_qry = "select * from user_data where username like '$username' and password like '$password'"; 
$result = $conn->query($mysql_qry);
if(mysqli_num_rows($result) > 0) {
echo "login Successful!!!";
session_start();
$_SESSION['username'] = $username;
 $_SESSION['loggedin'] = true;
$_SESSION['sid'] = session_id();
header("Location: userhome.php ");
}
else {
echo "Error: " . $mysql_qry . "<br>" . $conn->error;
}
$conn->close();
?>