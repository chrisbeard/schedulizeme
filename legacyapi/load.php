<?php

require('db.php');
require('queries.php');

$identifier = $_GET["identifier"];

$STH = $DBH->prepare($load);
$STH->execute(array(':identifier' => $identifier));

$results=$STH->fetch(PDO::FETCH_ASSOC);

$results=$results["crnJSON"];

header("Access-Control-Allow-Origin: *");
print_r($results);
?>
