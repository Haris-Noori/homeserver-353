<!DOCTYPE html>

<?php  
    //include "connect.php";
    session_start();
    if(!isset($_SESSION["my_user"]))
    { //if login in session is not set
        header("Location:../index.php");
    }

    // $myname = $_SESSION["my_user"];
    // echo "$myname";
    
?>

<html>
<head>
    
    <link rel="stylesheet" type="text/css" href="../css/header.css">
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
</head>
<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="dashboard.php">HomeServer-353</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="">All Messages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="barkat.php">Finance</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="developer.html">Developer</a>
                </li>
            </ul>
        </div>
        <div class="dropdown">
            <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Welcome, <?php echo " ".$_SESSION["my_user"]." " ?> <img id="my_icon" src="../images/user1.png">
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="#">My Profile</a>
                <a class="dropdown-item" href="#">Change Password</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Log out<img src="../images/login.svg"> </a> 
            </div>
        </div>
    </nav>
    <!-- nav end -->

    





    <script src="../js/jquery-3.4.1.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>