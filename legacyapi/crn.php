<?php

require('db.php');
require('queries.php');

$crn = $_GET["crn"];

$STH = $DBH->prepare($getSpecificCRN);
$STH->execute(array(':crn' => $crn));

$results=$STH->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
header("Access-Control-Allow-Origin: *");
echo $json;

//echo "hello";
?>
