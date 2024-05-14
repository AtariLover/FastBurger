<?php
$hn = 'localhost';
$un = 'fastburgers_admin';
$pw = 'fmiKvpKw@qtIVAx0';
$db = 'fastburgers';

$conn = mysqli_connect($hn, $un, $pw, $db);
if (!$conn){
    die('Connection Failed: ' . mysqli_connect_error());
}
// else {
//     echo('Connection is successful');
// }