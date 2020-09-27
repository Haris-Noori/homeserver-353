<?php
    include "header.php";
    include "connect.php";

    $qry_barkat = " SELECT SUM(barkat) FROM barkat ";
    $res = $con->query($qry_barkat);
    $row = $res->fetch_assoc();
    $barkat = $row["SUM(barkat)"];
    // echo "Barkat: ".$barkat;
?>

<html>
<head>
    <title>Barkat Page</title>
    <link rel="stylesheet" type="text/css" href="../css/dashboard.css">
</head>
<body style="background: linear-gradient(to right, white,#20BF55)">

   

    <h1 class="ml-2">Welcome, <?php echo " ".$_SESSION["my_user"]." " ?> </h1>
    <h2>Barkat: <span id="barkat"><?php echo $barkat ?></span></h2>
    <hr>

    <br>
    <div class="container mt-4">
        <!-- form -->
        <form action="" method="post">
            <h3>Add/Minus Barkat</h3>
            <div class="row">
                <input placeholder="Barkat Amount? RS." type="number" name="barkat" class="form-control col-lg-2" required style="margin-right: 3px">

                <button name="btn-send" type="submit" class="form-control col-lg-2 btn-success msg-box">Submit</button>
            </div>

            <br>
            <div class="form group-row">
                <?php
                    if(isset($_POST["btn-send"]))
                    {
                        $barkat = $_POST["barkat"];
                        $name = $_SESSION["my_user"];

                        $qry = " INSERT INTO barkat(barkat,name) VALUES('".$barkat."', '".$name."')";

                        if($con->query($qry))
                        {
                            echo "<div class='col-sm-4 alert alert-success'>";
                            echo "Barkat Added!";
                            echo "</div>";
                        }
                        else{
                            echo "<div class='col-sm-4 alert alert-success'>";
                            echo "Something Went Wrong!!!";
                            echo "</div>";
                        }

                    }

                ?>
            </div>

        </form>
    </div>

    <h3>Barkat Ledger </h3>
    <table class="table mytable">
        <thead class="thead-dark">
        <tr>
            <th scope="col-lg-2">Admin Name</th>
            <th scope="col-lg-8">Barkat Amount</th>
        </tr>
        </thead>
        <?php

            $qry = " SELECT * FROM barkat ORDER BY barkat_id DESC ";
            $res = $con->query($qry);
            $result = "";

            if($res->num_rows > 0)
            {

            while($row = $res->fetch_assoc())
            {
                ?>

            <tbody>
            <tr>
                <td><?php echo " ".$row["barkat"]." " ?></td>
                <td><?php echo " ".$row["name"]." " ?></td>
            </tr>

        <?php
                }
            }
            else
                {echo "Ledger is Empty!";}

        ?>
        </tbody>
    </table>

</body>
</html>
