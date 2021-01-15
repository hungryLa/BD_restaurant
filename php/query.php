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
                <input type = 'hidden' name = 'query1'
                    value = 'SELECT * FROM `dishes` WHERE `Price` = (SELECT MAX(Price) FROM `dishes`)'>
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
                <td>3. Вывести блюда ,которые стоят дешевле</td>
                <td><input type = text name = 'value3' value = ''></td>
                <input type = 'hidden' name = 'query3' value = 'SELECT * FROM `dishes` WHERE `Price` <= '>
                <input type = 'hidden' name = 'type_query3' value = '6'>
            </tr>
            <tr>
            <tr>
                <td><input type = "radio" name = 'rad' value = '4'></td>
                <td>4. Вывести блюда , где используется строка</td>
                <td><input type = text name = 'value4' value = ''></td>
                <input type = 'hidden' name = 'query4' value = 'SELECT * FROM `dishes` WHERE `Name` LIKE '>
                <input type = 'hidden' name = 'type_query4' value = '3'>
            </tr>
            <tr>
                <td><input type = "radio" name = 'rad' value = '5'></td>
                <td>5. Вывести ингредиенты блюда</td>
                <td><select name = 'value5'>
                    <?php
                        require_once('../config.php');
                        $query = "SELECT Name FROM dishes";
                        $dish = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link));
                        $dish = mysqli_fetch_all($dish);
                        foreach ($dish as $dish) {
                            echo "<option>".$dish[0]."</option>";
                        } 
                    ?>
                </select></td>
                <input type = 'hidden' name = 'query5' value =
                    'SELECT ingredients.Name FROM dishes,ingredient_dish, ingredients where '>
                <input type = 'hidden' name = 'type_query5' value = '4'>
            </tr>
            <tr>
                <td><input type = "radio" name = 'rad' value = '6'></td>
                <td>6. Вывести заказ по Id</td>
                <td><input type = text name = 'value6' value = ''></td>
                <input type = 'hidden' name = 'query6' value =
                    'SELECT dishes.Name FROM dishes,dish_ordering, ordering where '>
                <input type = 'hidden' name = 'type_query6' value = '5'>
            </tr>
            <tr>
                <td><input type = "radio" name = 'rad' value = '7'></td>
                <td>7. Вывести самое популярное блюдо</td>
                <input type = 'hidden' name = 'query7' value =
                    'SELECT dishes.Name,SUM(dish_ordering.Count) AS count
                    FROM dishes,dish_ordering
                    where dishes.IdDish = dish_ordering.IdDish
                    GROUP BY dishes.IdDish
                    ORDER BY count DESC LIMIT 1'>
                <input type = 'hidden' name = 'type_query7' value = '7'>
            </tr>
                
            </tr>
        </table>
        <input type = "submit" name = 'do' value = "Выполнить">
        <a style = "float :right" href = "../index.php">Назад</a>
    </form>
    <table style = " td : width : 20%"> 

    <?php

        if ($_POST['rad'] && ($_POST['do'])){
            $query = $_POST['query'.$_POST['rad']];

            if($_POST['type_query'.$_POST['rad']] < 4){
                rows1();
            }
            if($_POST['type_query'.$_POST['rad']] == 2){
                $query .= "'".$_POST['value'.$_POST['rad']]."'";
            }
            if($_POST['type_query'.$_POST['rad']] == 3){
                $query .= "'%".$_POST['value'.$_POST['rad']]."%'";
            } 
            if($_POST['type_query'.$_POST['rad']] == 4){
                rows2();
                $query .= "( dishes.Name = '".$_POST['value'.$_POST['rad']]."')&&
                    (dishes.IdDish = ingredient_dish.IdDish) &&
                    (ingredient_dish.IdIngredient = ingredients.IdIngredient)";
            }
            if($_POST['type_query'.$_POST['rad']] == 5){
                rows3();
                $query .= "(dishes.IdDish = dish_ordering.IdDish) &&
                (ordering.IdOrder = dish_ordering.IdOrder) &&
                (ordering.IdOrder = '".$_POST['value'.$_POST['rad']]."')";
            }
            if($_POST['type_query'.$_POST['rad']] == 6){
                rows1();
                $query .= "'".$_POST['value'.$_POST['rad']]."' ORDER BY Price DESC";
            }
            if($_POST['type_query'.$_POST['rad']] == 7){
                echo "<tr><th>Название блюда</th><th>Заказано(штук)</th></tr>";
            }


            //echo "</br>";
            var_dump($query);


            $dish = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link));
            $dish = mysqli_fetch_all($dish);

            foreach ($dish as $dish) {
                echo "<tr>";
                for ($i = 0; $i < count($dish);$i++)
                {
                    echo "<td>".$dish[$i]."</td>"; 
                }
                echo "</tr>";
            } 
        }
    ?>
    </table>
</body>

<?php
    function rows1(){
        echo "
        <pre>
        <tr>
            <th>Id</th>
            <th>Название</th>
            <th>Вес(Грамм)</th>
            <th>Цена(Руб.)</th>
            <th>Время готовки(мин.)</th>
            <th>Тип блюда</th>
        </tr>
        </pre>";
        
    }
    function rows2(){
        echo "
        <pre>
        <tr>
            <th>Ингредиенты</th>
        </tr>
        </pre>";    
    }
    function rows3(){
        echo "
        <pre>
        <tr>
            <th>Заказ №".$_POST['value'.$_POST['rad']]."</th>
        </tr>
        </pre>";
    }
?>