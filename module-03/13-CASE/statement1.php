<?php
header('Content-Type: text/plain; charset=utf-8');
?>

CASE - Xử lý điều kiện như if...else... HOẶC if...else if...else nhưng ngôn ngữ lập trình


CASE
WHEN condition1 THEN result1
WHEN condition2 THEN result2
WHEN conditionN THEN resultN
ELSE resultOther
END;


Lưu ý: nếu không có ELSE và không thoả mãn điều kiện nào, nó sẽ trả về NULL.


Ví dụ:


SELECT student_id
,student_name
,CASE WHEN student_gender = 1 THEN 'Nam'
WHEN student_gender = 0 THEN
ELSE null
END AS Gender
FROM students