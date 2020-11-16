<?php
/**
 * Log out the user
 */
session_start();
session_destroy();
header('Location: index.php');
?>