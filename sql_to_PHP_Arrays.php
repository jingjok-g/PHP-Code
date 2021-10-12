<?php
sql to PHP Associative Arrays
$rows = [];
while ($objResuut = mysqli_fetch_array($objQuery)) {
$rows[$objResuut['wd1']] = $objResuut['wd2'];
}

echo $rows["69"];
var_dump($rows);

ตัวอย่าง
array(9) { [69]=> string(24) "โปลีเทรด" [70]=> string(51) "หมู่บ้านโพธิ์แก้ว"}
// https://stackoverflow.com/questions/17056349/convert-sql-results-into-php-array
// https://stackoverflow.com/questions/35357092/how-to-create-associative-array-from-sql-table

เช็คข้อมูลใน array ว่ามีข้อมูลไหม array_keys(array, value, strict)
$a=array(10,20,30,"10");
print_r(array_keys($a,"10",false)); //false ตรวจเจอทั้ง 10 และ "10"  ถ้าเป็น true เจอแต่ "10"
หรือ
if(array_keys($a,"10",false)) {echo "true";}
else {echo "false";}
// https://www.w3schools.com/PHP/func_array_keys.asp
?>

