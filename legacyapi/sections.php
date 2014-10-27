<?php

require('db.php');
require('queries.php');

$dept = $_GET["dept"];
$course = $_GET["courseNum"];

$STH = $DBH->prepare($getSections);
$STH->execute(array(':dept' => $dept, ':num' => $course));

$results=$STH->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
header("Access-Control-Allow-Origin: *");
echo $json;

//echo "hello";
?>
