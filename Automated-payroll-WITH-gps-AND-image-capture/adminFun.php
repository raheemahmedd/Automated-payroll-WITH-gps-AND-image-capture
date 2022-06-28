<?php
require_once 'db_connect.php';
require_once 'systeem.php';
require_once 'currentLocation.php';
require_once 'getLatLong.php';

class ADMIN
{

    function AddNewEmplyee($UserID, $password, $firstname, $lastname, $gender, $adminID)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "INSERT INTO user(UserID, Password, FirstName, LastName, Gender, AdminID) VALUES ($UserID, '$password', '$firstname', '$lastname', '$gender', '$adminID') ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    function removeUser($userId)
    {

        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "DELETE FROM user
    WHERE UserID = '$userId' ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        return $result;
    }

    function changePassword($changeId,  $newPassword)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "UPDATE  user SET Password= '$newPassword'WHERE UserID='$changeId'  ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        return $result;
    }


    function viewImage($userId, $date)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sys = new System();
        $count = 0;
        $check = $sys->RetrieveImage($userId, $date);
        while ($count + 1 <= count($check)) {
            echo "<tr>";

            echo "<td><img  class='img' src='" . $check[$count]['Photo'] . "'/></td>";
            echo "<td>" . $check[$count]['PhotoTime'] . "</td>";
            echo "</tr>";
            $count++;
        }
    }

    function viewMap($userId, $date)
    {

        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "SELECT  Latitude , Longitude , LocationTime FROM userlocation WHERE UserID = '$userId' AND LocationDate='$date' ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));

        while ($row = mysqli_fetch_array($result)) {
            echo "<tr><td>" . $row['Latitude'] . "</td><td>" . $row['Longitude'] . "</td><td> " . $row['LocationTime'] . "</td></tr>";
        }
    }

    function writeFeedback($userId, $feedback, $adminId)
    {

        $db = new DB_CONNECT();
        $con = $db->connect();
        $date = Date("Y-m-d");
        $time = Date("H:i:s");
        $sql = "INSERT INTO feedback(UserID, AdminID, Feedback , Date, Time) VALUES ($userId, '$adminId', '$feedback', '$date', '$time') ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    }

    function viewSalary($userId,  $startDate)
    {

        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "SELECT * FROM usersalary WHERE UserID = '$userId' AND SalaryDate='$startDate' ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $salary = 0;
        while ($row = mysqli_fetch_array($result)) {
            $salary += $row['SalaryAmt'];
        }

        return  $salary;
    }
}
