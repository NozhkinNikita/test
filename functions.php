<?php
set_time_limit(60);
function dbConnect()
{
    $link = mysqli_connect("localhost", "root", "", "test");
    mysqli_query($link, "SET NAMES 'cp1251'");
    /* check connection */
    if (mysqli_connect_errno()) {
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
    }
    return $link;
}


//пункт 5
function addMillionRecord()
{
    
    $link = dbConnect();
    $r    = mysqli_query($link, 'SET GLOBAL max_allowed_packet=16777216000');
    
    
    
    $sex = 'мужчина';
    for ($i = 1; $i <= 1000000; $i++) {
        
        if ($i >= 100) {
            $name = generateName();
            $sex  = 'женщина';
        } else {
            $name = generateName();
            $name = 'ф' . $name;
            
        }
        $str .= "('$name','$sex',NOW()),";
        
    }
    
    $str .= "('$name','мужчина',NOW())";
    //var_dump($str);
    $result = mysqli_query($link, "INSERT INTO people (name,sex,date) VALUES $str");
    
}
//пункт 6
function selectMan()
{
    $link   = dbConnect();
$start = microtime(true);

    $result = mysqli_query($link, "SELECT * FROM `people` WHERE sex ='мужчина' and name like 'ф%' ");
    $time = microtime(true) - $start;
printf('Запрос выполнялся %.4F сек.', $time);
    showTable($result);
    
    
}
//Пункт 4
function uniqueRecords()
{
    $link   = dbConnect();
    $result = mysqli_query($link, "SELECT * FROM `people`  group by name,date ORDER by 'name'  ");
    showTable($result);
}
function generateName($length = 8)
{
    $chars    = 'йцукенгшщзхъывапролджэячсмитьбю';
    $numChars = strlen($chars);
    $string   = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}
function showTable($result)
{
    
    print('<table border=5><tr> <td>номер</td><td>имя</td><td>дата рождения</td><td>пол</td><td>возраст</td></tr>');
    
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        
        print('<tr><td>' . ++$i . '</td><td>' . $row['name'] . '</td><td>' . $row['date'] . '</td><td> ' . $row['sex'] . '</td><td>' . getAge($row['date']) . '</td></tr>');
        
        
    }
    print('</table>');
}
function getAge($date)
{
    $datetime = new DateTime($date);
    $interval = $datetime->diff(new DateTime(date("Y-m-d")));
    return $interval->format("%Y");
}
//addMillionRecord();
//selectMan();
//uniqueRecords();
?>
