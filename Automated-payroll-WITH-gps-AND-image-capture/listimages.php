<?php
require_once "db_connect.php";
$db = new DB_CONNECT();
$con = $db->connect();
$sql = "SELECT PhotoId FROM photo ORDER BY PhotoID DESC";
$result = mysqli_query($con, $sql);
?>
<HTML>

<HEAD>
    <TITLE>List BLOB Images</TITLE>
    <link href="imageStyles.css" rel="stylesheet" type="text/css" />
</HEAD>

<BODY>
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <img src="imageView.php?PhotoID=1" /><br />

    <?php
    }
    mysqli_close($con);
    ?>
</BODY>

</HTML>