<?php
if (!isset($_SESSION['loggedin'])) {
    header('location: http://localhost/phpmotors/');
}
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
    <title> Client Admin | Web Backend Development 1</title>
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
        <main class="ad">
            <h1><?php echo $_SESSION['clientData']['clientFirstname'] . "  " . $_SESSION['clientData']['clientLastname'] ?></h1>
            <p>You are logged in.</p>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <ul>
                <li> First Name: <?php echo $_SESSION['clientData']['clientFirstname'] ?></li>
                <li> Last Name: <?php echo $_SESSION['clientData']['clientLastname'] ?></li>
                <li> Email: <?php echo $_SESSION['clientData']['clientEmail'] ?></li>
            </ul>
            <h2>Account Management</h2>
            <p>Use this link to update account information.</p>
            <a title="Update account information" <?php echo  "href='/phpmotors/accounts?action=updateAccount&clientId=" . $_SESSION['clientData']['clientId'] . "'"   ?>> Update Account Information</a>

            <?php
            if ($_SESSION['clientData']['clientLevel'] > 1) {
                echo $vehicleManagement;
            }


            ?>
            <h2>Manage Your Product Reviews</h2>
            <?php
            if (isset($reviewsAdmin)) {
                echo $reviewsAdmin;
            }
            ?>



        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
        </footer>
    </div>

</body>

</html><?php unset($_SESSION['message']); ?>