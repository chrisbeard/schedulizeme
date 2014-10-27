<?php

require('db.php');
require('queries.php');

$dept = $_GET["dept"];

$STH = $DBH->prepare($getClasses);

$STH->execute(array(':dept' => $dept));

$results=$STH->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
header("Access-Control-Allow-Origin: *");
echo $json;

//echo "hello";
?>
