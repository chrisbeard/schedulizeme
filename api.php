<?php

require('creds.php');
try {
	$DBH = new PDO("mysql:host=localhost;dbname=schedulizeme", $db_user, $db_pass);
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e) {
	echo $e->getMessage(); 
}

$STH = $DBH->query("");

$STH->setFetchMode(PDO::FETCH_ASSOC);

while($story = $STH->fetch()) {
	echo $story['secion'];
}


?>
