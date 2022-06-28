<?php

require_once 'db_connect.php';

session_start();

class PERSON
{
    function login($userID, $password)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "SELECT * FROM admin where AdminID = '$userID' And Password = '$password'";
        $resadmin = mysqli_query($con, $sql);
        $sql = "SELECT * FROM hr where HR_ID = '$userID' And Password = '$password'";
        $reshr = mysqli_query($con, $sql);
        $sql = "SELECT * FROM user where UserID = '$userID' And Password = '$password'";
        $resuser = mysqli_query($con, $sql);

        if ($row = mysqli_fetch_array($resadmin)) {

            $_SESSION['AdminID'] = $userID;
            header('Location: admin.php');
        } elseif ($row = mysqli_fetch_array($reshr)) {

            $_SESSION['HR_ID'] = $userID;
            header('Location: Hrpage.php');
        } elseif ($row = mysqli_fetch_array($resuser)) {

            $_SESSION['UserID'] = $userID;
            header('Location: webcam.php');
        } else {
            echo '<script>alert("Wrong password Or Wrong ID")</script>';
        }
    }
}
