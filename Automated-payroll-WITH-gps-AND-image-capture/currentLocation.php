<?php
	require_once 'db_connect.php';

	class CURRENTLOCATION{
		
		function GetCurrentLocation(){
			$ch=curl_init();
			curl_setopt($ch,CURLOPT_URL,"http://ip-api.com/json");
			curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
			$result=curl_exec($ch);
			$result=json_decode($result);
			return $result;
		}

		// function GetLocationID($lat, $lon, $UserID){
		// 	$db = new DB_CONNECT();
		// 	$con = $db -> connect();
		// 	$date= Date("Y-m-d");
		// 	$time = Date("H:i:s");
		// 	$sql = "SELECT LocationID FROM userlocation WHERE UserID = $UserID AND Latitude = $lat AND Longitude = $lon ";
		// 	$result = mysqli_fetch_array(mysqli_query($con, $sql));
		// 	return $result['LocationID'];
		// }
	}
