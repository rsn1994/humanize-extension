<?php 
require "connect.php";
session_start();
$username = $_POST["username"];
$userpass = $_POST["password"];
$mysql_qry = "select * from user_data where username like 'deep' and password like 'deepu4'"; 
$result = $conn->query($mysql_qry);
if(mysqli_num_rows($result) > 0) {
	$_SESSION['login_admin'] = $username;
$message "login success";
echo "<script type='text/javascript'>alert('$message');</script>";
 header("Location: userhome.php ");
}
else {
$message "login not success";
echo "<script type='text/javascript'>alert('$message');</script>";
header("Location: login.php");

}
 
?>