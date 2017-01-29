<?php
include("db.php");
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // cleaning title field
	$item_id=mysqli_real_escape_string($db,$_POST['itemid']); 
	$owner_id=mysqli_real_escape_string($db,$_POST['ownerid']); 
	$title=mysqli_real_escape_string($db,$_POST['title']); 
	$description=mysqli_real_escape_string($db,$_POST['description']); 
	$ppd=mysqli_real_escape_string($db,$_POST['ppd']); 
	$ppw=mysqli_real_escape_string($db,$_POST['ppw']); 
	$ppm=mysqli_real_escape_string($db,$_POST['ppm']); 
    if (isset($_FILES['photo']))
    {
		$data = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
        $sql = "INSERT INTO items VALUES ('$item_id','$owner_id','$title','$description','$ppd','$ppw','$ppm','$data');";
    }
    $result = mysqli_query($db,$sql);
    $_SESSION['item_id'] = $item_id;
	header('Location: getimage.php');
}
?>