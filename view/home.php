<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" media="screen">
    <link rel="stylesheet" href="/phpmotors/css/style.css">
    <title> Home | Web Backend Development 1</title>
</head>

<body>
    <div id="wrapper">
        <header>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/header.php' ?>
        </header>
        <nav>
            <?php
            // require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/navigation.php'
            echo $navList;
            ?>
        </nav>
        <main class="Home__main">
            <h1>Welcome to PHP Motors!</h1>
            <div class="Hero">
                <img src="/phpmotors/images/vehicle/delorean.jpg" alt="delorean" class="Hero__img">
                <div class="Hero--cta">
                    <p> <span class="Hero--title"> DMC Delorean</span> <br> 3 cup holders <br> Superman doors <br> Fuzzy dice!</p>
                </div>
                <figure>
                    <img class="Hero__img--cta" src="/phpmotors/images/site/own_today.png" alt="call to action">
                </figure>
            </div>
            <div class="Reviews">
                <h2>DMC Delorean Reviews</h2>
                <ul>
                    <li>"So fasr its almost like traveling in time." (4/5)</li>
                    <li>"Coolest ride on the road." (4/5)</li>
                    <li>"I'm feeling Marty McFly." (5/5)</li>
                    <li>"The most futuristic ride of our day." (4.5/5)</li>
                    <li>"80's livin and I love it!." (5/5)</li>
                </ul>
            </div>
            <div class="Upgrades">
                <h2>Delorean Upgrades</h2>
                <div>
                    <div class="Upgrades--box">
                        <img src="/phpmotors/images/upgrades/flux-cap.png" alt="capacitor">
                    </div>
                    <a href="#">Flux Capacitor</a>
                </div>
                <div>
                    <div class="Upgrades--box">
                        <img src="/phpmotors/images/upgrades/flame.jpg" alt="flame">
                    </div>
                    <a href="#">Flame Decals</a>
                </div>
                <div>
                    <div class="Upgrades--box">
                        <img src="/phpmotors/images/upgrades/bumper_sticker.jpg" alt="bumpersticker">
                    </div>
                    <a href="#">Bumper Sticker</a>
                </div>
                <div>
                    <div class="Upgrades--box">
                        <img src="/phpmotors/images/upgrades/hub-cap.jpg" alt="fub cap">
                    </div>
                    <a href="#">Hub Caps</a>
                </div>
            </div>
        </main>
        <footer>
            <?php require $_SERVER['DOCUMENT_ROOT'] . '/phpmotors/snippets/footer.php' ?>
        </footer>
    </div>

</body>

</html>