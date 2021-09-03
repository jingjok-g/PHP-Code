easy way to execute conditional html / javascript / css / other language code with php if else:

<?php if (condition): ?>

html code to run if condition is true

<?php else: ?>

html code to run if condition is false

<?php endif ?>

https://www.php.net/manual/en/control-structures.if.php


<?php
if ($a > $b) {
    echo "a is bigger than b";
} elseif ($a == $b) {
    echo "a is equal to b";
} else {
    echo "a is smaller than b";
}
?>

หมายเหตุ : โปรดทราบว่าelseifและelse if จะถือว่าเหมือนกันทุกประการเมื่อใช้วงเล็บปีกกาตามตัวอย่างด้านบนเท่านั้น เมื่อใช้โคลอนเพื่อกำหนด if/ elseifเงื่อนไข คุณต้องไม่แยกelse ifคำออกเป็นสองคำ มิฉะนั้น PHP จะล้มเหลวโดยมีข้อผิดพลาดในการแยกวิเคราะห์


<?php

/* Incorrect Method: */
if ($a > $b):
    echo $a." is greater than ".$b;
else if ($a == $b): // Will not compile.
    echo "The above line causes a parse error.";
endif;


/* Correct Method: */
if ($a > $b):
    echo $a." is greater than ".$b;
elseif ($a == $b): // Note the combination of the words.
    echo $a." equals ".$b;
else:
    echo $a." is neither greater than or equal to ".$b;
endif;

?>

https://www.php.net/manual/en/control-structures.elseif.php
