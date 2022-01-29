<?php
if (!isset($_SESSION['loggedin'])) {
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
    <title> Account Management | Web Backend Development 1</title>
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
        <main class="UpdateAccount__main Login__main">
            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <h1>Update Account</h1>
            <form action="/phpmotors/accounts/index.php" method="post" name="update-phpmotors">
                <label for="clientFirstname"> Firstname:
                    <input name="clientFirstname" required id="clientFirstname" type="text" <?php if (isset($_SESSION['clientData']['clientFirstname'])) {
                                                                                                echo "value='" . $_SESSION['clientData']['clientFirstname'] . "'";
                                                                                            }  ?>>
                </label>
                <label for="clientLastname"> Lastname:
                    <input name="clientLastname" required id="clientLastname" type="text" <?php if (isset($_SESSION['clientData']['clientLastname'])) {
                                                                                                echo "value='" . $_SESSION['clientData']['clientLastname'] . "'";
                                                                                            }  ?>>
                </label>
                <label for="email-registration"> Email :
                    <input type="email" id="email-registration" name="clientEmail" required placeholder="Enter a valid email address" <?php if (isset($_SESSION['clientData']['clientEmail'])) {
                                                                                                                                            echo "value='" . $_SESSION['clientData']['clientEmail'] . "'";
                                                                                                                                        }  ?>>
                </label>
                <input type="submit" name="submit" id="btn-registration" value="Update info">
                <input type="hidden" name="action" value="updateInfo">
                <input type="hidden" name="clientId" value="<?php if (isset($_SESSION['clientData']['clientId'])) {
                                                                echo $_SESSION['clientData']['clientId'];
                                                            } elseif (isset($clientId)) {
                                                                echo $clientId;
                                                            } ?>">


            </form>


            <h1>Update Password</h1>
            <form action="/phpmotors/accounts/index.php" method="post" name="updatePassword-phpmotors">

                <label for="password">
                    <span>Passwords must be at least 8 characters and contais at least 1 numer ,1capital letter and 1 special character

                    </span> <br>
                    <span> *Note ypur original password will be changed</span>

                    <br>

                    Password:

                </label>
                <input required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" type="password" id="password" name="clientPassword">
                <input type="submit" name="submit" value="Update Password">
                <input type="hidden" name="action" value="updatePassword">
                <input type="hidden" name="clientId" value="<?php if (isset($_SESSION['clientData']['clientId'])) {
                                                                echo $_SESSION['clientData']['clientId'];
                                                            } elseif (isset($clientId)) {
                                                                echo $clientId;
                                                            } ?>">



            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
        </footer>
    </div>

</body>

</html>
<?php unset($_SESSION['message']); ?>