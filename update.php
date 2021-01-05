<?php
    require_once 'config.php';
    $IdDish = $_GET['id'];
    $dish = mysqli_query($link, "SELECT * FROM `dishes` WHERE `IdDish` = '$IdDish'");
    $dish = mysqli_fetch_assoc($dish);
    //print_r($dish);
?>
<!DOCTYPE html>
<html lang = "ru">
    <head>
        <meta charset="UTF-8">
        <title>Изменить</title>
        <link rel = "stylesheet" href = "css/style.css">
    </head>
    <body>
    <div style = "width: 30%;margin-left:35%">
        <form class = "form" action = "php/update_script.php" method = "post">
            <h4 style = "text-align: center; margin : 0">Изменить</h4>
            <input type ="hidden" name = "IdDish" value = "<?= $dish['IdDish']?>">
            <p>Название : <input type ="text" name = "Name" value = "<?= $dish['Name'] ?>"></p>
            <p>Вес : <input type ="text" name = "Weight" value = "<?= $dish['Weight'] ?>"></p>
            <p>Цена: <input type ="text" name = "Price" value = "<?= $dish['Price'] ?>"></p>
            <p>Время готовки: <input type ="text" name = "CookingTime" value = "<?= $dish['CookingTime'] ?>"></p>
            <p>Тип блюда:<select name = "Type" style = "float : right">
                <option>Первое</option>
                <option>Салат</option>
                <option>Второе</option>
                <option>Десерт</option>
            </select></p>
            <button type = "submit" style = "margin-left: 40%">Применить</button>
        </form>
    </div>
    </body>
</html>