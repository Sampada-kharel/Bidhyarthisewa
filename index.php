<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password);
if (!mysqli_select_db($conn, 'Bidhyarthisewa')) {
    echo "CREATE A DATABASE WITH NAME 'Bidhyarthisewa' in phpmyadmin and import Bidhyarthisewa.sql file in 'dbfile' folder";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a {
            color: #fff;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
        }
        body{
            background-color: #F7F7F7;
        }

        .intro {
            /* background-color: #80489C; */
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10em;
        }

        .large-image img {
            height: 80vh;
            border-radius: 40%;
        }

        .text-box h4 {
            font-size: 1.5em;
        }

        .text-box h1 {
            font-size: 4em;
            color: #AD0000;
            padding-bottom: 20px;
        }

        .text-box p {
            font-size: 1.2em;
        }

        .card-body:hover{
            border:1px solid #ad0000;
        }

        @media (max-width: 600px) {
    /* For mobile phones: */
    .intro {
            flex-direction: column;
            padding: 2em;
        }
        .large-image img {
            height: 20vh;
        }
        .text-box h4 {
            font-size: 1em;
        }

        .text-box h1 {
            font-size: 1.5em;
            /* padding-bottom: 20px; */
        }

        .text-box p {
            font-size: 0.2em;
        }
  }

  @media (max-width: 800px) {
    .intro {
            flex-direction: column;
            padding: 2em;
        }
        .large-image img {
            height: 45vh;
        }
        .text-box h4 {
            font-size: 1.5em;
        }

        .text-box h1 {
            font-size: 2em;
            /* padding-bottom: 20px; */
        }

        .text-box p {
            font-size: 1em;
        }
  }

  @media (max-width: 1200px){
        .intro{
            padding: 1em 0 0 0;
        }

        .large-image img {
            height: 45vh;
        }
        /* .text-box h1 {
            font-size: 3em;
        } */
        .text-box p {
            font-size: 0.8em;
        }
         .items-list img{
            height: 250px;
            width: 300px;
        }
  }

    </style>
    <title>Bidhyarthisewa</title>
</head>

<body>

    <?php
    include 'partials/header.php';
  
    if (isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == "false") {
        $errmsg = $_GET['perror'];
        echo '
            <script> alert("' . $errmsg . ' or email cannot Login !!! Try another Email")</script>
          ';
    }
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "true") {
        echo ' <script> alert(" signup successful you can browse now")</script>';
    }
    if (isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == "false") {
        $errmsg = $_GET['error'];
        echo ' <script> alert("' . $errmsg . ' cannot signup !!! Try another Email")</script>';
    }
    if (isset($_GET['postsucess']) && $_GET['postsucess'] == "false") {
        $errmsg = $_GET['poerror'];
        echo ' <script> alert("' . $errmsg . ' cannot post")</script>';
    }
    ?>

    <!-- intro section #F7F7F7-->
    <div class="intro" style="background-color:#DCBEBE;margin: 3% 10%;border-radius:20px;height:70vh;">
            <div class="large-image">
                <img src="./assets/Images/homepage-bg.svg" alt="bg image">
            </div>
            <div class="text-box">
                <h4>The Ecommerce for students</h4>
                <h1>BidhyarthiSewa</h1>
                <p>Platform for every students to buy/sell their used materials in a reasonable price</p>
            </div>
    </div>

    <!-- find items section -->
    <div class="find-items" style="background-color:#DCBEBE;margin: 5% 10%;border-radius:20px;">
        <div style="height:10rem; text-align:center; padding:2rem;font-size:3rem;color:black;font-weight:800;">Featured Products</div>
        <div class="items-list">

            <?php

            include 'partials/dbconnect.php';

            $sql = "SELECT * FROM `post_item` ORDER BY `post_item`.`post_time` DESC LIMIT 9";
            $result = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($result)) {
                $item_name = $row['item_name'];
                $original_price = $row['original_price'];
                $expected_price = $row['expected_price'];
                $post_time = $row['post_time'];
                $picture = $row['item_picture1'];
                $post_id = $row['post_id'];
                echo '
                    <div style=" padding:0.5rem;border:1px solid #80489C;height:23rem; color:#FCE2DB ;display:flex; flex-direction:column; justify-content:space-around; align-items:center;border-radius: 20px;
                    cursor: pointer;">
                        <div >
                                <img src="uploads/' . $picture . '" " class="card-img" alt="..." width="100%" height="250">
                        </div>
                        
                                <div class="card-body" style=" display:flex; flex-direction:column; justify-content:space-around;">
                                    <h5 class="card-title">  <a href="post.php?pid=' . $post_id . '" class="text-dark" style="font-size:1rem; text-transform:uppercase;color:black;">' . $item_name . '</a></h5>
                                    <p class="card-text" style="color:black;font-weight:800;">Original Price: ' . $original_price . '</p>
                                    <p class="card-text" style="color:#AD0000;font-weight:900;">Expected Price: ' . $expected_price . '</p>
                                    <p class="card-text" style="color:black;font-weight:600;display:none;"><small class="text-muted">Last updated ' . $post_time . '</small></p>
                                </div>
                             
                    </div>
                
                        ';
            }
            include 'footer.php';

            ?>

        </div>

    </div>

</body>

</html>