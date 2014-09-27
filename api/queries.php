<?php

$getDepartments = "SELECT DISTINCT dept FROM sections";
$getClasses = "SELECT DISTINCT num, title FROM sections WHERE dept=:dept GROUP BY num";
$getSections = "SELECT section, days, times, location, instructor FROM sections WHERE dept=:dept AND num=:num GROUP BY section";
$getCRN = "SELECT crn FROM sections WHERE dept=:dept AND num=:num AND section=:section";

// then after that you can get a whole bunch of data from the crn, for example:
// nice nice
$getTitle = "SELECT title FROM sections WHERE crn='<crn>'";



?>
