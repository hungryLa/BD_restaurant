<?php
$host = 'localhost'; // адрес сервера 
$database = 'myprogect'; // имя базы данных
$user = 'root'; // имя пользователя
$password = 'root'; // пароль

$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка : " . mysqli_error($link));

?>