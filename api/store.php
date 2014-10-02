<?php

require('db.php');
require('queries.php');

$crnJSON= $_GET["crnJSON"];
$identifier = $_GET["identifier"];

$STH = $DBH->prepare($store);
$STH->execute(array(':identifier' => $identifier, ':crnJSON' => $crnJSON));

echo "successful store";
?>
