<head>
    <meta charset="UTF-8">
    <link rel = "stylesheet" href = "../css/style.css">
</head>
<body>
    <form method = 'post'style = 'width : 50%;margin-left:25%;margin-top: 10px; '>
        <h3 style = 'margin-left: 43.5%; margin-top: 0; margin-botton: 0;'>Запросы</h3>
        <table style = "background-color:ghostwhite;"> 
            <tr>
                <td><input type = "radio" name = 'rad' value = '1'></td>
                <td>1. Вывести самое дорогое блюдо</td>
                <input type = 'hidden' name = 'query1' value = 'SELECT * FROM `dishes` WHERE `Price` = (SELECT MAX(Price) FROM `dishes`)'>
                <input type = 'hidden' name = 'type_query1' value = '1'>
            </tr>
            <tr>
                <td><input type = "radio" name = 'rad' value = '2'></td>
                <td>2. Вывести блюда типа</td>
                <td><select name = "value2">
                    <option>Первое</option>
                    <option>Салат</option>
                    <option>Второе</option>
                    <option>Десерт</option>
                </select></td>
                <input type = 'hidden' name = 'query2' value = 'SELECT * FROM `dishes` WHERE `Type` = '>
                <input type = 'hidden' name = 'type_query2' value = '2'>
            </tr>
            <tr>
                <td><input type = "radio" name = 'rad' value = '3'></td>
                <td>3. Вывести блюда в диапазоне</td>
                <td><input type = text name = 'value3' value = ''></td>
                <input type = 'hidden' name = 'query3' value = 'SELECT * FROM `dishes` WHERE `Price` <= '>
                <input type = 'hidden' name = 'type_query3' value = '2'>
            </tr>
            <tr>
            <tr>
                <td><input type = "radio" name = 'rad' value = '4'></td>
                <td>4.Вывести блюда , где используется строка</td>
                <td><input type = text name = 'value4' value = ''></td>
                <input type = 'hidden' name = 'query4' value = 'SELECT * FROM `dishes` WHERE `Name` LIKE '>
                <input type = 'hidden' name = 'type_query4' value = '4'>
            </tr>
            <tr>
                <td><input type = "radio" name = 'rad' value = '5'></td>
                <td>5.Вывести ингредиенты по Id</td>
                <td><input type = text name = 'value5' value = ''></td>
                <input type = 'hidden' name = 'query5' value = 'SELECT dishes.Name, ingredients.Name FROM dishes,ingredient_dish, ingredients where '>
                <input type = 'hidden' name = 'type_query5' value = '5'>
            </tr>
                
            </tr>
        </table>
        <input type = "submit" name = 'do' value = "Выполнить">
        <a style = "float :right" href = "../index.php">Назад</a>
    </form>
    <table style = " td : width : 20%"> 
    <tr>
        <th>Id</th>
        <th>Название</th>
        <th>Вес</th>
        <th>Цена</th>
        <th>Время готовки</th>
        <th>Тип блюда</th>
    </tr>  
    <?php
        require_once('../config.php');
        var_dump($_POST);
        echo "</br>";
        if ($_POST['rad'] && ($_POST['do'])){
            
            if($_POST['type_query'.$_POST['rad']] > 0) $query = $_POST['query'.$_POST['rad']];
            if($_POST['type_query'.$_POST['rad']] == 2) $query = $query."'".$_POST['value'.$_POST['rad']]."'";
            if($_POST['type_query'.$_POST['rad']] == 4) $query = $query."'".$_POST['value'.$_POST['rad']]."%'";
            if($_POST['type_query'.$_POST['rad']] == 5) $query = $query."( dishes.IdDish = ".$_POST['value'.$_POST['rad']].")&&(dishes.IdDish = ingredient_dish.IdDish) && (ingredient_dish.IdIngredient = ingredients.IdIngredient)";

            echo "</br>";
            var_dump($query);


            $dish = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link));
            $dish = mysqli_fetch_all($dish);

            foreach ($dish as $dish) {
            ?>
            
                <tr>
                <?php
                    for ($i = 0; $i < count($dish);$i++)
                    {
                        echo "<td>".$dish[$i]."</td>"; 
                    }
                ?>
                </tr>
            
            <?php
            } 
        }
    ?>
    </table>
</body>