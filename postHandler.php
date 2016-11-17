<?php
require "connect.php";
header("Content-Type: application/javascript");
header('Access-Control-Allow-Origin: *'); 
if(isset($_GET["data"])) {
    $urls=$_GET["data"];
      }
$arrlength = count($urls);
for($x = 0; $x < $arrlength; $x++) {
$id=$urls[$x];
$y=$x+1;
$sql = "SELECT description FROM user_url WHERE urls='$id'";
$result = $conn->query($sql);
 if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo json_encode($row["description"]);
    }
} else {
  $sql = "INSERT INTO user_url (urls, postids, description)
VALUES ('$id',NULL,NULL)";
$conn->query($sql);
}
}
?>