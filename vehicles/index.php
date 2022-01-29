<?php
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
// final project
require_once '../model/reviews-model.php';




// Get the array of classifications
$classifications = getClassifications();

// var_dump is a PHP function that displays information about a variable, array or object.
// The exit directive stops all further processing by PHP.

//var_dump($classifications);

// exit;

//  This function create a nav qith the data from the database
$navList =  navList($classifications);


// Build $classificationList variable
// $classificationList = '<label for="classificationId">Choose a Classification Name</label>
// <select id="classificationId" name="classificationId">
//     <option value="Choose Car Classification" disabled autofocus>Choose Car Classification</option>';
// foreach ($classifications as $classification) {
//     $classificationList .=  "<option value='$classification[classificationId]'>$classification[classificationName]</option>";
// }
// $classificationList .= '</select>';


//To see if it is working

//var_dump($classificationList);














$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}



switch ($action) {
    case 'vehicle':
        include '../view/add-vehicle.php';
        break;
    case 'vehicleDetail':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_STRING);
        // enhancement 9 function  new that bring the image from image table
        $vehicleDetail = getVehiclesDetailImageTable($invId);
        // enhancement 9 function to bring the thumbnail images
        $imagesThumbnail = getImagesThumbnail($invId);
        // final project  function to obtain an array with the reviews information


        if (!count($vehicleDetail)) {
            $message = "<p class='notice'>Sorry, no could be found.</p>";
            include '../view/classification.php';
            exit;
        } else {
            $vehicleDetailDisplay = buildVehicleDetailDisplay($vehicleDetail);
            // enhancement 9
            $ImagesThumbnailDisplay = buildImagesThumbnailDisplay($imagesThumbnail);
            /////////////////////////////////////////7final project ////////////////////////////////////////////
            $titleDisplay = builTitleForm($vehicleDetail);
            $reviewsArray = getReviewsByInvId($invId);
            //  if the array os empty the review is not created  so the variable will not find in the view so will be  display thet text to be the first of leave a review
            if (count($reviewsArray) >= 1) {
                $reviews = buildReviews($reviewsArray);
            }
        }
        include '../view/vehicle-detail.php';

        break;
    case 'addClassification':

        // Filter and store the data
        $classificationName = trim(filter_input(INPUT_POST, 'classificationName', FILTER_SANITIZE_STRING));


        // Check for missing data
        if (empty($classificationName)) {
            $message = '<p>Please provide the Classification Name</p>';
            include '../view/add-classification.php';
            exit;
        }

        // Send the data to the model
        $regOutcome = regClassification($classificationName);
        // Check and report the result
        if ($regOutcome === 1) {

            include  header('location: http://localhost/phpmotors/vehicles');
            exit;
        } else {
            $message = "<p>Sorry $classificationName, did not add. Please try again.</p>";
            include '../view/add-classification.php';
            exit;
        }
        break;
    case 'addVehicle':
        // Filter and store the data
        $invMake = trim(filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING));
        $invModel = trim(filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING));
        $invDescription = trim(filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING));
        $invImage = trim(filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING));
        $invThumbnail = trim(filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING));
        $invPrice = trim(filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_STRING));
        $invStock = trim(filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_STRING));
        $invColor = trim(filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING));
        $classificationId = trim(filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_STRING));

        // Check for missing data
        if (empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invColor) || empty($invStock) || empty($classificationId)) {
            $message = '<p>Please provide information for all empty form fields.</p>';
            include '../view/add-vehicle.php';
            exit;
        }

        // Send the data to the model
        $regOutcome = regVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId);
        // Check and report the result
        if ($regOutcome === 1) {
            $message = "<p>The  $invMake $invModel was added Successfully.</p>";
            include '../view/add-vehicle.php';
            exit;
        } else {
            $message = "<p>Sorry, the registration failed for $invMake $invModel. Please try again.</p>";
            include '../view/add-vehicle.php';
            exit;
        }
        break;
    case 'getInventoryItems':
        // Get the classificationId 
        $classificationId = filter_input(INPUT_GET, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        // Fetch the vehicles by classificationId from the DB 
        $inventoryArray = getInventoryByClassification($classificationId);
        // Convert the array to a JSON object and send it back 
        echo json_encode($inventoryArray);
        break;

    case 'mod':

        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-update.php';
        exit;
        break;
    case 'updateVehicle':
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
        $classificationId = filter_input(INPUT_POST, 'classificationId', FILTER_SANITIZE_NUMBER_INT);
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
        $invImage = filter_input(INPUT_POST, 'invImage', FILTER_SANITIZE_STRING);
        $invThumbnail = filter_input(INPUT_POST, 'invThumbnail', FILTER_SANITIZE_STRING);
        $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
        $invColor = filter_input(INPUT_POST, 'invColor', FILTER_SANITIZE_STRING);

        if (empty($classificationId) || empty($invMake) || empty($invModel) || empty($invDescription) || empty($invImage) || empty($invThumbnail) || empty($invPrice) || empty($invStock) || empty($invColor)) {
            $message = '<p>Please complete all information for update the vehicle ! Double check the classification of the item.</p>';
            include '../view/vehicle-update.php';
            exit;
        }
        $updateResult = updateVehicle($invMake, $invModel, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invColor, $classificationId, $invId);
        if ($updateResult) {
            $message = "<p class='notify'>Congratulations, the $invMake $invModel was successfully updated.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p>Error. The new vehicle was not updated.</p>";
            $_SESSION['message'] = $message;

            include '../view/vehicle-update.php';
            exit;
        }
        break;
    case 'del':
        $invId = filter_input(INPUT_GET, 'invId', FILTER_VALIDATE_INT);
        $invInfo = getInvItemInfo($invId);
        if (count($invInfo) < 1) {
            $message = 'Sorry, no vehicle information could be found.';
        }
        include '../view/vehicle-delete.php';
        exit;
        break;
    case 'deleteVehicle':
        $invMake = filter_input(INPUT_POST, 'invMake', FILTER_SANITIZE_STRING);
        $invModel = filter_input(INPUT_POST, 'invModel', FILTER_SANITIZE_STRING);
        $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);

        $deleteResult = deleteVehicle($invId);
        if ($deleteResult) {
            $message = "<p class='notice'>Congratulations the, $invMake $invModel was	successfully deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        } else {
            $message = "<p class='notice'>Error: $invMake $invModel was not
                    deleted.</p>";
            $_SESSION['message'] = $message;
            header('location: /phpmotors/vehicles/');
            exit;
        }
        break;
    case 'classification':
        $classificationName = filter_input(INPUT_GET, 'classificationName', FILTER_SANITIZE_STRING);
        // enhancement 9 function new that bring images from  a image tabbles
        $vehicles = getVehiclesByClassificationImage($classificationName);
        if (!count($vehicles)) {
            $message = "<p class='notice'>Sorry, no $classificationName could be found.</p>";
        } else {
            $vehicleDisplay = buildVehiclesDisplay($vehicles);
        }

        include '../view/classification.php';
        break;

    default:
        $classificationList = buildClassificationList($classifications);


        include '../view/vehicle-man.php';
        break;
}
