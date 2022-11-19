<?php

if(empty($_POST["stt"])){
    $err='empty state ';    
    header("Location:signup.php?err=$err");
}

 else if(empty($_POST['cit'])){
    $err='phone no empty  ';
    header("Location:signup.php?err=$err");
 }
 else if(empty($_POST['pas'])){
    $err='price details  empty  ';
    header("Location:signup.php?err=$err");
}else if(empty($_POST['cpas'])){
    $err='price details  empty  ';
    header("Location:signup.php?err=$err");
}
elseif($_POST['pas']!=$_POST['cpas']){
    $err='Password doesn\'t match';
    header("Location:signup.php?err=$err");
}
else if(!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/', $_POST['pas'])){
   $err='Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters';
   header("Location:signup.php?err=$err");
} 
else{
    include 'dbconnect.php';
    echo $email = $_POST["emreq"];
    echo $cont1 = $_POST["con1req"];
    echo $reqmony = $_POST["monyreq"];
    echo $poid = $_POST['p_id'];
    echo $usrid = $_POST['usrid'];

    $sql = "INSERT INTO `requests` (`customer_email`, `customer_contact`, `bid_price`, `post_id`, `owner_user_id`) VALUES ('$email', '$cont1', '$reqmony', '$poid',  '$usrid')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../index.php?postrequest=true");
        exit();
    } else {
        header("Location: ../index.php?postrequest=false");
    }
}
?>
