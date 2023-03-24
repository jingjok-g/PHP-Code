// sql รวม field หลายๆ field เข้าด้วยกัน ด้วย CONCAT

UPDATE `upload_file3` SET `U_Number` = CONCAT(`U_Id`, '/' , `U_Years` ) WHERE `upload_file3`.`U_Id` = 1

// ที่มา https://www.mindphp.com/developer/21-sql-mysql/115-sql-Mysq-%E0%B8%A3%E0%B8%A7%E0%B8%A1field-%E0%B8%AB%E0%B8%A5%E0%B8%B2%E0%B8%A2%E0%B9%86-field-%E0%B9%80%E0%B8%82%E0%B9%89%E0%B8%B2%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2%E0%B8%81%E0%B8%B1%E0%B8%99-%E0%B8%94%E0%B9%89%E0%B8%A7%E0%B8%A2-CONCAT.html
