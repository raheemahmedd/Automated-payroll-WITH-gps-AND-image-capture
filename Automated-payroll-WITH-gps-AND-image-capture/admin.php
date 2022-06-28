<?php
require_once 'adminfun.php';
require_once 'db_connect.php';
session_start();
$sys = new ADMIN();
if (isset($_POST['passwordBtn'])) {

    $changeId = $_POST['changeId'];
    $newPassword = $_POST['newPassword'];
    $result = $sys->changePassword($changeId,  $newPassword);
    if ($result) {
        header('Location: ' . $_SERVER['PHP_SELF']);
    } else {
        echo '<script>alert("ERROR : SOMETHING WENT WRONG PLEASE TYR AGAIN!")</script>';
    }
}

if (isset($_POST['view'])) {

    $userId = $_POST['userId'];
    $startDate = $_POST['date'];
    $result = $sys->viewSalary($userId,  $startDate);
}
if (isset($_POST['removeBtn'])) {
    $userId = $_POST['removeId'];
    $result = $sys->removeUser($userId);
    if ($result) {
        header('Location: ' . $_SERVER['PHP_SELF']);
    } else {
        echo '<script>alert("ERROR : SOMETHING WENT WRONG PLEASE TYR AGAIN!")</script>';
    }
}
if (isset($_POST['feedbackBtn'])) {

    $userId = $_POST['idFeedback'];
    $feedback = $_POST['feedback'];
    $result = $sys->writeFeedback($userId, $feedback, $_SESSION['AdminID']);
}
if (isset($_POST['submitemployee'])) {
    $password = $_POST['password'];
    $confpass = $_POST['conpassword'];
    if (strcmp($password, $confpass) == 0) {
        $UserID = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $adminid = $_SESSION['AdminID'];
        $result = $sys->AddNewEmplyee($UserID, $password, $firstname, $lastname, $gender, $adminid);
        if ($result) {
            header('Location: ' . $_SERVER['PHP_SELF']);
        } else {
            echo '<script>alert("ERROR : SOMETHING WENT WRONG PLEASE TYR AGAIN!")</script>';
        }
    } else {
        echo '<script>alert("ERROR : MAKE SURE THAT EMPLOYEE\'S PASSWORD ARE THE SAME!")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .glow {
            font-size: 20px;
            color: #fff;
            text-align: center;
            animation: glow 1s ease-in-out infinite alternate;
        }

        @-webkit-keyframes glow {
            from {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #0955be, 0 0 40px #0955be, 0 0 50px #0955be, 0 0 60px #0955be, 0 0 70px #0955be;
            }

            to {
                text-shadow: 0 0 20px #fff, 0 0 30px #1220df, 0 0 40px #1220df, 0 0 50px #1220df, 0 0 60px #1220df, 0 0 70px #1220df, 0 0 80px #1220df;
            }
        }

        h1 {
            font-family: 'Nova Round', cursive;
        }

        .wrap {
            background: rgba(0, 0, 0, 0.5) url(FreeVector-Global-Business-Background-1.jpg) no-repeat;
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
            padding-bottom: 60px;
            position: relative;
            top: -300px;
            left: 20px
        }

        .form-container form {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 350px;
            position: relative;
            top: 300px;
            right: 40px;
        }

        .form-container .two {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 350px;
            position: relative;
            top: 305px;
            right: -1140px;
        }

        .form-container .three {
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            background: #fff;
            text-align: center;
            width: 1100px;
            top: 300px;
            left: -350px;
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
            color: #dc3545;
        }

        .form-container form .form-btn {
            background: #dc3545;
            color: #fff;
        }

        .form-container form .form-btn:hover,
        .form-container form .form-btn:focus {
            background-color: #892f2f
        }

        .form-container form .form-btn:active {
            background-color: #a6263e;
            box-shadow: 0 5px #666;
            transform: translateY(4px);
        }

        .para {
            text-align: center;
            font-size: 30px;
            margin: 50px;
        }

        .collapsible {
            background-color: #dc3545;
            color: white;
            cursor: pointer;
            padding: 18px;
            width: 130px;
            height: 90px;
            outline: none;
            font-size: 15px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
            display: inline-flexbox;
        }

        .active,
        .collapsible:hover {
            background-color: #a6263e;
        }

        .content {
            padding: 0 18px;
            display: none;
            overflow: hidden;
            background-color: #f1f1f1;
        }

        form {
            margin: 5px;
            position: relative;

        }

        form.check {
            position: relative;
            top: 283px;
        }

        div#bott {
            padding: -42px;
            padding: -79px;
            position: relative;
            /* bottom: -17px; */
            margin-top: 148px;
        }
    </style>
</head>

<body>
    <div class="wrap">


        <div class="form-container">

            <!--  add employee-->


            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>add new employee</h3>


                <input type="text" name="firstname" required placeholder="Set Employee's First Name">
                <input type="text" name="lastname" required placeholder="Set Employee's Last Name">
                <input type="text" name="id" required placeholder="Set Employee's ID">
                <input type="password" name="password" required placeholder="Set Emplyee's Password">
                <input type="password" name="conpassword" required placeholder="Confirm Employee's Password">
                <select name='gender'>
                    <option value='Male'>Male</option>
                    <option value='Female'>Female</option>
                </select>

                <input type="submit" name="submitemployee" value="Add" class="form-btn">
            </form>
            <!--  change password-->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" method="post">
                <h3>change password</h3>
                <input type="text" name="changeId" required placeholder="enter user id">
                <input type="password" name="newPassword" required placeholder=" enter new password">

                <input type="submit" name="passwordBtn" value="Send" class="form-btn">
            </form>
            <!--  check salary-->
            <form class="check" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <h3>check salary</h3>
                <input type="text" name="userId" required placeholder="user id">
                Select Date
                <input type="date" name="date">


                <input type="text" name="final" placeholder="results" value="<?php echo (isset($result)) ? $result : ''; ?>" readonly="">
                <input type="submit" name="view" value="view" class="form-btn">
            </form>
            <!--  view image-->
            <form action="viewImage.php" method="post" method="post">
                <h3>View image</h3>

                <input type="submit" name="submit" value="view" class="form-btn">
            </form>
        </div>
        <div id="bott" class="form-container">
            <!--  Remove user-->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" method="post">
                <h3>remove user</h3>
                <input type="text" name="removeId" required placeholder="enter user id">


                <input type="submit" name="removeBtn" value="submit" class="form-btn">
            </form>
            <!-- view Track -->
            <form action="viewMap.php" method="post" method="post">
                <h3>view track</h3>
                <!-- check vistor location in myproject folder -->
                <input type="submit" name="View" value="viewTrack" class="form-btn">
            </form>
            <!-- writeFeedback -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" method="post">
                <h3>write feedback</h3>
                <input type="text" name="idFeedback" required placeholder="enter employee id">
                <input type="text" name="feedback" required placeholder="write your feedback here..">

                <input type="submit" name="feedbackBtn" value="Send" class="form-btn">
            </form>

            <header>
                <div class="logo glow">LOGO</div>
                <div class="menu">
                    <ul>
                        <li><a href="index.html">Log Out</a></li>

                    </ul>
                </div>
            </header>

        </div>

        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }
                });
            }
        </script>

</body>

</html>