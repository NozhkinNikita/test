<?php
include('functions.php');
$link=dbConnect();
mysqli_query($link,'TRUNCATE TABLE people');
header('Location: index.php');
?>