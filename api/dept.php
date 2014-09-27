<?php

require('db.php');
require('queries.php');

$STH = $DBH->query($getDepartments);
//$STH->setFetchMode(PDO::FETCH_ASSOC);

/*
while($story = $STH->fetch()) {
	echo $story['secion'];
}
 */

$results=$STH->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
header("Access-Control-Allow-Origin: *");
echo $json;
//echo "hello";
?>

