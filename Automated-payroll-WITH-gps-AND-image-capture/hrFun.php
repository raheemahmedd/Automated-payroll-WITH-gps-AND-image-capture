<?php
require_once 'db_connect.php';
class HR
{

    function SendBonus($UserID, $HR_ID, $bonusamt)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $date = Date("Y-m-d");
        $time = Date("H:i:s");
        $sql = "INSERT INTO userbonus(UserID, HR_ID, BonusAmt, Date, Time) VALUES ($UserID, '$HR_ID', $bonusamt, '$date', '$time') ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }

    function SendPenalty($UserID, $HR_ID, $penaltyamt)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $date = Date("Y-m-d");
        $time = Date("H:i:s");
        $sql = "INSERT INTO userpenalty(UserID, HR_ID, PenaltyAmt, Date, Time) VALUES ($UserID, '$HR_ID', $penaltyamt, '$date', '$time') ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
        if (!$result) {
            return false;
        } else {
            return true;
        }
    }
    function getFeedback($userID)
    {

        $db = new DB_CONNECT();
        $con = $db->connect();

        $sql = "SELECT * FROM feedback WHERE UserID = $userID;";

        $result = mysqli_query($con, $sql) or die(mysqli_error($con));

        $feedback = "";
        while ($row = mysqli_fetch_array($result)) {
            $feedback = $row['Feedback'];
        }

        return $feedback;
    }
    function viewVacation($userId)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "SELECT * FROM vacation WHERE UserID = $userId;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));

        while ($row = mysqli_fetch_array($result)) {
            if (!$row['Respond']) {
                $row['Respond'] = 'No Respond Yet';
            }
            echo "<tr><td>" . $row['RequestID'] . "</td><td>" . $row['StartDate'] . "</td><td> " . $row['EndDate'] . "</td><td> " . $row['ReasonFor'] . "</td><td>" . $row['Respond'] . "</td></tr>";
        }
    }
    function vacationRespondACC($reqId, $hrId)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        echo $hrId;
        $sql = "UPDATE  vacation SET Respond = 'Accepted', HR_ID = $hrId WHERE RequestID = $reqId  ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    }
    function vacationRespondREF($reqId, $hrId)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();

        $sql = "UPDATE  vacation SET Respond= 'Refused', HR_ID = $hrId WHERE RequestID= $reqId  ;";
        $result = mysqli_query($con, $sql) or die(mysqli_error($con));
    }
}
