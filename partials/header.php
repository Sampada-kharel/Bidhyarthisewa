<!-- Infinity free.net -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav style="background-color: #DCBEBE;height:4rem;">
        <a href="./">
            <div class="brand">
                <img src="./assets/Logo/Logo-400-100.png" alt="logo_here">
            </div>
        </a>



        <?php


        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '
                        <a href="./mypost.php"><div class="nav-item" style="color:black;font-weight:700;">My posts</div></a>
                        <a href="./makepost.php"><div class="nav-item" style="color:black;font-weight:700;">New Post</div></a>
                        <a href="./request.php"><div class="nav-item" style="color:black;font-weight:700;">Requests</div></a>
                    ';
        }
        ?>
        <form action="search.php" method="GET" class="search-bar">
            <input type="text" name="search" class="search-value" placeholder="What you looking for...">
            <!-- Here input is changed to button   -->
            <button type="submit"><img src="./assets/Icons/search.png"></button>
        </form>

        <!-- show logout or login -->
        <?php
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
            echo '<div class="nav-item" style="color:black;font-weight:700;">Welcome ' . $_SESSION["useremail"] . '</div>';

            //logout button
            echo '<a href="partials/logouthandle.php" style="color:black;font-weight:700;">LogOut</a>';
        } else {
            echo '
            <div>
            <a href="partials/login.php" style="color:black;font-weight:900;">LogIn</a>
            </div>
            <div>
            <a href="partials/signup.php" style="color:black;font-weight:900;">SignUp</a>
            </div>
            ';
        }
        ?>


    </nav>
</body>

</html>