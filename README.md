# СУБД Ресторан

## Описание

Данная СУБД состоит из 
- **Главного меню(index.php)** , в которой можно добавлять , изменять , удалять записи о блюдах

![pict1](https://user-images.githubusercontent.com/63901466/105282918-33c87600-5bd1-11eb-81eb-ef08a5bf6461.png "Главная")

- **Страница запросов(query.php)** ,в которых уже прописаны определенные MySQL запросы

![pict2](https://user-images.githubusercontent.com/63901466/105282922-34610c80-5bd1-11eb-8274-e6aeb0493e2c.png "Страница с запросами")

**Запросы** 
1. Вывести самое дорогое блюдо
2. Вывести блюда типа
    - Первое
    - Второе
    - Салат
    - Десерт
3. Вывести блюда , цена которых меньше (поле ввода)
4. Вывести блюда , где используется подстрока (поле ввода)
5. Вывести ингредиенты блюда 
    - Список блюд через выпадающий список
6. Вывести заказ по ID (поле ввода)
7. Вывести самое популярное блюдо

## Примечания 

Лично я использовал локальный сервер OpenServer поэтому , если вы используете другой сервер , может возникнуть ошибки.
1. Не удается подключиться к базе данных.
    - Для решения этой проблемы нужно в config.php указать свои данные для подключения к БД.  

## Установка

1. Создайте в phpMyAdmin или другим способом базу данных с названием , которое используется SQL файле : название.sql
2. Теперь нужно импортировать нашу базу данных в созданную . Для этого нажимаем на нашу созданную БД ,чтобы она была выделенна , после на кнопку "импорт"

![Импортирование БД](https://user-images.githubusercontent.com/63901466/105282923-34f9a300-5bd1-11eb-8754-898075fe2c18.png "Импортирование БД")

3. Находим кнопку "выбрать файл" кликаем и выбираем sql файл

![Выбор файла](https://user-images.githubusercontent.com/63901466/105282917-332fdf80-5bd1-11eb-9df2-466ebae053bb.png "Выбор файла")

4. Если прошлый шаг прошёл удачно , то вы загрузили БД на свой сервер . Теперь осталось перенести веб-приложение на ваш локальный сервер.Для этого в папке с вашими проектами
создайте новую папку . В ней создайте папку "www".
5. Теперь переходим в папку "www" и через консколь создаем копию проекта