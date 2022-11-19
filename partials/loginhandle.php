<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include 'dbconnect.php';
    $username =  $_POST["logemail"];
    $password = $_POST["logpass"]; 
    
    $sql1 ="SELECT * FROM user where user_email='$username'";
   
    $result1= mysqli_query($conn,$sql1);
   
    if(mysqli_num_rows($result1)==1)
    {  
        $row = mysqli_fetch_assoc($result1);
        if(password_verify($password, $row['password']))
        {
            session_start();
            $_SESSION['loggedin']=true;
            $_SESSION['useremail']=$username;
            $_SESSION['uid']=$row['user_id'];
           echo"loggedin ". $username;
           header("Location: ../index.php");
           exit();
        }
        else{
            $paserr="incorrect password";
            header("Location: ../index.php?loginsuccess=false&perror=$paserr");
            exit();
        }
          
    }
    else{
        $paserr="invalid email";
            header("Location: ../index.php?loginsuccess=false&perror=$paserr");
            exit();
    }

}
?>