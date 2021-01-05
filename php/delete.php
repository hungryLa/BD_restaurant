<?php
header( 'Location: ../index.php');
require_once '../config.php';

$IdDish = $_GET['id'];

mysqli_query($link,"DELETE FROM `dishes` WHERE `dishes`.`IdDish` = '$IdDish'");