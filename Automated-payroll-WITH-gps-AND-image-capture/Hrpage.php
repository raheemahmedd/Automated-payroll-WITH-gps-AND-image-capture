<?php
require_once 'hrFun.php';
require_once 'db_connect.php';
session_start();
//error_reporting(0);
$sys = new HR();
try {
    if (isset($_POST['sendbonus'])) {
        $bonusamt = $_POST['bonus'];
        $UserID = $_POST['userid'];
        $check = $sys->SendBonus($UserID, $_SESSION['HR_ID'], $bonusamt);
        if (!$check) {
            echo '<script>alert("ERROR : SOMETHING WENT WRONG PLEASE TRY AGAIN!")</script>';
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            echo '<script>alert("SUCCESSFUL : YOUR DATA HAS BEEN ENTERED SUCCESSFULLY")</script>';
            header('Location: ' . $_SERVER['PHP_SELF']);
        }
    }
    if (isset($_POST['sendpenalty'])) {
        $penaltyamt = $_POST['penalty'];
        $UserID = $_POST['userid'];
        $check = $sys->SendPenalty($UserID, $_SESSION['HR_ID'], $penaltyamt);
        if (!$check) {
            echo '<script>alert("ERROR : SOMETHING WENT WRONG PLEASE TRY AGAIN!")</script>';
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            echo '<script>alert("SUCCESSFUL : YOUR DATA HAS BEEN ENTERED SUCCESSFULLY")</script>';
            header('Location: ' . $_SERVER['PHP_SELF']);
        }
    }
    if (isset($_POST['viewFeedback'])) {
        $UserID = $_POST['idf'];
        $feedback = $sys->getFeedback($UserID);
    }
} catch (Exception $e) {
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hr Page</title>
    <style>
        textarea {
            width: 100%;
            padding: 10px 15px;
            font-size: 17px;
            margin: 8px 0;
            background: #eee;
            border-radius: 5px;
        }

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
    </style>
</head>

<body>
    <div class="wrap">

        <div class="text">Hr Account</div>


        <div class="form-container">


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>Send Bouns</h3>
                <input type="text" name="userid" required placeholder="Enter user id">
                <input type="text" name="bonus" required placeholder="Enter Bonus">

                <input type="submit" name="sendbonus" value="Send" class="form-btn">
            </form>
            <form class="two" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>Send Penalties</h3>
                <input type="text" name="userid" required placeholder="Enter user id">
                <input type="text" name="penalty" required placeholder="Enter Penalty">

                <input type="submit" name="sendpenalty" value="Send" class="form-btn">
            </form>

            <form action="vacationReq.php" class="three">
                <h3>Vacation Request</h3>


                <input type="submit" name="view" value="View Requests" class="form-btn">


            </form>
            <form class="four" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>View Feedback</h3>
                <input type="text" name="idf" required placeholder="Enter user id">
                <input type="submit" name="viewFeedback" value="View" class="form-btn">
                <input type='text' value="<?php echo (isset($feedback)) ? $feedback : ''; ?>" readonly=''>
            </form>
        </div>

        <header>
            <div class="logo">LOGO</div>
            <div class="menu">
                <ul>
                    <li><a href="index.html">Log Out</a></li>

                </ul>
            </div>
        </header>
    </div>

</body>

</html>