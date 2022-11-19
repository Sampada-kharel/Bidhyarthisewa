<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');

        a {
            color: black;
        }

        * {
            font-family: 'Poppins', sans-serif;
            text-decoration: none;
            color: #FCE2DB;
            font-size: 1.05rem;
        }

        .price-type {
            display: flex;
            line-height: -0.2em;
        }

        .price-type div {
            margin: 0 0.5em;
            padding: 0;
        }

        .price-type :nth-child(3):hover {
            border-bottom: 2px dotted #ad0000;
            /* border-top: #ad0000;
            border-top: #ad0000; */
        }
    </style>
    <title>Bidyarthisewa</title>
</head>

<body style="background-color:white;">

    <?php
   session_start();
    include 'partials/header.php';
    include 'partials/dbconnect.php';
    $p_id = $_GET['pid'];
    $sql = "SELECT * FROM post_item  WHERE post_id = '$p_id'";
    $result = mysqli_query($conn, $sql);
   
    while ($row = mysqli_fetch_assoc($result)) {
      
        $bok_n = $row['item_name'];
        $og_pr = $row['original_price'];
        $ex_pr = $row['expected_price'];
        $des_n = $row['item_description'];
        $time = $row['post_time'];
        $pic1 = $row['item_picture1'];
        $pic2 = $row['item_picture2'];
        $pic3 = $row['item_picture3'];
        $usrid = $row['user_id'];
        if ($_SESSION['uid'] != $usrid) {
            $cont = '<a href="partials/buyrequest.php?pid=' . $p_id . '&owid=' . $usrid . '" style="border:2px solid black;font-size:1rem;font-weight:900" class="buy-request-btn">Request to Buy</a>';
        }
        else{
            $cont= '<a href="partials/delpost.php?re_id=' . $p_id . '" style="border:2px solid black;font-size:1rem;font-weight:900" class="buy-request-btn">Delete Post</a>';
        }
        echo '<br>
       
            <div class="cont" style="min-height:80vh;display:flex; flex-direction:column;justify-content:space-around;align-items:center;background-color:#DCBEBE;">

                <div><h1 class="name"><b style="font-size:2rem; text-transform:uppercase;color:black;">' . $bok_n . '</b></h1></div>
    
                <div class="pic-cont" style=" width:45rem;height:17rem;display:flex; justify-content:center;align-items:center;gap:0.3rem;" >
                    <div class="pic">
                        <img src="uploads/' . $pic1 . '" style="height:18rem;width:15rem">
                    </div>
                    <div class="pic">
                        <img src="uploads/' . $pic2 . '" style="height:18rem;width:15rem">
                    </div>
                    <div class="pic">
                        <img src="uploads/' . $pic3 . '" style="height:18rem;width:15rem">
                    </div>
                </div>
                <div class="lead" style="color:black;">
                <h6 style="color:black;text-align:center"> Description </h6>
                ' . $des_n . '
                </div>
              
                <!--row2-->
                <div class="price-type" >
                    <div class="" >
                        <div class="" style="color:black;text-align:center;">
                            <h6 style="color:black;">Original Price: </h6> ' . $og_pr . '
                        </div>
                    </div>
                    <div class="">
                        <div class="" style="color:#ad0000;text-align:center;">
                            <h6 style="color:black;">Expected Price: </h6> ' . $ex_pr . '
                        </div>
                    </div>
                    <div>
                        '.$cont.'
                    </div>
                </div>
              
            </div>
     
       
  ';
    }
    
    ?>


</body>

</html>