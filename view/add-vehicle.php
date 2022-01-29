<?php $classificationList = '<label for="classificationId">Choose a Classification Name</label>
<select id="classificationId" name="classificationId">
    <option value="Choose Car Classification" disabled  >Choose a Car Classification</option>';
foreach ($classifications as $classification) {
    $classificationList .=  "<option value='$classification[classificationId]'";
    if (isset($classificationId)) {
        if ($classificationId == $classification['classificationId']) {
            $classificationList .= '  selected  ';
        }
    };

    $classificationList .= ">$classification[classificationName]</option>";
}
$classificationList .= '</select>'; ?>
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
    <title> Add Vehicle | Web Backend Development 1</title>
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
            <h1>Add Vehicle</h1>
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/phpmotors/vehicles/index.php" method="post">

                <p> *Note: All fields are Required</p>
                <?php
                echo $classificationList;
                ?>
                <label for="invMake"> Make
                    <input required type="text" <?php if (isset($invMake)) {
                                                    echo "value='$invMake'";
                                                }  ?> name="invMake" id="invMake">
                </label>
                <label for="invModel"> Model
                    <input required type="text" <?php if (isset($invModel)) {
                                                    echo "value='$invModel'";
                                                }  ?> name="invModel" id="invModel">
                </label>
                <label for="invDescription"> Description
                    <textarea required name="invDescription" id="invDescription" cols="30" rows="5"><?php if (isset($invDescription)) {
                                                                                                        echo $invDescription;
                                                                                                    }  ?></textarea>
                </label>
                <label for="invImage">Image Path
                    <input required type="text" value="/phpmotors/images/vehicle/" <?php if (isset($invImage)) {
                                                                                        echo "value='$invImage'";
                                                                                    }  ?> name="invImage" id="invImage">
                </label>
                <label for="invThumbnail">Thumbnail Path
                    <input required type="text" value="/phpmotors/images/vehicle/" <?php if (isset($invThumbnail)) {
                                                                                        echo "value='$invThumbnail'";
                                                                                    }  ?> name="invThumbnail" id="invThumbnail">
                </label>
                <label for="invPrice"> Price
                    <input required type="number" name="invPrice" <?php if (isset($invPrice)) {
                                                                        echo "value='$invPrice'";
                                                                    }  ?> id="invPrice">
                </label>
                <label for="invStock"> # In Stock
                    <input required type="number" name="invStock" <?php if (isset($invStock)) {
                                                                        echo "value='$invStock'";
                                                                    }  ?> id="invStock">
                </label>
                <label for="invColor"> Color
                    <input required type="text" name="invColor" <?php if (isset($invColor)) {
                                                                    echo "value='$invColor'";
                                                                }  ?> id="invColor">
                </label>
                <br>
                <input type="submit" name="submit" value="Add Vehicle" id="btn-vehicle">
                <input type="hidden" name="action" value="addVehicle">
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
        </footer>
    </div>

</body>

</html>