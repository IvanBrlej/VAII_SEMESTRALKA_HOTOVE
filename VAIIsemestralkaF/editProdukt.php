<?php
include "MYSQL/registraciaMYSQL.php";
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');

$id = $_GET["id"];

$info = "";
$nazov = "";
$obrazok = "";
/* Vybratie produktu a nasledny edit*/
$stmt = $db->prepare("SELECT * FROM produkty WHERE id= ?");
$stmt->bind_param("d", $id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = mysqli_fetch_array($res)) {
    $info = $row["info"];
    $nazov = $row["nazov"];
    $obrazok = $row["obrazok"];
}

if (isset($_POST["update"])) {
    $tm = md5(time());
    $fnm = $_FILES['obrazok']['name'];
    $loginId = $_SESSION['user']['id'];

    if ($fnm == "") {
        $stmt = $db->prepare("UPDATE produkty set info='$_POST[info]', nazov='$_POST[nazov]' where id= ?");
        $stmt->bind_param("d", $id);
        $stmt->execute();
        $res = $stmt->get_result();
    } else {
        $dst = "./obrazky/" . $tm . $fnm;
        $dstl = "obrazky/" . $tm . $fnm;
        move_uploaded_file($_FILES["obrazok"]["tmp_name"], $dst);


        $stmt = $db->prepare("UPDATE produkty set info='$_POST[info]' ,nazov='$_POST[nazov]', obrazok='$dstl', login_id='$loginId' where id= ?");
        $stmt->bind_param("d", $id);
        $stmt->execute();
        $res = $stmt->get_result();
    }
    header('location: produkty.php');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produkty</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hlavneCSS.css">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="col-lg-12 my-3">
        <h2>Update</h2>
        <form action="" name="form1" method="post" enctype="multipart/form-data">
            <div class="form-group my-3">
                <p>Názov</p>
                <input type="text" class="form-control" id="nazov" name="nazov" value="<?php echo $nazov; ?>"
                       minlength="5" placeholder="Zadaj názov" required autocomplete="off">
            </div>
            <div class="form-group my-3">
                <p>Informácie</p>
                <input type="text" class="form-control" id="info" name="info" minlength="10"
                       value="<?php echo $info; ?>" placeholder="Zadaj Info" required autocomplete="off">
            </div>
            <div class="form-group my-3">
                <p>Obrazok</p>
                <input type="file" class="form-control" name="obrazok" placeholder="Zadaj Obrazok">
            </div>
            <button type="submit" name="update" class="btn_insert btn-primary my-3">Vlož</button>
        </form>
    </div>
</div>

</body>
</html>
