<?php
// sql to PHP Associative Arrays
$rows = [];
while ($objResuut = mysqli_fetch_array($objQuery)) {
$rows[$objResuut['wd1']] = $objResuut['wd2'];
}

echo $rows["69"];
var_dump($rows);

// ตัวอย่าง
// array(9) { [69]=> string(24) "โปลีเทรด" [70]=> string(51) "หมู่บ้านโพธิ์แก้ว"}
// ที่มา
// https://stackoverflow.com/questions/17056349/convert-sql-results-into-php-array
// https://stackoverflow.com/questions/35357092/how-to-create-associative-array-from-sql-table
?>

