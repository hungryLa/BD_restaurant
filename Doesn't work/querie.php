<!DOCTYPE html>
<html lang = "ru">
    <head>
        <meta charset="UTF-8">
        <title>Запросы</title>
        <link rel = "stylesheet" href = "css/style.css">
    </head>
    <body>
    <div style = "width: 50%;margin-left:25%; background-color : red;height:200px;">
        <form method = "post" action = .$_SERVER['PHP_SELF'].>
        <h3 style = "text-align : center">Запросы</h3>
        <table>
            <tr>
                <td class = "rad"><input type=radio name='rad' value='1'></td>
                <td width=80%>1. Вывести самое дорогое блюдо</td>
                <input type=hidden name='query1'  value='SELECT * FROM `dishes` WHERE `Price` = (SELECT MAX(Price) FROM `dishes`)'>
            </tr>
            <tr>
                <td class = "rad"><input type=radio name='rad' value='2'></td>
                <td width=70%>2. Показать блюда типа</td>
                <td><select name = "par2" style = "float : right;">
                    <option>Первое</option>
                    <option>Салат</option>
                    <option>Второе</option>
                    <option>Десерт</option>
                </select></td>
                <input type=hidden name='query2'  value='SELECT * FROM `dishes` WHERE `Type` = '>
            </tr>
        </table>
            <input type = 'submit' name = 'do' value = 'Выполнить'>
        </form>
    </div>
    <table>
        <tr>
            <th>Id</th>
            <th>Название</th>
            <th>Вес</th>
            <th>Цена</th>
            <th>Время готовки</th>
            <th>Тип блюда</th>
        </tr>
    <?php
    var_dump($query);
    $dish = mysqli_query($link,$query) or die("Ошибка " . mysqli_error($link));
    $dish = mysqli_fetch_all($dish);
        foreach ($dish as $dish) {
            ?>
            <tr>
                <td><?= $dish[0] ?></td>
                <td><?= $dish[1] ?></td>
                <td><?= $dish[2] ?> грамм</td>
                <td><?= $dish[3] ?> рублей</td>
                <td><?= $dish[4] ?> минут</td>
                <td><?= $dish[5] ?></td>
            </tr>
            <?php
        } 
    ?>
    </table>
    </body>
</html>