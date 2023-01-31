คำสั่ง sql แยกหรือตัดข้อมูลใน field

โดยเราจะใช้ String Functions ที่ชื่อว่า
SUBSTRING_INDEX(ชื่อฟิลด์,ตัวแบ่งเขตข้อมูล,จำนวน)

ตัวอย่าง แสดงเฉพาะชื่อ
SELECT SUBSTRING_INDEX(FullName,' ',1) AS Fname  FROM tb_member

ตัวอย่าง แยกชื่อและนามสกุล
SELECT SUBSTRING_INDEX(FullName,' ',1) AS Fname , SUBSTRING_INDEX(FullName,' ',-1) AS Lname FROM tb_member

ที่มา https://memo8.com/sql-substring_index/
