<?php
// ที่มา https://www.ninenik.com/%E0%B8%88%E0%B8%B1%E0%B8%9A%E0%B8%A0%E0%B8%B2%E0%B8%9E_web_screenshot_%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2_Google_PageSpeed_API-985.html
// https://www.codegrepper.com/code-examples/php/convert+base64+to+image+php

// ปิดการแสดง error
@ini_set('display_errors', '0');
// การใช้งาน cURL 
// เร่มต้นการทดสอบคำนวณเวลาการทำงาน calculate time
$time_start = microtime(true);

// กำหนด url เว็บไซต์ที่ต้องการ
$webURL = "https://www.youtube.com/channel/UCd7UilppsSFyXmafflXBQCA";
$param = array(
    // "strategy"=>"mobile", // comment ปิดส่วนนี้ หากต้องการผลแบบ desktop
    "url" => $webURL
);
$qury_str = http_build_query($param);

// ใช้วิธี cURL
try {
    $endpontURL = "https://www.googleapis.com/pagespeedonline/v5/runPagespeed?" . $qury_str;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $endpontURL);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec($ch);
    $screen_shot_result = json_decode($result, true);
    $screen_shot = $screen_shot_result['lighthouseResult']['audits']['final-screenshot']['details']['data'];
} finally {
    curl_close($ch);
}

if (isset($screen_shot) && !empty($screen_shot)) {
    echo "<img src='{$screen_shot}' />";
}

// ส่วนกำหนดเวลาจบการทำงาน สำหรับคำนวณ
$time_end = microtime(true);
// เวลาการทำงาน ในหน่วยวินาที และ นาที
$execution_time_second = $time_end - $time_start;
$execution_time_minute = floor((int)$execution_time_second / 60) + ((int)$execution_time_second % 60) * 0.01;

// เวลาในการทำงานปรมวลผลของคำสั่ง
echo '<br/><br/><b>Total Execution Time:</b> ' . $execution_time_second . ' Seconds';
echo '<br/><b>Total Execution Time:</b> ' . $execution_time_minute . ' Minutes';

// แปลง base64 เป็น jpeg และ save รูปลงเครื่อง
function base64_to_jpeg($base64_string, $output_file)
{
    $ifp = fopen($output_file, "wb");
    fwrite($ifp, base64_decode($base64_string));
    fclose($ifp);
    return ($output_file);
}
// ตัดคำที่ไม่ได้ใช้ data:image/jpeg;base64
$screen_shot = str_replace('data:image/jpeg;base64,', '', $screen_shot);
$image = base64_to_jpeg($screen_shot, 'img_screen.jpg');
