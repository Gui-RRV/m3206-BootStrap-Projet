<?php
// DATABASE FUNCTIONS

/**
 * Connection to the database
 */
function db_connection() {
    $local = true;
    if ($local) {
        $dbh = new PDO('mysql:host=localhost;dbname=projetm3206;charset=utf8',  'root', '');
    } else {
        // Use the information from your database server. For instance:
        // $dbh = new PDO('mysql:host=localhost;dbname=a19000000;charset=utf8', 'a19000000', 'secret');
    }
    return $dbh;
}


// TIME FUNCTIONS

/**
 * Number of elapsed days since the given date
 */
function elapsed_days($date) {
    $now = new DateTime();
    $interval = $date->diff($now);
    $days = $interval->days;
    if ($interval->invert == 1)
        $days *= -1;
    return $days;
}

function elapsed_weeks($date) {
    $days = elapsed_days($date);
    return intdiv($days, 7);
}

function elapsed_months($date) {
    $now = new DateTime();
    $interval = $date->diff($now);
    $months = 12 * $interval->y + $interval->m;
    if ($interval->invert == 1)
        $months *= -1;
    return $months;
}

function elapsed_years($date) {
    $now = new DateTime();
    $interval = $date->diff($now);
    $years = $interval->y;
    if ($interval->invert == 1)
        $years *= -1;
    return $years;
}
?>