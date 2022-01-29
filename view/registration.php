<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" media="screen">
    <link rel="stylesheet" href="/phpmotors/css/style.css">
    <title> Account Registration | Web Backend Development 1</title>
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
        <main class="Registration__main">
            <h1>Register</h1>


            <?php
            if (isset($message)) {
                echo $message;
            }
            ?>
            <form action="/phpmotors/accounts/index.php" method="post" name="registration-phpmotors">
                <label for="clientFirstname"> Firstname:
                    <input name="clientFirstname" required id="clientFirstname" type="text" <?php if (isset($clientFirstname)) {
                                                                                                echo "value='$clientFirstname'";
                                                                                            }  ?>>
                </label>
                <label for="clientLastname"> Lastname:
                    <input name="clientLastname" required id="clientLastname" type="text" <?php if (isset($clientLastname)) {
                                                                                                echo "value='$clientLastname'";
                                                                                            }  ?>>
                </label>
                <label for="email-registration"> Email :
                    <input type="email" id="email-registration" name="clientEmail" required placeholder="Enter a valid email address" <?php if (isset($clientEmail)) {
                                                                                                                                            echo "value='$clientEmail'";
                                                                                                                                        }  ?>>
                </label>
                <label for="password">
                    <span>Passwords must be at least 8 characters and contais at least 1 numer ,1capital letter and 1 special character

                    </span> <br>


                    Password:

                    <input required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" type="password" id="password" name="clientPassword">
                </label>
                <button id="btn-show">Show Password</button>
                <input type="submit" name="submit" id="btn-registration" value="Register">
                <input type="hidden" name="action" value="register">


            </form>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
        </footer>
    </div>

</body>
<!-- <script>
    let btn = document.getElementById('btn-show')
    const show = () => {
        let input = document.getElementById('password')
        input['type'] = 'text'
    }
    btn.addEventListener('click', show, false)
</script> -->

</html>