<?php
$host='localhost';
$user='root';
$pass='';
$dbname='attendance';
$port=3306;

$conn= new mysqli($host,$user,$pass,$dbname,$port);

if($conn->connect_error)
{
    die('Not connected');
}