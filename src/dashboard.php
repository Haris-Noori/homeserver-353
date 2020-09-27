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
    <title>Dashboard</title>
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
            <div class="row">
                <input placeholder="Message" type="text" name="msg" class="form-control col-lg-5 msg-box" required style="margin-right: 3px">

                <button name="btn-send" type="submit" class="form-control col-lg-2 btn-success msg-box">Submit</button>
            </div>

            <br>
            <div class="form group-row">
                <?php
                    if(isset($_POST["btn-send"]))
                    {
                        $msg = $_POST["msg"];
                        $sender = $_SESSION["my_user"];

                        $qry = " INSERT INTO msgs(sender, msg) VALUES('".$sender."', '".$msg."')";

                        if($con->query($qry))
                        {
                            echo "<div class='col-sm-4 alert alert-success'>";
                            echo "Message Sent!";
                            echo "</div>";
                        }
                        else{
                            echo "<div class='col-sm-4 alert alert-success'>";
                            echo "Sending failed!!!";
                            echo "</div>";
                        }

                    }

                ?>
            </div>

        </form>
    </div>

    <h3>My Inbox </h3>
    <table class="table mytable">
        <thead class="thead-dark">
        <tr>
            <th scope="col-lg-2">Sent From</th>
            <th scope="col-lg-8">Message</th>
        </tr>
        </thead>
        <?php

            $qry = " SELECT * FROM msgs ORDER BY msg_id DESC";
            $res = $con->query($qry);
            $result = "";

            if($res->num_rows > 0)
            {

            while($row = $res->fetch_assoc())
            {
                ?>

            <tbody>
            <tr>
                <td><?php echo " ".$row["sender"]." " ?></td>
                <td><?php echo " ".$row["msg"]." " ?></td>
            </tr>

        <?php
                }
            }
            else
                {echo "No Messages Found!!";}

        ?>
        </tbody>
    </table>

</body>
</html>
