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


//����� 5
function addMillionRecord()
{
    
    $link = dbConnect();
    $r    = mysqli_query($link, 'SET GLOBAL max_allowed_packet=16777216000');
    
    
    
    $sex = '�������';
    for ($i = 1; $i <= 1000000; $i++) {
        
        if ($i >= 100) {
            $name = generateName();
            $sex  = '�������';
        } else {
            $name = generateName();
            $name = '�' . $name;
            
        }
        $str .= "('$name','$sex',NOW()),";
        
    }
    
    $str .= "('$name','�������',NOW())";
    //var_dump($str);
    $result = mysqli_query($link, "INSERT INTO people (name,sex,date) VALUES $str");
    
}
//����� 6
function selectMan()
{
    $link   = dbConnect();
$start = microtime(true);

    $result = mysqli_query($link, "SELECT * FROM `people` WHERE sex ='�������' and name like '�%' ");
    $time = microtime(true) - $start;
printf('������ ���������� %.4F ���.', $time);
    showTable($result);
    
    
}
//����� 4
function uniqueRecords()
{
    $link   = dbConnect();
    $result = mysqli_query($link, "SELECT * FROM `people`  group by name,date ORDER by 'name'  ");
    showTable($result);
}
function generateName($length = 8)
{
    $chars    = '�������������������������������';
    $numChars = strlen($chars);
    $string   = '';
    for ($i = 0; $i < $length; $i++) {
        $string .= substr($chars, rand(1, $numChars) - 1, 1);
    }
    return $string;
}
function showTable($result)
{
    
    print('<table border=5><tr> <td>�����</td><td>���</td><td>���� ��������</td><td>���</td><td>�������</td></tr>');
    
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
