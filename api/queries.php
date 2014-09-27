<?php

$getDepartments = "SELECT DISTINCT dept FROM sections";
$getClasses = "SELECT DISTINCT num FROM sections WHERE dept='<dept name>'";
$getSections = "SELECT section FROM sections WHERE dept='<dept name>' AND num=<class num>";
$getCRN = "SELECT crn FROM sections WHERE dept='<dept name>' AND num=<class num> AND section='<sect num>'";

?>
