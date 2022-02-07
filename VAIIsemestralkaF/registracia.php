<?php
include "MYSQL/registraciaMYSQL.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>WebStranka</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/hlavneCSS.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hlavneCSS.css">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <section class="vh-100 bg-image">
        <div class="mask d-flex align-items-center h-100 gradient-custom-3">
            <div class="container h-100">
                <div class="row  justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                        <div class="card" style="border-radius: 15px;">
                            <div class="card-body p-5">
                                <h2 class="text-uppercase text-center mb-5">Registrovať sa</h2>
                                <form method="post" action="registracia.php">
                                    <div class="form-outline mb-4">
                                        <label>
                                            <input type="text" name="username" class="field" minlength="5" value=""
                                                   placeholder="Meno" autocomplete="off" required>
                                        </label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <label>
                                            <input type="email" name="email" class="field" minlength="5" value=""
                                                   placeholder="E-mail" autocomplete="off" required>
                                        </label>
                                    </div>
                                    <div class="form-outline mb-4">
                                        <input type="password" name="password" class="field"
                                               pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                               placeholder="Heslo"
                                               title="Heslo musí obsahovať minimálne 8 znakov, jedno malé, jedno veľké písmeno a jedno číslo."
                                               required>
                                    </div>
                                    <button type="submit" class="btn_insert" name="register_btn">Registrácia</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>