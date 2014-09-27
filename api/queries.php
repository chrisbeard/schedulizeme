<?php

$getDepartments = "SELECT DISTINCT dept FROM sections";
$getClasses = "SELECT DISTINCT num, title FROM sections WHERE dept=:dept GROUP BY num";
$getSections = "SELECT section, days, beginTime, endTime, location, instructor, crn FROM sections WHERE dept=:dept AND num=:num GROUP BY section";
$getCRN = "SELECT crn FROM sections WHERE dept=:dept AND num=:num AND section=:section";

// then after that you can get a whole bunch of data from the crn, for example:
// nice nice
$getTitle = "SELECT title FROM sections WHERE crn='<crn>'";

// this returns the number of 0 credit classes in that department and course number (ie., labs)
// "SELECT COUNT(*) FROM sections WHERE dept='<dept name>' AND num=<class num> AND credits = 0"
//
// // so maybe write something up that says if(^that number == 0), then there are no labs, so no additional drop down lists
// // should show up
// // else, drop down-list with this:
// "SELECT * FROM sections WHERE dept='<dept name>' AND num=<class num> AND credits != 0"

?>
