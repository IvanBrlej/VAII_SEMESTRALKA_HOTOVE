<?php
include "MYSQL/registraciaMYSQL.php";
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');

$id = $_SESSION['user']['id'];

/* Vymazanie vsetkych prispevkov pouzivatela*/
if (isset($_POST["delete_aktivita"])) {
    $stmt = $db->prepare("DELETE FROM forumajax where login_id= ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
}

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Môj účet</title>
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
<?php
$myDB = new mysqli('localhost', 'root', 'dtb456', 'databazasem') or die (mysqli_eror($myDB));
$pom = $_SESSION['user']['id'];
$stmt = $db->prepare("SELECT * FROM users WHERE id = ?");
$stmt->bind_param("s", $pom);
$stmt->execute();
$result = $stmt->get_result();
?>
<div class="col-lg-12 my-3">
    <table class="table">
        <thead>
        <tr>
            <th>Meno</th>
            <th>Email</th>
        </tr>
        </thead>
        <?php
        while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['meno']; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

<div class="my-5">
    <?php
    $myDB = new mysqli('localhost', 'root', 'dtb456', 'databazasem') or die (mysqli_eror($myDB));
    $pom = $_SESSION['user']['id'];
    $stmt = $db->prepare("SELECT predmet, text FROM forumajax WHERE login_id = ?");
    $stmt->bind_param("s", $pom);
    $stmt->execute();
    $result = $stmt->get_result();
    ?>
    <div class="col-lg-12">
        <table class="table">
            <thead>
            <tr>
                <th>Predmet</th>
                <th>Správa</th>
            </tr>
            </thead>
            <?php
            while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['predmet']; ?></td>
                    <td><?php echo $row['text']; ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>
</div>

<form action="mojUcet.php" method="post">
    <input formmethod="post" type="submit" class="delete" name="delete_aktivita"
           value="Vymazať všetky príspevky z fora"/>
</form>

</body>
</html>