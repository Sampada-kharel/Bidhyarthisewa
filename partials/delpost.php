<?php

    include 'dbconnect.php';
    $reid=$_GET['re_id'];
    $sql="DELETE FROM `post_item` WHERE `post_id`=$reid";
    $result = mysqli_query($conn,$sql);
    //if($result)
    //{
        header("Location: ../index.php");
      //          exit();
    //}
  

?>