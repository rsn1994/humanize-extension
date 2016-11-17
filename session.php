<?php
include('connect.php');
session_start();
$admin_check = $_SESSION['user'];
$ses_sql=mysqli_query($conn, "select username from user_data where username = '$admin_check'");
$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
$login_session = $row['username'];
if(!isset($_SESSION['username'])){
	header("Location: index.php");
}
?>