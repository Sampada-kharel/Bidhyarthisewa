<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>search</title>
  <link rel="stylesheet" href="style.css">
  <style>
    a {
      color: #fff;
    }

    * {
      font-family: Arial, Helvetica, sans-serif;
      text-decoration: none;
      color: #FCE2DB;

    }
  </style>
</head>

<body style="background-color:#80489C">

  <?php
  if (!isset($_SESSION['loggedin'])) {
    session_start();
  }
  include 'partials/header.php';
  $noresult = true;

  $sword = $_GET['search'];
  echo '   <h1>Searched results for "<i>' . $_GET['search'] . '" </i></h1>
    <br>
    <br>

        <div class="row mx-2" style="display:flex;flex-wrap:wrap;row-gap:1rem;justify-content:space-around;align-items:center;">';
            include 'partials/dbconnect.php';
          $sql = "SELECT * FROM post_item WHERE (`item_name` LIKE '%" . $sword . "%')";
          $result = mysqli_query($conn, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $noresult = false;
            $bok_n = $row['item_name'];
            $pic = $row['item_picture1'];
            $p_id = $row['post_id'];
            $time = $row['post_time'];
            $og_pr = $row['original_price'];
            echo '
              <div class="result" style="padding:5px;width:30%;display:flex;flex-direction:column;align-items:center;">
                <div class="card">
                  <div class="card-body">
                    <div class="media">
                      <img src="uploads/' . $pic . '"  height=200 width=150>
                      <div class="media-body">
                        <h5 class="mt-0"><a href="post.php?pid=' . $p_id . '" class="text-dark">' . $bok_n . '</a></h5>
                          <p> Original price : ' . $og_pr . '  &nbsp;&nbsp;&nbsp;&nbsp;</p>
                          <p class="mb-0">posted on : ' . $time . '</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            '
         ;
        }
        echo'</div>
        ';
        if ($noresult) {
          echo "  <div>
                      <h1>No result were found on your query</h1>
                      <li>make sure your spellings are correct !!!
                      </li>
                  </div>
              ";
        }
     
  ?>

</body>

</html>