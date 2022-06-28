<?php
  include 'db_connect.php';


function getBonus($userid){
    $sql = "SELECT BonousAmt FROM userbonus WHERE UserId='$userid'  ";
    $db= new DB_CONNECT();

     $conn= $db->connect();
    $result = mysqli_query($conn, $sql);
    echo  $result;
    
}
