<?php
    require_once "db_connect.php";
    $db = new DB_CONNECT();
    $con = $db -> connect();
    if(isset($_GET['image_id'])) {
        $sql = "SELECT PhotoName, Photo FROM photo WHERE PhotoId= 10" ;
		$result = mysqli_query($con, $sql) or die("<b>Error:</b> Problem on Retrieving Image BLOB<br/>" . mysqli_error($con));
		$row = mysqli_fetch_array($result);
		header("Content-type: " . $row["imageType"]);
        echo $row["imageData"];
	}
	mysqli_close($con);
