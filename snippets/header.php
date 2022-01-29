<div class="Header">
    <div class="logo">
        <img src="/phpmotors/images/site/logo.png" alt="logo phpmotors">

    </div>
    <div class="Header--account">
        <?php if (isset($_SESSION['loggedin'])) {
            echo "<a href='/phpmotors/accounts/'>" . $_SESSION['clientData']['clientFirstname'] . "</a> | ";
        } ?>
        <?php
        if (isset($_SESSION['loggedin'])) {
            echo "<a href='/phpmotors/accounts?action=Logout'>" . "Logout" . "</a>";
        } else {
            echo "<a href='/phpmotors/accounts?action=login' title='Login Account with PHPMOTORS'>My Account</a>";
        }
        ?>

    </div>
</div>