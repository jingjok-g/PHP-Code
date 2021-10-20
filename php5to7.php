mysql_ ทั้งหมดเลย เป็น mysqli_
เช่น
mysql_connect เป็น mysqli_connect
mysql_query( เป็น mysqli_query($conn,

each ยกเลิก ใช้แบบนี้แทน
เก่า while (list($key, $value) = each($array)) {
ใหม่ foreach($array as $key => $value) {

ereg ยกเลิก ใช้ preg_match
เก่า ereg("ไทย", $objResult['value21'])
ใหม่ preg_match("/ไทย/", $objResult['value21'])

SET เป็น utf8
เก่า mysql_query("SET NAMES utf8");
ใหม่ mysqli_set_charset($objConnect,"utf8");

สำคัญเวลา INSERT หรือ UPDATE ลง SQL ถ้าเก็บข้อมูลตัวเลข ต้องมีข้อมูลให้มันเสมอห้ามค่าว่าง

https://www.thanop.com/php7-upgrade/
https://stackoverflow.com/questions/46492621/how-can-i-update-code-that-uses-the-deprecated-each-function
