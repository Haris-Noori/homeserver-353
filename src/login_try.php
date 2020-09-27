<?php
    session_start();
    include "connect.php";

    
    $user = $_POST["name"];
    $pass = $_POST["pass"];

    $qry = "SELECT * FROM admins WHERE name = '".$user."' ";

    // ----------------------- check if query working
 
   $res = $con->query($qry);
   if($res)
    {
       // echo "Query run success"; 
    }
    else
    {
       // echo "Query didn't run";
    }
    //---------------------------------------

    //$res = $con->query($qry);
    $msg = "";

    if($res->num_rows > 0)
    {   //admin exists
        $row = $res->fetch_assoc();
        if($row["pass"] == $pass)
        {  
            $_SESSION["id"] = $row["id"];
	
            $_SESSION["my_user"] = $user;
            header("Location:dashboard.php");  // -->Move next
        }
        else
        {   //password is incorrect
            $msg = "Invalid Password";
            header("Location:../index.php?Message=$msg");
        }
    }
    else
    {   //admin does not exist
        $msg = " ".$user." does not exist";
        header("Location:../index.php?Message=$msg");
    }
    
?>
