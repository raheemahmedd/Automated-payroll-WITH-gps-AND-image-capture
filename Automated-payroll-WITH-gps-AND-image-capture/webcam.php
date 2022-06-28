<?php
require_once 'systeem.php';
session_start();
if (isset($_POST['image'])) {
    $img = $_POST['image'];
    $sys = new SYSTEM();
    $sys->SendImage($img, $_SESSION['UserID']);
    header('Location: ' . $_SERVER['PHP_SELF']);
    header('Location: user.php');
}
?>
<!doctype html>
<html>

<head>
    <title>Capture picture from your webcam</title>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <style type="text/css">
        #results {
            border-style: none;
            position: absolute;
            right: 38%;
            bottom: 40px;
        }
    </style>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        .butt {
            color: #fff;
            background-color: #28a745;
            border-color: #28a745;
            position: absolute;
            right: 47%;
            bottom: -600%;
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

        .text {
            text-align: center;
            font-size: 30px;
            margin: 50px;
            color: #fff;
        }

        video {
            position: absolute;
            right: 54%;
        }

        input {
            position: absolute;
            right: 45%;
            height: 34px;
            width: 120px;
            border-radius: 10px;
            background-color: #ffc107;
            color: white;
            cursor: pointer;
        }

        #snapShot {
            display: none;
        }

        .takephoto {
            position: absolute;
            right: -9%;
            bottom: -250%;
        }

        video {
            position: absolute;
            right: 52%;

        }
    </style>
</head>

<body>
    <div class="wrap">
        <header>
            <div class="logo">LOGO</div>
            <div class="menu">
                <ul>


                </ul>
            </div>
        </header>

        <div class="text">User Account</div>
        <div id="camera" style="height:auto;width:auto; text-align:left;"></div>

        <!--FOR THE SNAPSHOT-->
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="row">
                <div class="col-md-6">
                    <div id="my_camera"></div>
                    <br />
                    <input class="takephoto" type="button" value="Take Snapshot" onClick="take_snapshot()" />
                    <input type="hidden" name="image" class="image-tag" />
                </div>
                <div class="col-md-6">
                    <div id="results"></div>
                </div>
                <div class="col-md-12 text-center">
                    <br />
                    <button class="butt">Submit</button>
                </div>
            </div>
        </form>
    </div>

</body>

<script>
    // CAMERA SETTINGS.
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 80
    });

    Webcam.attach('#camera');

    // SHOW THE SNAPSHOT.
    function take_snapshot() {
        Webcam.snap(function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById("results").innerHTML =
                '<img src="' + data_uri + '"/>';
        });
    }
    // function checked(){
    //     document.getElementById("checked").innerHTML = "";

    // }
</script>

</html>