-- Lấy ra tên ràng buộc được định nghĩa trong bảng

SELECT *
FROM information_schema.table_constraints
WHERE constraint_schema = 'database_name';