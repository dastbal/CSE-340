<?php
if (!isset($_SESSION['loggedin']) || $_SESSION['clientData']['clientLevel'] == 1) {
    header('location: http://localhost/phpmotors/');
    exit;
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
    <title> <?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
		echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?> | Web Backend Development 1</title>
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
        <main class="vehicle__main">
        <h1>
        <?php if(isset($invInfo['invMake']) && isset($invInfo['invModel'])){ 
	echo "Delete $invInfo[invMake] $invInfo[invModel]";} ?>
    </h1>
    <?php

if (isset($message)) {
    echo $message ;
}
?>
    <h3>Confirm Vehicle Deletion. The delete is permanent.</h3>
            <form action="/phpmotors/vehicles/index.php" method="post">

                
                <label for="invMake"> Make
                    <input readonly type="text" <?php if(isset($invInfo['invMake'])) {echo "value='$invInfo[invMake]'"; } ?> name="invMake" id="invMake">
                </label>
                <label for="invModel"> Model
                    <input readonly type="text" <?php if(isset($invInfo['invModel'])) {echo "value='$invInfo[invModel]'"; }  ?> name="invModel" id="invModel">
                </label>
                <label for="invDescription"> Description
                    <textarea readonly name="invDescription" id="invDescription" cols="30" rows="5"><?php if(isset($invInfo['invDescription'])) {echo $invInfo['invDescription']; }  ?></textarea>
                </label>
                
                <br>
                <input type="submit" name="submit" value="Delete Vehicle" id="btn-vehicle">
                <input type="hidden" name="action" value="deleteVehicle">
                <input type="hidden" name="invId" value="
<?php if(isset($invInfo['invId'])){ echo $invInfo['invId'];} ?>
">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
        </footer>
    </div>

</body>

</html>