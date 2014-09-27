<?php

require('db.php');
require('queries.php');

$email = "b7a2fcuym@myeventbot-hrd.appspotmail.com";

$crn = $_GET["crn"];

$STH = $DBH->prepare($emailData);
$STH->execute(array(':crn' => $crn));
$results=$STH->fetchAll(PDO::FETCH_ASSOC);

//header("Access-Control-Allow-Origin: *");
$title = $results[0]["title"];
$days = $results[0]["days"];
$times = $results[0]["beginTime"] . "-" . $results[0]["endTime"];
$location = $results[0]["location"];

print_r($results);

echo $title;
echo $days;
echo $times;
echo $location;

$mainSubject = $title . " " . $times . " at " . $location;

if (strpos($days,'M') !== false) {
	mail($email, $mainSubject . " Monday", "body");
}
if (strpos($days,'T') !== false) {
	mail($email, $mainSubject . " Tuesday", "body");
}
if (strpos($days,'W') !== false) {
	mail($email, $mainSubject . " Wednesday", "body");
}
if (strpos($days,'R') !== false) {
	mail($email, $mainSubject . " Thursday", "body");
}
if (strpos($days,'F') !== false) {
	mail($email, $mainSubject . " Friday", "body");
}


?>


