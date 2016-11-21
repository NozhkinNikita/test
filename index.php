<html>
    <head></head>
    <body>
        <h2>
        ƒобавить запись в таблицу
        <h2>
        <form method="post" action="send.php">
            <p><b>им€:</b><br>
                <input name="name" type="text" size="40">
            <p><b>пол</b><br>
                <input name="sex" type="text" size="40">
            <p><b>дата</b><br>
                <input name="date" type="date" size="40">
                <br><br>
                <input type="submit" value="добавить"></input>
        </form>
        <form action="erase.php">
            <input type="submit" value='очистить таблицу'></input>
        </form>
        <form action="million.php">
            <input type="submit" value='добавить миллион записей'></input>
        </form>
        <h2>
        вывод таблицы
        <h2>
        <?php
            include('functions.php');
            dbConnect();
            print('<h2> ¬ывод мужчин с именем на ф(пункт 6)</h2>');
            selectMan();
            print('<hr><br>');
            
            print('<h2> ¬ывод уникальных значений(пункт 4)</h2>');
            uniqueRecords();
            ?>
    </body>
</html>