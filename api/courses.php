<?php

require('db.php');
require('queries.php');
//$_GET["section"]

$STH = $DBH->query($departments);
//$STH->setFetchMode(PDO::FETCH_ASSOC);

/*
while($story = $STH->fetch()) {
	echo $story['secion'];
}
 */

$results=$STH->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
echo $json;
//echo "hello";
?>
