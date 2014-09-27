<?php

require('db.php');
require('queries.php');

$dept = $_GET["dept"];

$STH = $DBH->prepare($courses);

$STH->execute(array(':dept' => $dept));

$results=$STH->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
echo $json;

//echo "hello";
?>
