<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db="Bidhyarthisewa";
    $conn = mysqli_connect($servername, $username, $password, $db);
  if($conn){
  //code for connection success 
  }
  else
  {
      die("Error" . mysqli_connect_error());
  }
?>