<?php
include 'userFun.php';
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hr Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        h1 {
            font-family: 'Nova Round', cursive;
        }

        .wrap {
            background: rgba(0, 0, 0, 0.5) url(images/FreeVector-Global-Business-Background-1.jpg) no-repeat;
            background-position: center;
            background-size: cover;
            min-height: 100vh;
            overflow: hidden;
            background-blend-mode: overlay;
        }

        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            padding: 25px 80px;
            background: linear-gradient(to top, transparent, rgba(0, 0, 0, 0.6));
        }

        header .logo {
            font-size: 28px;
            font-weight: 700;
            color: #fff;
            float: left;
        }

        header .menu {
            float: right;
            margin-top: 5px;
        }

        header ul li {
            display: inline-block;
        }

        header ul li a {
            text-decoration: none;
            font-size: 16px;
            color: #fff;
            margin: 0 25px;
            font-weight: 300;
            letter-spacing: 1px;
        }

        .form-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            padding-bottom: 240px;

        }

        .form-container form {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgb(0 0 0 / 10%);
            background: #fff;
            text-align: center;
            width: 350px;
            position: relative;
            top: 100px;
            right: 50px;


        }

        .form-container .two {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 350px;
            position: relative;
            top: 100px;
            right: 20px;


        }

        select {
            margin-bottom: 10px;
            margin-top: 10px;
            outline: 0px;
            background: crimson;
            color: #fff;
            border: 1px solid crimson;
            padding: 12px;
            padding-right: 12px;
            padding-left: 12px;
            border-radius: 5px;
            padding-left: 75px;
            padding-right: 75px;
            text-align: center;
        }

        .form-container .three {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 350px;
            position: relative;
            top: 100px;
            left: 10px;


        }

        .form-container .four {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 350px;
            position: relative;
            top: 100px;
            left: 50px;


        }

        .form-container form h3 {
            font-size: 30px;
            text-transform: uppercase;
            margin-bottom: 10px;
            color: #333;
        }

        .form-container form input {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
        }

        .form-container form p {
            margin-top: 10px;
            font-size: 20px;
            color: #333;
        }

        .form-container form p a {
            color: crimson;
        }

        .form-container form .form-btn {
            background: crimson;
            color: #fff;
        }

        .text {
            text-align: center;
            font-size: 30px;
            margin: 50px;
            color: #fff;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 90%;
            margin-right: 5%;
            margin-left: 5%;
            margin-top: 60px;
        }

        input.form-btn {
            position: relative;
            left: 237px;
            height: 36px;
            width: 50px;
        }

        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
            color: red;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        input[type="text"] {
            height: 35px;
            position: absolute;
            left: 58px;
            margin-bottom: 5px;
            width: 165px;
        }
    </style>
</head>

<body>
    <div class="wrap">
        <header>
            <div class="logo">LOGO</div>
            <div class="menu">
                <ul>
                    <li><a href="user.php">Back</a></li>

                </ul>
            </div>
        </header>

        <div class="text">User Account</div>
        <h3 style="text-align: center; color:white">Vacation Responds</h3>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">




            <table>

                <tr>
                    <th>Request ID</th>
                    <th>From</th>
                    <th>To</th>
                    <th>Reason</th>
                    <th>Respond</th>
                </tr>
                <?php

                $sys = new USER();

                $check = $sys->viewRespond($_SESSION['UserID']);
                // if(!$check){
                //     echo '<script>alert("ERROR : SOMETHING WENT WRONG PLEASE TRY AGAIN!")</script>';
                //     header('Location: ' . $_SERVER['PHP_SELF']);
                // }else{
                //     echo '<script>alert("SUCCESSFUL : YOUR DATA HAS BEEN ENTERED SUCCESSFULLY")</script>';
                //     header('Location: ' . $_SERVER['PHP_SELF']);
                // }


                ?>
            </table>

        </form>