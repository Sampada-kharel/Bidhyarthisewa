<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'dbconnect.php';
    if(empty($_POST["emreq"])){
        $err='empty email ';    
        header("Location:buyrequest.php?err=$err");
    }
    
     else if(empty($_POST['con1req'])){
        $err='phone no empty  ';
        header("Location:buyrequest.php?err=$err");
     }
     else if(empty($_POST['monyreq'])){
        $err='price details  empty  ';
        header("Location:buyrequest.php?err=$err");
    }else if(!preg_match('/^[0-9]{10}+$/', $_POST['con1req'])){
       $err='Enter Valid Phone number';
       header("Location:buyrequest.php?err=$err");
    }else if(!preg_match('/^[0-9]+$/', $_POST['monyreq'])){
        $err='Enter integer in price';
        header("Location:buyrequest.php?err=$err");
     }
    $username = $_POST["uemail"];
    $password = $_POST["pas"];
    $city = $_POST["cit"];
    $state = $_POST["stt"];
    
    $sql1 ="SELECT * FROM user where user_email='$username'";
    $result1= mysqli_query($conn,$sql1);
    $num= mysqli_num_rows($result1);
    if($num>0){
        $showerr="Email already in use";
    }
    else{
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $sql2 ="INSERT INTO `user` (`user_email`, `District`, `city`, `password`) VALUES ('$username', '$state', '$city', '$hash')";
        $result2 = mysqli_query($conn,$sql2);
        if($result2){
            header("Location: ../index.php?signupsuccess=true");
            exit();
        } 
    }
    header("Location: ../index.php?signupsuccess=false&error=$showerr");
}
?>