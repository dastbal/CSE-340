<?php
// Create or access a Session
session_start();

//     "Accounts Controller".



// Get the database connection file
require_once '../library/connections.php';
// get the function to validate
require_once '../library/functions.php';

// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the accounts model
require_once '../model/accounts-model.php';

// final project
require_once '../model/reviews-model.php';



// Get the array of classifications
$classifications = getClassifications();


// var_dump is a PHP function that displays information about a variable, array or object.
// The exit directive stops all further processing by PHP.

// var_dump($classifications);
// exit;

//  This function create a nav qith the data from the database
$navList =  navList($classifications);
//  This function create a nav qith the data from the database
$vehicleManagement =  inventoryManagement();



$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}
switch ($action) {
    case 'login':  // this is to acces to the view
        include '../view/login.php';
        break;
    case 'Login': // this si to login in the page
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));



        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        // Check for missing data

        if (empty($clientEmail)) {
            $_SESSION['message'] =  '<p class="notice">Please provide information for empty fields.</p>';
            include '../view/login.php';
        } else if (empty($clientEmail)) {
            $_SESSION['message'] =  '<p class="notice">Please provide information for Email.</p>';
            include '../view/login.php';
        }

        // A valid password exists, proceed with the login process
        // Query the client data based on the email address
        $clientData = getClient($clientEmail);
        // Compare the password just submitted against
        // the hashed password for the matching client
        $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);
        // If the hashes don't match create an error
        // and return to the login view
        if (!$hashCheck) {
            $_SESSION['message'] = '<p class="notice">Please check your password and try again.</p>';
            include '../view/login.php';
            exit;
        }

        // A valid user exists, log them in
        $_SESSION['loggedin'] = TRUE;
        // Remove the password from the array
        // the array_pop function removes the last
        // element from an array
        array_pop($clientData);
        // Store the array into the session
        $_SESSION['clientData'] = $clientData;
        $clientId = $_SESSION['clientData']['clientId'];
        $reviewsByClientId = getReviewsByClientId($clientId);
        $reviewsAdmin = buildReviewsAdmin($reviewsByClientId);
        // Send them to the admin view
        include '../view/admin.php';


        exit;

        break;
    case 'registration':
        include '../view/registration.php';
        break;
    case 'register':


        // Filter and store the data
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));

        $clientEmail = checkEmail($clientEmail);
        $checkPassword = checkPassword($clientPassword);

        // Check for existing email address in the table
        $existingEmail = checkExistingEmail($clientEmail);

        if ($existingEmail) {
            $_SESSION['message'] =  '<p class="notice">That email address already exists. Do you want to login instead?</p>';
            include '../view/login.php';
            exit;
        }

        // Check for missing data

        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($checkPassword)) {
            $_SESSION['message'] =  '<p class="notice" >Please provide information for all empty form fields.</p>';
            include '../view/registration.php';
            exit;
        }
        // Hash the checked password
        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

        // Send the data to the model
        $regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $hashedPassword);
        // Check and report the result
        // Check and report the result
        if ($regOutcome === 1) {
            setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
            $_SESSION['message'] = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
            header('Location: /phpmotors/accounts/?action=login');
            exit;
        } else {
            $_SESSION['message'] =  "<p class='notice' >Sorry $clientFirstname, but the registration failed. Please try again.</p>";
            include '../view/registration.php';
            exit;
        }
        break;
    case 'Logout':
        $_SESSION = array();
        session_destroy();
        header('location: http://localhost/phpmotors/');

        break;
    case 'updateAccount':
        $clientId = trim(filter_input(INPUT_GET, 'clientId', FILTER_SANITIZE_EMAIL));

        $clientData = getClientById($clientId);
        $_SESSION['clientData'] = $clientData;


        include '../view/client-update.php';
        break;

    case 'updateInfo':
        $clientFirstname = trim(filter_input(INPUT_POST, 'clientFirstname', FILTER_SANITIZE_STRING));
        $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
        $clientLastname = trim(filter_input(INPUT_POST, 'clientLastname', FILTER_SANITIZE_STRING));
        $clientEmail = trim(filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL));

        // validate if it a correct email
        $clientEmail = checkEmail($clientEmail);


        // Check for existing email address in the table
        if ($clientEmail  != $_SESSION['clientData']['clientEmail']) {

            $existingEmail = checkExistingEmail($clientEmail);

            if ($existingEmail) {
                $_SESSION['message'] =  '<p class="notice">That email address already is registered</p>';
                include '../view/client-update.php';
                exit;
            }
        }

        // Check for missing data

        if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
            $_SESSION['message'] =  '<p class="notice" >Please provide information for all empty form fields. </p>';
            include '../view/client-update.php';
            exit;
        }

        $updateClient = updateClientInfo($clientFirstname, $clientLastname, $clientEmail, $clientId);
        if ($updateClient === 1) {
            $_SESSION['message'] = "<p>$clientFirstname , Your information have been updated.</p>";
            $clientData = getClientById($clientId);
            //  remove password
            array_pop($clientData);
            $_SESSION['clientData'] = $clientData;
            header('Location: /phpmotors/accounts/');
            exit;
        } else {
            $_SESSION['message'] =  "<p>Sorry $clientFirstname, we could not update your account information. Please try again.</p>";
            include '../view/client-update.php';
            exit;
        }

        break;
    case 'updatePassword':
        $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
        $clientPassword = trim(filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING));

        $checkPassword = checkPassword($clientPassword);

        if (empty($checkPassword)) {
            $_SESSION['message'] =  '<p class="notice" >Please follow the pattern to to the new password.</p>';
            include '../view/client-update.php';
            exit;
        }

        $hashedPassword = password_hash($clientPassword, PASSWORD_DEFAULT);
        $rowschanged = updateClientPassword($hashedPassword, $clientId);
        if ($rowschanged == 1) {
            $_SESSION['message'] =  "<p >" . $_SESSION['clientData']['clientFirstname'] . ", your password has been updated.</p>";
            header('Location: /phpmotors/accounts/');
            exit;
        }



        exit;
        break;

    default:
        $clientId = $_SESSION['clientData']['clientId'];
        $reviewsByClientId = getReviewsByClientId($clientId);
        $reviewsAdmin = buildReviewsAdmin($reviewsByClientId);

        include '../view/admin.php';
}
