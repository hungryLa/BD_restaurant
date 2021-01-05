<?php
header( 'Location: ../index.php');
require_once '../config.php';

$IdDish = $_POST['IdDish'];
$Name = $_POST['Name'];
$Weight = $_POST['Weight'];
$Price = $_POST['Price'];
$CookingTime = $_POST['CookingTime'];
$Type = $_POST['Type'];

mysqli_query($link,"UPDATE `dishes` SET `Name` = '$Name', `Weight` = '$Weight', `Price` = '$Price',`CookingTime` = '$CookingTime',`Type` = '$Type' WHERE `dishes`.`IdDish` = '$IdDish'");