<?php
header('Content-Type: text/plain; charset=utf-8');
?>

PHP MySQL - Prepared Statements

Câu lệnh prepare rất tốt trong việc dùng để chống SQL Injection.

Có 3 kiểu để thực hiện truyền giá trị vào tham số trong Query SQL.


Kiểu 1: kết hợp hàm bindParam

$stmt = $conn->prepare("SELECT * FROM Posts WHERE Title LIKE :title AND IsActive = :isActive");
$stmt->bindParam(':title', '%lorem%');
$stmt->bindParam(':isActive', 1);
$stmt->execute();


Kiểu 2: tạo 1 mảng trong đó key => tương ứng param trong Query SQL => truyền mảng vào trong hàm execute

$stmt = $conn->prepare("SELECT * FROM Posts WHERE Title LIKE :title AND IsActive = :isActive");
$data = ['title' => '%lorem%'];
$data = ['isActive' => 1];
$stmt->execute($data);


Kiểu 3: param trong Query SQL là dấu chấm hỏi (?) - tạo 1 mảng các giá trị sẽ tương ứng theo tuần tự mảng => truyền mảng vào trong hàm execute

$stmt = $conn->prepare("SELECT * FROM Posts WHERE Title LIKE ? AND IsActive = ?");
$data = ['%lorem%', 1];
$stmt->execute($data);