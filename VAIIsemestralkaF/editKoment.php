<?php
include "MYSQL/registraciaMYSQL.php";
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');

$id = $_GET["id"];

$koment = "";
/* Vybratie komentaru a nasledny edit*/
$stmt = $db->prepare("SELECT * FROM komentare WHERE id= ?");
$stmt->bind_param("d", $id);
$stmt->execute();
$res = $stmt->get_result();
while ($row = mysqli_fetch_array($res)) {
    $koment = $row["text"];
}

if (isset($_POST["update"])) {
    $stmt = $db->prepare("UPDATE komentare set text='$_POST[koment]' where id= ?");
    $stmt->bind_param("d", $id);
    $stmt->execute();
    $res = $stmt->get_result();
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
    <title>Komentár</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hlavneCSS.css">
</head>
<body>
<?php include 'navbar.php'; ?>
<div class="container">
    <div class="col-lg-12">
        <h2>Zadaj</h2>
        <form action="" name="form1" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="koment">Koment</label>
                <input type="text" class="form-control" minlength="5" id="info" name="koment"
                       value="<?php echo $koment; ?>" placeholder="Zadaj koment" required autocomplete="off">
            </div>
            <button type="submit" name="update" class="btn_insert btn-primary my-3">Update</button>
        </form>
    </div>
</div>

</body>
</html>