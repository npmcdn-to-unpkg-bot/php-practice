<?php
$year = date('Y');
$month = date('n');
$last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));

$calender = array();
$j = 0;

