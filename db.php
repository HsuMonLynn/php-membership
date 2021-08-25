<?php
$url = 'localhost';
$username = 'root';
$password = 'root';
$db_name ="register";
$db = mysqli_connect($url,$username,$password,$db_name);

if(!$db){
    echo "connection not successful!";
}