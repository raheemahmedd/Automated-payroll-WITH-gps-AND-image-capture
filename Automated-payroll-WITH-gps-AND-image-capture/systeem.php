<?php
require_once 'db_connect.php';
require_once 'currentLocation.php';
require_once 'getLatLong.php';


class SYSTEM
{
    private $state;

    function TrackEvery5Minutes($user)
    {

        $loc = new CURRENTLOCATION();
        $state = true;
        set_time_limit(0);
        while ($state) {
            $loc->GetCurrentLocation($user);
            sleep(300);
        }
    }

    function SendLocation($UserID)
    {
        $db = new DB_CONNECT();
        $cl = new CURRENTLOCATION;
        $con = $db->connect();
        $date = Date("Y-m-d");
        $time = Date("H:i:s");
        $result = $cl->GetCurrentLocation();
        if ($result->status == 'success') {
            if (isset($result->lat) && isset($result->lon)) {
                $sql = "INSERT INTO userlocation (UserID, Latitude, Longitude, LocationDate, LocationTime) VALUES($UserID, $result->lat, $result->lon, '$date', '$time')";
                mysqli_query($con, $sql);
                $locID = mysqli_insert_id($con);
            }
        }
        $db->__destruct();
        return $locID;
    }

    function CalculateSalary($UserID, $date)
    {
        $dis = new SYSTEM();
        $latlon = new LATLONG();
        $location = $latlon->GetLocation($UserID, $date);
        $totalkm = $dis->CalculateDistance($location);
        $totalsalary = $totalkm * 5;
        $dis->SendSalary($UserID, $totalsalary);
    }

    function SendSalary($UserID, $salaryAmt)
    {
        $date = Date("Y-m-d");
        $time = Date("H:i:s");
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "INSERT INTO usersalary(UserID, SalaryAmt, SalaryDate, SalaryTime) VALUES ($UserID, $salaryAmt, '$date', '$time')";
        mysqli_query($con, $sql);
        $db->__destruct();
    }

    function CalculateDistance($location)
    {
        $count = 0;
        $distance = 0;
        while ($count + 1 < count($location)) {
            if (($location[$count]['Latitude'] == $location[$count + 1]['Latitude']) && ($location[$count]['Longitude'] == $location[$count + 1]['Longitude'])) {
                $distance = $distance;
            } else {
                $delta_lat = $location[$count + 1]['Latitude'] - $location[$count]['Latitude'];
                $delta_lon = $location[$count]['Longitude'] - $location[$count]['Longitude'];

                $earth_radius = 6372.795477598;

                $alpha    = $delta_lat / 2;
                $beta     = $delta_lon / 2;
                $a        = sin(deg2rad($alpha)) * sin(deg2rad($alpha)) + cos(deg2rad($location[$count]['Latitude'])) * cos(deg2rad($location[$count + 1]['Latitude'])) * sin(deg2rad($beta)) * sin(deg2rad($beta));
                $c        = asin(min(1, sqrt($a)));
                $distance = 2 * $earth_radius * $c;
                $distance = round($distance, 4);
            }
            $count++;
        }
        return $distance;
    }

    function SendImage($image, $UserID)
    {
        $db = new DB_CONNECT();
        $sys = new SYSTEM();
        $con = $db->connect();
        $date = Date("Y-m-d");
        $time = Date("H:i:s");
        $locID = $sys->SendLocation($UserID);
        $image_parts = explode(";base64,", $image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $name = $image_type . uniqid();
        $sql = "INSERT INTO photo(UserID, PhotoDate, PhotoTime, PhotoName, Photo, LocationID) VALUES ($UserID, '$date', '$time', '$name', '$image', $locID)";
        $check = mysqli_query($con, $sql) or die(mysqli_error($con));
        if (!$check) {
            return false;
        } else {
            return true;
        }
    }

    function RetrieveImage($UserID, $date)
    {
        $db = new DB_CONNECT();
        $con = $db->connect();
        $sql = "SELECT * FROM photo WHERE UserID = $UserID AND PhotoDate= '$date';";
        $result = mysqli_query($con, $sql);
        $count = 0;
        while ($row = mysqli_fetch_array($result)) {
            $image[$count] = $row;
            $count++;
        }
        return $image;
    }
}
