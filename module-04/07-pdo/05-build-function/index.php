<?php

require_once './function.php';


$dataInsert = [
    'username' => 'test02',
    'email' => 'test02@gmail.com',
    'password' => '123456',
    'createdAt' => date('Y-m-d H:i:s')
];

// $result = create('BlogUsers', $dataInsert);

// if ($result) {
//     echo 'Inserted Successfully';
// }


// $dataUpdate = [
//     'username' => 'test03',
//     'email' => 'test03@gmail.com',
// ];

// $result = update('BlogUsers', $dataUpdate, 'UserID = 5');
// if ($result) {
//     echo 'Updated Successfully';
// }

$dataUpdate = [
    'createdAt' => date('Y-m-d H:i:s')
];

// $result = update('BlogUsers', $dataUpdate);
// if ($result) {
//     echo 'Updated Successfully';
// }

// $result = delete('BlogUsers', 'UserID = 4');
// if ($result) {
//     echo 'Deleted Successfully';
// }


$data = getRaw('SELECT * FROM BlogUsers;');
// echo "<pre>";
// print_r($data);
// echo "</pre>";

$data = getFirstRaw('SELECT * FROM BlogUsers;');
// echo "<pre>";
// print_r($data);
// echo "</pre>";

$data = get('BlogUsers', 'Username, Email', 'UserID IN("2", "5")');
// echo "<pre>";
// print_r($data);
// echo "</pre>";

$data = first('BlogUsers', 'Username, Email');
echo "<pre>";
print_r($data);
echo "</pre>";
