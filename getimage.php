<?php
include("db.php");
session_start();
$item_id = $_SESSION['item_id'];
$sql = "SELECT * FROM items WHERE itemid = '$item_id'";
$sth = mysqli_query($db,$sql);
$result=mysqli_fetch_array($sth);
echo '<img src="data:image/jpeg;base64,'.base64_encode($result['img'] ).'"/>';
?>
