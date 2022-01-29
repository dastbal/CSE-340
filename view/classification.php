<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" media="screen">
    <link rel="stylesheet" href="/phpmotors/css/style.css">
    <title><?php echo $classificationName; ?> vehicles | PHP Motors, Inc.</title>
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
        <main>
            <h1><?php echo $classificationName; ?> vehicles</h1>
            <?php if (isset($message)) {
                echo $message;
            }
            ?>

            <?php if (isset($vehicleDisplay)) {
                echo $vehicleDisplay;
            } ?>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
        </footer>
    </div>

</body>

</html>