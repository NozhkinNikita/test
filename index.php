<html>
    <head></head>
    <body>
        <h2>
        �������� ������ � �������
        <h2>
        <form method="post" action="send.php">
            <p><b>���:</b><br>
                <input name="name" type="text" size="40">
            <p><b>���</b><br>
                <input name="sex" type="text" size="40">
            <p><b>����</b><br>
                <input name="date" type="date" size="40">
                <br><br>
                <input type="submit" value="��������"></input>
        </form>
        <form action="erase.php">
            <input type="submit" value='�������� �������'></input>
        </form>
        <form action="million.php">
            <input type="submit" value='�������� ������� �������'></input>
        </form>
        <h2>
        ����� �������
        <h2>
        <?php
            include('functions.php');
            dbConnect();
            print('<h2> ����� ������ � ������ �� �(����� 6)</h2>');
            selectMan();
            print('<hr><br>');
            
            print('<h2> ����� ���������� ��������(����� 4)</h2>');
            uniqueRecords();
            ?>
    </body>
</html>