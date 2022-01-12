<?php
session_start();
$ime = $_SESSION['ime'];

print_r($ime);

// remove all session variables
session_unset();

// destroy the session
session_destroy();
?>