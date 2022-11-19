<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <title>Bidyarthisewa</title>
    <style>
        a {
            color: #fff;
        }

        * {
            font-family: Arial, Helvetica, sans-serif;
            text-decoration: none;
            color: #FCE2DB;
        }
        input{
            height: 2rem;
            color: white;
        }
    </style>
</head>

<body style="background-color: #80489C;">
    <?php
        session_start();
        include 'partials/header.php'; 
    ?>
    <center style="padding: 1rem;">
        <h1>Look at the request of buyers !!</h1>
    </center>

    <div class="container" style=" margin-top:2rem;min-height:90vh; width:100%; display: flex; align-items:flex-start; justify-content:space-around; flex-wrap:wrap">
        <?php $i = 0;
        include 'partials/dbconnect.php';
        $noresult = true;
        $e_id = $_SESSION['uid'];
        $sql = " SELECT * FROM `requests` WHERE owner_user_id=$e_id";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            $contact1 = $row['customer_contact'];
            $email = $row['customer_email'];
            $price = $row['bid_price'];
            $posid = $row['post_id'];
            //<!--start of  card-->
            $sql1 = "SELECT `item_name` FROM `post_item` WHERE `user_id` =$e_id AND post_id=$posid ";
            $result1 = mysqli_query($conn, $sql1);
            while ($row1 = mysqli_fetch_assoc($result1)) {
                $noresult = false;
                $buknm = $row1['item_name'];
                $req_id = $row['request_id'];
                echo '
            <div style=" border:1px solid white;height:15rem ;width:25rem;display:flex;flex-direction:column;justify-content:space-around;align-items:center; font-size:1.1rem;">
                
                    
                        <div class="f">
                            <label for="inputEmail4">Email</label>
                            <input type="text" class="form-control form-control-sm" id="input001" value="' . $email . '" disabled>
                        </div>
                        <div class="">
                            <label for="inputPassword4">Contact 1</label>
                            <input type="text" class="form-control form-control-sm" id="input002" value="' . $contact1 . '" disabled>
                        </div>

    
                        <div class="">
                            <label for="inputPassword4">Offering price </label>
                            <input type="text" class="" id="input004" value="' . $price . '" disabled>
                        </div>
                        <div>
                            <h4 style="font-size:1.8rem; text-align:center;">' . $buknm . '</h4>
                        </div>
                        <div>
                            <a href="partials/delreq.php?re_id=' . $req_id . '" class="btn btn-warning"" onclick="return checkdelet()">Delete request</a>
                        </div>
                   
                
                
            </div>
        ';
                //<!--end of card-->
            }
        }
        if ($noresult) {
            echo "<div>
                    <h1><i>No Buyers request yet !!</i></h1>
                    <li>check some days after for new updates !!!
                    </li>
                 </div>";
        }
        ?>
   
    </div>

    <!-- Optional JavaScript -->
    <script>
        function checkdelet() {
            return confirm('Are you sure you want to DELETE current record');
        }
    </script>
</body>


</html>