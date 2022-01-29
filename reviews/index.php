<?php

// This is a review controller
// Create or access a Session
session_start();
// Get the database connection file
require_once '../library/connections.php';
require_once '../library/functions.php';
// Get the PHP Motors model for use as needed
require_once '../model/main-model.php';

// Get the accounts model
require_once '../model/accounts-model.php';
// Get the accounts model
require_once '../model/vehicles-model.php';
require_once '../model/uploads-model.php';
require_once '../model/reviews-model.php';

// Get the array of classifications
$classifications = getClassifications();
//  This function create a nav qith the data from the database
$navList =  navList($classifications);
$vehicleManagement =  inventoryManagement();
$clientId = $_SESSION['clientData']['clientId'];
$reviewsByClientId = getReviewsByClientId($clientId);
$reviewsAdmin = buildReviewsAdmin($reviewsByClientId);


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
    case 'editReview':
        $reviewId = trim(filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT));
        $reviewsByreviewId = getReviewByReviewId($reviewId);
        $buildReviewUpdated = buildReviewUpdated($reviewsByreviewId);



        include '../view/review-update.php';


        break;
    case 'deleteReview':
        $reviewId = trim(filter_input(INPUT_GET, 'reviewId', FILTER_SANITIZE_NUMBER_INT));
        $reviewsByreviewId = getReviewByReviewId($reviewId);
        $buildReviewDeleted = buildReviewDeleted($reviewsByreviewId);

        include '../view/review-delete.php';

        break;
    case 'updated':
        $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));
        $reviewId = trim(filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT));
        if (empty($reviewText)) {
            $message = '<p class="red">Please do not leave empty the review.</p>';
            $_SESSION['message'] = $message;
            header("location: /phpmotors/reviews/?action=editReview&reviewId=$reviewId");
            exit;
        }
        $regOutcome = updateReviewByReviewId($reviewText, $reviewId);
        if ($regOutcome === 1) {
            $message = "<p class='red'>The  review was updated Successfully.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/reviews/');
            exit;
        } else {
            $message = "<p  class='red'>Sorry, the review did not update. Please try again.</p>";
            $_SESSION['message'] = $message;
            header("location: /phpmotors/reviews/?action=editReview&reviewId=$reviewId");
            exit;
        }
        break;
    case 'deleted':
        $reviewId = trim(filter_input(INPUT_POST, 'reviewId', FILTER_SANITIZE_NUMBER_INT));

        $regOutcome = deleteReviewByReviewId($reviewId);
        if ($regOutcome === 1) {
            $message = "<p class='red'>The  review was deleted Successfully.</p>";
            $_SESSION['message'] = $message;

            header('location: /phpmotors/reviews/');
            exit;
        } else {
            $message = "<p class='red'>Sorry, the review did not delete. Please try again.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/reviews/');
            exit;
        }


        break;
    case 'insertReview':
        $invId = trim(filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT));
        $clientId = trim(filter_input(INPUT_POST, 'clientId', FILTER_SANITIZE_NUMBER_INT));
        $reviewText = trim(filter_input(INPUT_POST, 'reviewText', FILTER_SANITIZE_STRING));

        if (empty($reviewText)) {
            $message = '<p class="red">Please provide  review.</p>';
            $_SESSION['message'] = $message;

            header("location: /phpmotors/vehicles/?action=vehicleDetail&invId=$invId");
            exit;
        }

        // Send the data to the model
        $regOutcome = insertReview($reviewText, $invId, $clientId);
        if ($regOutcome === 1) {
            $message = "<p class='red'>The Review was added Successfully.</p>";
            $_SESSION['message'] = $message;

            header("location: /phpmotors/vehicles/?action=vehicleDetail&invId=$invId");
            exit;
        } else {
            $message = "<p>Sorry, the registration failed for . Please try again.</p>";
            include '../view/admin.php';
            exit;
        }
        break;

    default:


        include '../view/admin.php';
        break;
}
