<?php

require_once 'db_connect.php';

class USER
{
    function SendVacation($UserID, $reason, $startdate, $enddate)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "INSERT INTO vacation(UserID, ReasonFor, StartDate, EndDate) VALUES ($UserID, '$reason', '$startdate', '$enddate') ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    function GetBonus($UserID)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "SELECT * FROM userbonus WHERE UserID = $UserID;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $bonusamt = 0;
        while ($row = mysqli_fetch_array($result)) {
            $bonusamt += $row['BonusAmt'];
        }
        return $bonusamt;
    }

    function GetPenalty($UserID)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "SELECT * FROM userpenalty WHERE UserID = $UserID;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        $penaltyamt = 0;
        while ($row = mysqli_fetch_array($result)) {
            $penaltyamt += $row['PenaltyAmt'];
        }
        return $penaltyamt;
    }

    function viewRespond($userId)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "SELECT * FROM vacation WHERE UserID = $userId;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));

        while ($row = mysqli_fetch_array($result)) {
            if ($row['Respond'] == null)
                $row['Respond'] = 'No Respond Yet';
            echo "<tr><td>" . $row['RequestID'] . "</td><td>" . $row['StartDate'] . "</td><td> " . $row['EndDate'] . "</td><td> " . $row['ReasonFor'] . "</td><td> " . $row['Respond'] . "</td></tr>";
        }
    }
}
