<?php
require_once 'userFun.php';
require_once 'db_connect.php';
session_start();
$sys = new USER();
if (isset($_POST['view'])) {
    $bonusamt = $sys->GetBonus($_SESSION['UserID']);
    $penaltyamt = $sys->GetPenalty($_SESSION['UserID']);
}
if (isset($_POST['send'])) {
    $reason = $_POST['reason'];
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $check = $sys->SendVacation($_SESSION['UserID'], $reason, $startdate, $enddate);
    if (!$check) {
        echo '<script>alert("ERROR : SOMETHING WENT WRONG PLEASE TRY AGAIN!")</script>';
        header('Location: ' . $_SERVER['PHP_SELF']);
    } else {
        echo '<script>alert("SUCCESSFUL : YOUR DATA HAS BEEN ENTERED SUCCESSFULLY")</script>';
        header('Location: ' . $_SERVER['PHP_SELF']);
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
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
            padding-bottom: 280px;

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

        /* .form-container .four{
            padding:20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0,0,0,.1);
            background: #fff;
            text-align: center;
            width: 350px;
            position: relative;
            top: 100px;
            left: 50px;
            

        }*/
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

        .View-form {
            border: .5px solid;
            padding: 15px;
            background: crimson;
            color: white;
            border-radius: 5px;
        }

        .vacation {
            margin: auto;
        }

        .bonus {
            margin: auto;
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
    </style>
</head>

<body>
    <div class="wrap">

        <div class="text">User Account</div>


        <div class="form-container">


            <form class="bonus" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>ViewBonus</h3>
                <input id="vibon" type="text" name="viewbonus" value="<?php echo (isset($bonusamt)) ? $bonusamt : ''; ?>" readonly="">

                <h3>ViewPenalities</h3>
                <input type="text" value="<?php echo (isset($penaltyamt)) ? $penaltyamt : ''; ?>" readonly="">

                <input type="submit" name="view" value="View" class="form-btn">
            </form>

            <form class="vacation" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>RequestVacation</h3>
                <input type="text" name='reason' required placeholder="Reason For">
                Start Date
                <input type="date" name="startdate" required placeholder="Start data">
                End Date
                <input type="date" name="enddate" required placeholder="End data">

                <input type="submit" name="send" value="Send" class="form-btn">
            </form>
            <form class="vacation" action="stateReq.php" method="post">
                <h3>View Respond of Request</h3>
                <input type="submit" name="ViewState" value="View" class="form-btn">
            </form>
        </div>
        <header>
            <div class="logo">LOGO</div>
            <div class="menu">
                <ul>
                    <li><a href="webcamlogout.php">Log Out</a></li>

                </ul>
            </div>
        </header>

    </div>
</body>

</html>