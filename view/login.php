<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" media="screen">
    <link rel="stylesheet" href="/phpmotors/css/style.css">
    <title> Account Login | Web Backend Development 1</title>
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
        <main class="Login__main">
            <h1>Sign In</h1>
            <?php
            if (isset($_SESSION['message'])) {
                echo $_SESSION['message'];
            }
            ?>
            <form action="/phpmotors/accounts/" method="post" name="login-phpmotors">
                <label for="email-login"> Email:
                    <input required type="email" id="email-login" name="clientEmail" <?php if (isset($clientEmail)) {
                                                                                            echo "value='$clientEmail'";
                                                                                        }  ?>>
                </label>

                <label for="password"> Password:
                    <input required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" type="password" id="password" name="clientPassword"></label>
                <input type="submit" id="btn-login" value="Sign-in">
                <input type="hidden" name="action" value="Login">
                <br>
                <div id="new-account"> <a href="/phpmotors/accounts?action=registration" title="Registration account with PHPMOTORS"> Create an account</a></div>
            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
        </footer>
    </div>

</body>

</html>