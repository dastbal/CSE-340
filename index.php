<?php
// Create or access a Session
session_start();


// This is  the Controller

// Get the database connection file
require_once 'library/connections.php';
// Get the PHP Motors model for use as needed
require_once 'model/main-model.php';
require_once 'library/functions.php';


// Check if the firstname cookie exists, get its value
if (isset($_COOKIE['firstname'])) {
    $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

// Get the array of classifications
$classifications = getClassifications();

// var_dump is a PHP function that displays information about a variable, array or object.
// The exit directive stops all further processing by PHP.

// var_dump($classifications);
// exit;

//  This function create a nav qith the data from the database
$navList =  navList($classifications);


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
    case 'template':
        include 'view/template.php';

        break;
    default:
        include 'view/home.php';
        break;
}
