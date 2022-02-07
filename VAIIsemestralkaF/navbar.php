<nav class="navbar navbar-expand-sm  justify-content-end sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#">MiamiBoats.sk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Domov</a>
                </li>
                <?php
                if (!isLoggedIn()) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="prihlasovanie.php"> Prihlásiť sa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registracia.php">Vytvoriť účet</a>
                    </li>
                <?php } else { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="produkty.php">Bazár</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="forumAJAX.php">Forum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hladaniePrispevky.php">Hľadať príspevky</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mojUcet.php">Môj účet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?logout='1'">Odhlásiť sa</a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>

