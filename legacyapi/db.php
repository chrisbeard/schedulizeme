<?php

require('creds.php');

try {
	$DBH = new PDO("mysql:host=localhost;dbname=schedulizeme", $user, $pass);
	$DBH->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
}
catch(PDOException $e) {
	echo $e->getMessage(); 
}

?>
