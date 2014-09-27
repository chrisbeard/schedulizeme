<?php

require('db.php');
//$_GET["section"]

$STH = $DBH->query("select distinct dept from sections");
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
