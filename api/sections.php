<?php

require('db.php');
require('queries.php');

$dept = $_GET["dept"];
$course = $_GET["courseNum"];

$STH = $DBH->prepare($getSections);
$test = "\':dept\' => \$dept";
$STH->execute(array(':dept' => $dept, ':num' => $course));

$results=$STH->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
echo $json;

//echo "hello";
?>
