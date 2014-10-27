<?php

$getDepartments = "SELECT DISTINCT dept FROM spring";
$getClasses = "SELECT DISTINCT num, title FROM spring WHERE dept=:dept GROUP BY num";
$getSections = "SELECT section, days, beginTime, endTime, beginTimeNum, endTimeNum, location, instructor, credits, crn FROM spring WHERE dept=:dept AND num=:num GROUP BY section";
$getCRN = "SELECT crn FROM spring WHERE dept=:dept AND num=:num AND section=:section";

$getSpecificCRN = "SELECT crn, dept, num, days, beginTime, endTime, beginTimeNum, endTimeNum, location, instructor, credits FROM spring WHERE crn=:crn GROUP BY crn";
// then after that you can get a whole bunch of data from the crn, for example:
// nice nice
$getTitle = "SELECT title FROM spring WHERE crn='<crn>'";
$getDays = "SELECT days FROM spring WHERE crn=:crn";

// this returns the number of 0 credit classes in that department and course number (ie., labs)
// "SELECT COUNT(*) FROM spring WHERE dept='<dept name>' AND num=<class num> AND credits = 0"
//
// // so maybe write something up that says if(^that number == 0), then there are no labs, so no additional drop down lists
// // should show up
// // else, drop down-list with this:
// "SELECT * FROM spring WHERE dept='<dept name>' AND num=<class num> AND credits != 0"

$emailData = "SELECT title, days, beginTime, endTime, location FROM spring where crn=:crn";

$store = "insert into sessions (identifier, crnJSON) values (:identifier, :crnJSON)";
$load = "SELECT crnJSON FROM sessions where identifier=:identifier";

?>
