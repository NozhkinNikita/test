<?php
include('functions.php');
$link=dbConnect();
addMillionRecord();
header('Location: index.php');
?>