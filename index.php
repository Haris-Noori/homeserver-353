<!DOCTYPE HTML>

<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body style="background: linear-gradient(to right, white,#20BF55)">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
        <a class="navbar-brand" href="#">HomeServer-353</a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="src/developer.html">Developer</a>
            </li>
            </ul>
            <a href="">
                <button class="btn  btn-light">Login <span><img src="images/login2.svg"></span> </button>
            </a>
        </div>
    </nav>
    <!-- nav end -->

    <br>
    <div class="container">
        
        <center>
            <h2>Admin Login</h2>
            <hr>
            <!-- form -->
            <form action="src/login_try.php" method="post">

                <div class="form group-row">
                    <span><img src="images/perm_id.svg"></span>
                    <input placeholder="Username" type="text" name="name" class="form-control col-sm-4" required>
                </div>
                <br>
                <div class="form group-row">
                <span><img src="images/pass.svg"></span>
                    <input placeholder="Password" type="password" name="pass" class="form-control col-sm-4" required>
                </div>
                <br>
                <div class="form group-row">
                    <input type="submit" class="form-control col-sm-4 btn-success">
                </div>
                <br>
                <div class="form group-row">
                    <?php
                        if(isset($_GET["Message"]))
                        {
                            echo "<div class='col-sm-4 alert alert-danger'>";
                            echo $_GET["Message"];
                            echo "</div>";
                        }
                    ?>
                </div>
                
            </form>

        </div>
        </center>

    </div>




    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>