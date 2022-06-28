<?php
session_start();
include 'systeem.php';
$cur = new SYSTEM();
if (isset($_SESSION['UserID']))
    $cur->SendLocation($_SESSION['UserID']);
