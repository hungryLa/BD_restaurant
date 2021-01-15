<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache, no-store, must-revalidate"/>
    <meta http-equiv="Pragma" content="no-cache"/>
    <meta http-equiv="Expires" content="0"/>
    <title>Главная</title>
    <link rel = "stylesheet" href = "css/style.css">
</head>
<body style = "margin: 0 0 0 0; ">
    <div style = "height: 40%;width: 30%;margin-left:35%">
        <h1 id = 'mainTitle'>"Ресторан"</h1>
        </br>
    
        <form class = "form" action = "php/create.php" method = "post">
            <h4 style = "text-align: center; margin : 0">Добавить</h4>
            <p>Название : <input type ="text" name = "Name"></p>
            <p>Вес (грамм) : <input type ="text" name = "Weight"></p>
            <p>Цена (рублей) : <input type ="text" name = "Price"></p>
            <p>Время готовки (минут) : <input type ="text" name = "CookingTime"></p>
            <p>Тип блюда:<select name = "Type" style = "float : right">
                <option>Первое</option>
                <option>Салат</option>
                <option>Второе</option>
                <option>Десерт</option>
            </select></p>
            <button type = "submit" style = "float : left">Добавить</button>
            <a href = "php/query.php" style = "float : right ">Запросы</a>
        </form>
    </br>       
    </div>
    
    <div style = "height: 60%;">
    <h2 style ="text-align : center"> Блюда </h2>
        <table>
            <tr>
                <th></th>
                <th>Название</th>
                <th>Вес(грамм)</th>
                <th>Цена(рублей)</th>
                <th>Время готовки(минут)</th>
                <th>Тип блюда</th>
                <th style ="width = 5%;"></th>
            </tr>
        <?php
        require_once('config.php'); 
        $query = "SELECT * FROM `dishes` ORDER BY dishes.Type, dishes.Name";
        $dish = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link));
        $dish = mysqli_fetch_all($dish);
            foreach ($dish as $dish) {
                ?>
                <tr>
                    <td><a style ="color : rgba(0, 87, 158, 0.945)" href = "update.php?id=<?=$dish[0]?>">Изменить</a></td>
                    <td><?= $dish[1] ?></td>
                    <td><?= $dish[2] ?> грамм</td>
                    <td><?= $dish[3] ?> рублей</td>
                    <td><?= $dish[4] ?> минут</td>
                    <td><?= $dish[5] ?></td>
                    <td><a style ="color : rgb(255, 0, 0)" href = "php/delete.php?id=<?=$dish[0]?>">Удалить</a></td>
                </tr>
                <?php
            } 
        ?>
        </table>
    </div>
    
    
    
</body>
</html>