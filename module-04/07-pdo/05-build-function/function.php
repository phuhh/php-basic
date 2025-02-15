<?php

require_once './connect.php';
// Thực thi câu lệnh SQL
function query($sql = '',  $data = [], $isRead = false)
{
    global $conn;
    $query = false;

    try {
        if (!empty($sql)) {
            $stmt = $conn->prepare($sql);

            if (empty($data)) {
                $query = $stmt->execute();
            } else {
                $query = $stmt->execute($data);
            }
        }
    } catch (Exception $e) {
        echo 'Error on <b> line ' . $e->getLine() . '</b> in ' . $e->getFile()  . ': <b>' . $e->getMessage() . '</b><br />';
        die();
    }

    if ($query && $isRead) {
        return $stmt;
    }

    return $query;
}
// Thêm dữ liệu - bằng cách truyền tham số table, data
function create($table = '', $data = [])
{
    if (!empty($table) && !empty($data)) {
        $keyArr = array_keys($data);
        $columnName = implode(', ', $keyArr);
        $valueName = ':' . implode(', :', $keyArr);

        $sql = "INSERT INTO {$table}($columnName) VALUES($valueName);";
        return query($sql, $data);
    }
    return false;
}
// Cập nhật dữ liệu - bằng cách truyền tham số table, data hoặc condition
function update($table = '', $data = [], $condition = '')
{
    if (!empty($table) && !empty($data)) {
        $keyArr = array_keys($data);
        $countArr = count($keyArr);
        $keyValue = '';
        for ($i = 0; $i < $countArr; $i++) {
            $keyValue .= $keyArr[$i] . ' = :' . $keyArr[$i] . ', ';
        }
        $keyValue = rtrim($keyValue, ', ');

        if (empty($condition)) {
            $sql = "UPDATE $table SET $keyValue;";
        } else {
            $sql = "UPDATE $table SET $keyValue WHERE $condition;";
        }
        return query($sql, $data);
    }

    return false;
}
// Xoá dữ liệu - bằng cách truyền tham số table hoặc condition
function delete($table = '', $condition = '')
{
    if (!empty($table)) {
        if (empty($condition)) {
            $sql = "DELETE FROM {$table}";
        } else {
            $sql = "DELETE FROM {$table} WHERE {$condition}";
        }
        return query($sql);
    }
    return false;
}
// Lấy dữ liệu query thô
function getRaw($sql = '')
{
    if (!empty($sql)) {
        $stmt = query($sql, [], true);
        if (is_object($stmt)) {
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
    return false;
}
// Lấy 1 dữ liệu query thô
function getFirstRaw($sql = '')
{
    if (!empty($sql)) {
        $stmt = query($sql, [], true);
        if (is_object($stmt)) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
    return false;
}
// Lấy dữ liệu - bằng cách truyền tham số table, column và condition
function get($table, $column = '*', $condition = '')
{
    if (!empty($table)) {
        $sql = "SELECT {$column} FROM {$table}";
        if (!empty($condition)) {
            $sql .= " WHERE {$condition}";
        }
        return getRaw($sql);
    }
    return false;
}
// Lấy 1 dữ liệu - bằng cách truyền tham số table, column và condition
function first($table, $column = '*', $condition = '')
{
    if (!empty($table)) {
        $sql = "SELECT {$column} FROM {$table}";
        if (!empty($condition)) {
            $sql .= " WHERE {$condition}";
        }
        return getFirstRaw($sql);
    }
    return false;
}
