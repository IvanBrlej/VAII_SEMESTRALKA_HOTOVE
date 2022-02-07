<?php include "MYSQL/registraciaMYSQL.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebStranka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css"
          integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.js"
            integrity="sha512-n/4gHW3atM3QqRcbCn6ewmpxcLAHGaDjpEBu4xZd47N0W2oQ+6q7oc3PXstrJYXcbNU1OHdQ1T7pAP+gi5Yu8g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="CSS/hlavneCSS.css">
</head>
<body>
<?php include 'navbar.php'; ?>
<div>
    <h5 class="fancy">miamiboats.sk</h5>
    <script src="javascript/animation.js"></script>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-md-6">
            <img src="obrazky/lod.jpg" alt="my picture" height=400 width=400>
        </div>
        <div class="col-md-6">
            <div class="intro">
                <div class="intro-title">
                    <h6>Kto sme?</h6>
                </div>
                <div class="intro-content">
                    <div class="intro-text">
                        <p>Sme banda nadšencov do lodí. Táto stránka vďaka našim sponzorom existuje už 5 rokov. Na
                            stránke nájdeme forum kde si naši použivaťelia môžu písať zážitky ale aj dohadovať si
                            stretnutia a podobné aktivity. Tak isto tu nájdeme aj bazár kde sa predávajú všelijaké
                            produkty, môžeš k nim napísať aj koment. Stránka sa nesie v pokojnom duchu tak buď aj ty
                            milý a využívaj ju najlepšie ako len vieš. Veľa šťastia priateľu.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="slideshow">
    <div>
        <img src="sponzori/spotify.png" alt="">
    </div>
    <div>
        <img src="sponzori/coca-cola.png" alt="">
    </div>
    <div>
        <img src="sponzori/redbull.png" alt="">
    </div>
    <div>
        Ďakujeme našim sponzorom.
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
