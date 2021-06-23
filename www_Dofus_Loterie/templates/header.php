<img src="../assets/img/LOGO.png" alt="" id="logo">

<header>
    <nav>
        <ul>
            <a href="./landing.php" class="a_nav"><li>JOUER</li></a>
            <a href="./rules.php" class="a_nav"><li>RÈGLES DU JEU</li></a>
        </ul>
    </nav>

    <nav>
        <ul>
            <a href="./support.php" class="a_nav_right"><li>SUPPORT</li></a>
            <a href="disconnect.php" class='button_disconnect'>[<?php echo ucfirst($_SESSION['user']); ?>] Disconnect me</a>
        </ul>
    </nav>
</header>


