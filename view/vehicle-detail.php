<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" media="screen">
    <link rel="stylesheet" href="/phpmotors/css/style.css">
    <title><?php echo $vehicleDetail['invMake']; ?> vehicles | PHP Motors, Inc.</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <?php
            require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php'

            ?>
        </header>
        <nav>
            <?php
            // require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'
            echo $navList;
            ?>
        </nav>
        <main class="vd">
            <h1><?php echo $vehicleDetail['invMake']; ?> vehicles</h1>

            <div class="vehiclesDetail-container">

                <?php if (isset($ImagesThumbnailDisplay)) {
                    echo $ImagesThumbnailDisplay;
                } ?>
                <?php if (isset($vehicleDetailDisplay)) {
                    echo $vehicleDetailDisplay;
                } ?>

            </div>
            <hr>
            <div>
                <h2>Customer Review</h2>
                <?php if (isset($message)) {
                    echo $message;
                }
                ?>
                <div class="form-review">
                    <?php
                    if (!isset($_SESSION['loggedin'])) {
                        echo '<p> You must <a href="/phpmotors/accounts/?action=login">login</a> to write a review.</p>';
                    } else {
                        $clientId = $_SESSION['clientData']['clientId'];
                        $firstName = $_SESSION['clientData']['clientFirstname'];
                        $firstLetter = substr($firstName, 0, 1);
                        $firstLetter = strtoupper($firstLetter);
                        $lastName = $_SESSION['clientData']['clientLastname'];
                        $lastName = ucfirst($lastName);

                        echo "$titleDisplay" .
                            '<form action="/phpmotors/reviews/index.php" method="post">' .
                            "<label for='clientName'> Screen Name:</label>" .
                            "<input type='text' id='clientName' value='$firstLetter$lastName' readonly>" .
                            '<label for="reviewText">Review:</label>
                            <textarea required class="reviewTextarea" name="reviewText" id="reviewText" cols="30" rows="10"></textarea>
                            <input class="reviewInput" type="submit" value=" Submit Review">' .
                            "<input type='hidden' name='invId' value='$vehicleDetail[invId]'>" .
                            "<input type='hidden' name='clientId' value='$clientId'>" .
                            '<input type="hidden" name="action" value="insertReview">

                            </form>';
                    }

                    ?>

                </div>
                <div class="show-review">
                    <?php if (isset($reviews)) {
                        echo $reviews;
                    } else {
                        echo "<p>Be the first to write a review</p>";
                    }
                    ?>
                </div>




            </div>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
        </footer>
    </div>

</body>

</html>