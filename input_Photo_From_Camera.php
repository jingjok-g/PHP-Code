<!DOCTYPE html>
<html>

<head>
    <title>ถ่ายรูปจากกล้องหน้าเก็บลงเครื่อง</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">

    <style type="text/css">
        button {
            width: 120px;
            padding: 10px;
            display: block;
            margin: 20px auto;
            border: 2px solid #111111;
            cursor: pointer;
            background-color: white;
        }

        #start_camera {
            margin-top: 50px;
        }

        #video {
            display: none;
            margin: 50px auto 0 auto;
        }

        #click_photo {
            display: none;
        }

        #dataurl_container {
            display: none;
        }

        #canvas {
            display: block;
            margin: 0 auto 20px auto;
        }

        #dataurl_header {
            text-align: center;
            font-size: 15px;
        }

        #dataurl {
            display: block;
            height: 100px;
            width: 320px;
            margin: 10px auto;
            resize: none;
            outline: none;
            border: 1px solid #111111;
            padding: 5px;
            font-size: 13px;
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <?php
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    if (strpos($user_agent, 'iPhone') !== false) {
        echo "ผู้ใช้กำลังใช้งานผ่านอุปกรณ์ iPhone";
    } elseif (strpos($user_agent, 'Android') !== false) {
        echo "ผู้ใช้กำลังใช้งานผ่านอุปกรณ์แอนดรอยด์ (Android)";
    } else {
        echo "ผู้ใช้ไม่ใช้งานผ่านอุปกรณ์ iPhone หรือแอนดรอยด์";
    }
    ?>
    <br>
    <?php
    $userAgent = $_SERVER['HTTP_USER_AGENT'];

    if (strpos($userAgent, 'Chrome') !== false) {
        // ตรวจสอบว่าใช้ Chrome
        echo "Using Chrome";
    } elseif (strpos($userAgent, 'Firefox') !== false) {
        // ตรวจสอบว่าใช้ Firefox
        echo "Using Firefox";
    } elseif (strpos($userAgent, 'Safari') !== false) {
        // ตรวจสอบว่าใช้ Safari
        echo "Using Safari";
    } elseif (strpos($userAgent, 'Opera') !== false) {
        // ตรวจสอบว่าใช้ Opera
        echo "Using Opera";
    } elseif (strpos($userAgent, 'Edge') !== false) {
        // ตรวจสอบว่าใช้ Microsoft Edge
        echo "Using Microsoft Edge";
    } elseif (strpos($userAgent, 'Trident') !== false) {
        // ตรวจสอบว่าใช้ Internet Explorer
        echo "Using Internet Explorer";
    } else {
        // ไม่รู้จักเบราว์เซอร์
        echo "Unknown browser";
    }
    echo "<br>$userAgent";
    ?>
    <!-- new -->
    <button id="start_camera">Start Camera</button>
    <video id="video" width="320" height="240" autoplay></video>
    <button id="click_photo">Click Photo</button>
    <div id="dataurl_container">
        <form method="post">
            <canvas id="canvas" width="320" height="240"></canvas>
            <div id="dataurl_header">Image Data URL</div>
            <textarea id="dataurl" name="data_url" readonly></textarea>
            <center><input id="savephoto" type="submit" value="save img"></center>
        </form>
    </div>

    <script>
        let camera_button = document.querySelector("#start_camera");
        let video = document.querySelector("#video");
        let click_button = document.querySelector("#click_photo");
        let canvas = document.querySelector("#canvas");
        let dataurl = document.querySelector("#dataurl");
        let dataurl_container = document.querySelector("#dataurl_container");

        camera_button.addEventListener('click', async function() {
            let stream = null;

            try {
                stream = await navigator.mediaDevices.getUserMedia({
                    video: true,
                    audio: false
                });
            } catch (error) {
                alert(error.message);
                return;
            }

            video.srcObject = stream;

            video.style.display = 'block';
            camera_button.style.display = 'none';
            click_button.style.display = 'block';

            // ถ่ายรูปอัตโนมัติ
            setTimeout(function() {
                click_photo.click();
            }, 1000);
        });

        click_button.addEventListener('click', function() {
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            let image_data_url = canvas.toDataURL('image/jpeg');

            dataurl.value = image_data_url;
            dataurl_container.style.display = 'block';

            // save รูปอัตโนมัติ
            setTimeout(function() {
                savephoto.click();
            }, 1000);
        });
    </script>
    <?php
    $_POST['data_url'] = $_POST['data_url'] ?? '';
    if ($_POST["data_url"] != '') {
        // data url string that was uploaded
        $data_url = $_POST["data_url"];

        list($type, $data) = explode(';', $data_url);
        list(, $data)      = explode(',', $data);
        $data = base64_decode($data);

        file_put_contents('z.jpg', $data);
        header("Location: success.php");
        exit();
    }
    ?>
    <!-- new -->
</body>

</html>