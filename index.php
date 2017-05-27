<?php
date_default_timezone_set('universal');

function varDump($data){
	echo "<pre>";
	print_r($data);
	echo "</pre>";
}

function diffForHumans(DateTime $date){
	$currentDate = new DateTime;

	$difference = $currentDate->diff($date);

	$unit = 'second';

	$count = $difference->s;
	
	switch(true){
		case $difference->y > 0:
			$unit = 'year';
			$count = $difference->y;
			break;
		case $difference->m > 0:
			$unit = 'month';
			$count = $difference->m;
			break;
		case $difference->d > 0:
			$unit = 'day';
			$count = $difference->d;
			break;
		case $difference->h > 0:
			$unit = 'hour';
			$count = $difference->h;
			break;
		case $difference->i > 0:
			$unit = 'minute';
			$count = $difference->i;
			break;
		case $difference->y > 0:
			$unit = 'year';
			$count = $difference->y;
			break;
	}

	if($count === 0 ){
		$count = 1;
	}

	if($count > 1 ){
		$unit .= 's';
	}
	varDump($difference);
	$inversion = $difference->invert === 0 ? 'from now' : 'ago';
	return "{$count} {$unit} {$inversion}";


}

$date = new DateTime('2018-10-15 14:00:00');

echo diffForHumans($date);

