<?php
$conn = mysqli_connect($serverName, $userName, $userPassword, $dbName) or die("Error Connect to Database");
mysqli_set_charset($conn, "utf8");

$sql = "SELECT * FROM `table`";
$query = mysqli_query($conn, $sql);

foreach ($query as $rank) :
    echo "{$rank["idrank"]}";
    echo "{$rank["name"]}";
endforeach;

// ภาพรวมของ forearch
// 1. ใช้คำสั่ง foreach( [old_value] as [new_value] ) ในการวนลูป
// 2. คำสั่ง foreach ไม่จำเป็นจะต้องกำหนดจำนวนรอบในการทำงาน

// ตัวอย่าง
$array = array(6, 7, 8, 9, 10);
$i = 0;
foreach ($array as $value) {
    echo "Array Index [$i] : " . $value . "<br/>";
    $i++;
}

// ผลลัพธ์
// Array Index [0] : 6
// Array Index [1] : 7
// Array Index [2] : 8
// Array Index [3] : 9
// Array Index [4] : 10

// ตัวอย่าง datalist ชื่อ list ระวังจะซ้ำระบบจะไม่ทำงาน
?>
<input name="value31" list="value31s" class="form-control" type="text" id="value31" value="<?= $value31; ?>">
<datalist id="value31s">
    <?php
    $sql = "SELECT DISTINCT value31 FROM `profile`";
    $query = mysqli_query($conn, $sql);
    foreach ($query as $row31) :
        echo "<option value={$row31["value31"]}>";
    endforeach;
    ?>
</datalist>