<?php

session_start();
include 'dbconnect.php';
$username = $_SESSION['uid'];


$bookname = $_POST["booknam"];

$ogpirce = $_POST["ogpric"];
$exprice = $_POST["expric"];
$description = $_POST["describe"];

// Include the database configuration file


// File upload path 
$targetDir = "../uploads/";



$fileName1 = basename($_FILES["bookpic1"]["name"]);
$fileName2 = basename($_FILES["bookpic2"]["name"]);
$fileName3 = basename($_FILES["bookpic3"]["name"]);

$targetFilePath1 = $targetDir . $fileName1;

$targetFilePath2 = $targetDir . $fileName2;

$targetFilePath3 = $targetDir . $fileName3;

$fileType1 = pathinfo($targetFilePath1, PATHINFO_EXTENSION);

$fileType2 = pathinfo($targetFilePath2, PATHINFO_EXTENSION);

$fileType3 = pathinfo($targetFilePath3, PATHINFO_EXTENSION);


// Allow certain file formats
$allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf');

// Upload file to server
move_uploaded_file($_FILES["bookpic1"]["tmp_name"], $targetFilePath1);
// Insert image file name into database

move_uploaded_file($_FILES["bookpic2"]["tmp_name"], $targetFilePath2);

move_uploaded_file($_FILES["bookpic3"]["tmp_name"], $targetFilePath3);


$sql = "INSERT INTO `post_item` (`item_name`,  `original_price`, `expected_price`, `item_description`, `item_picture1`, `item_picture2`, `item_picture3`,  `used`, `display`, `user_id`) VALUES('$bookname', '$ogpirce', '$exprice', '$description', '$fileName1', '$fileName2', '$fileName3', 'N', 'Y', '$username')";
$result = mysqli_query($conn, $sql);
header('location:../');
