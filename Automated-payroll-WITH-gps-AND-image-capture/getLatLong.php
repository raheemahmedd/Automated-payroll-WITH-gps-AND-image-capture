<?php
require_once 'db_connect.php';

class LATLONG
{

    function GetLocation($UserID, $date)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "SELECT Latitude, Longitude from userlocation where UserID = $UserID and LocationDate = '$date';";
        $result = mysqli_query($con, $sql);
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
            $location[$count] = $row;
            $count++;
        }
        $db->__destruct();
        return $location;
    }
}
