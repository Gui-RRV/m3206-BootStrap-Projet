<?php 

 namespace App;

use\DateTime;

class Time 
{
	static function elapsed_days($date) {
		$date = new DateTime($date);
	    $now = new DateTime();
	    $interval = $date->diff($now);
	    $days = $interval->days;
	    if ($interval->invert == 1)
	        $days *= -1;
	    return $days;
	}

	static function elapsed_weeks($date) {
	    $days = self::elapsed_days($date);
	    return intdiv($days, 7);
	}

	static function elapsed_months($date) {
		$date = new DateTime($date);
	    $now = new DateTime();
	    $interval = $date->diff($now);
	    $months = 12 * $interval->y + $interval->m;
	    if ($interval->invert == 1)
	        $months *= -1;
	    return $months;
	}

	static function elapsed_years($date) {
		$date = new DateTime($date);
	    $now = new DateTime();
	    $interval = $date->diff($now);
	    $years = $interval->y;
	    if ($interval->invert == 1)
	        $years *= -1;
	    return $years;
	}

}