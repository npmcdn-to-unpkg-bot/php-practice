<?php

require_once('model.php');

for ($i = 1; $i < $last_day + 1; $i++) {
	$week = date('w', mktime(0, 0, 0, $month, $i, $year));
	
	if ($i == 1) {
		for ($s = 1; $s <= $week; $s++) {
		$calender[$j]['day'] = '';
		$j++;
		}
	}
	
	$calender[$j]['day'] = $i;
	$j++;
	
	if ($i == $last_day) {
		
		for ($e = 1; $e <= 6 - $week; $e++) {
			$calender[$j]['day'] = '';
			$j++;
		}
	}
}
