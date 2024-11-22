<?php
header('Content-Type: text/plain; charset=utf-8');
?>

Toán tử EXISTS - kiểm tra có tồn tại hay không ? => Nếu TRUE thì lấy ra câu truy chính, ngược không trả gì về

SELECT column_name1, column_name2,...
FROM table_name
WHERE EXISTS (SELECT column_name FROM condition)

Lưu ý:
- Truy vấn lồng KHÔNG NÊN SELECT *
- Điều kiện trong truy vấn lồng nên có so sánh 2 cột có giá trùng khớp



Ví dụ 1:

SELECT SupplierName
FROM Suppliers
WHERE EXISTS (
SELECT ProductName
FROM Products
WHERE Products.SupplierID = Suppliers.supplierID
AND Price < 20);



    Ví dụ 2:

    SELECT SupplierName
    FROM Suppliers
    WHERE EXISTS (
    SELECT ProductName
    FROM Products
    WHERE Products.SupplierID=Suppliers.supplierID
    AND Price=22);