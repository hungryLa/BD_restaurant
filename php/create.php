<?php
    
    require_once '../config.php';
    header( 'Location: ../index.php');

    $Name = $_POST['Name'];
    $Weight = $_POST['Weight'];
    $Price = $_POST['Price'];
    $CookingTime = $_POST['CookingTime'];
    $Type = $_POST['Type'];


    $link->query("INSERT INTO `dishes` (`IdDish`,`Name`, `Weight`, `Price`, `CookingTime`,`Type`)
        VALUES (NULL,'$Name', '$Weight', '$Price', '$CookingTime', '$Type')");

    