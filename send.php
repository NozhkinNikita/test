<?php
include('functions.php');
$link=dbConnect();
$name=$_POST['name'];
$date=$_POST['date'];
$sex=$_POST['sex'];

mysqli_query($link,"INSERT INTO people (name,sex,date) VALUES ('$name','$sex','$date')");
header('Location: index.php');
?>