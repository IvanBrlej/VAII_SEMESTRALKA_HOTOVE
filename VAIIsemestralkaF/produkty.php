<?php
include "MYSQL/registraciaMYSQL.php";
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');

/* Vlozenie produktu do databazy*/
if (isset($_POST["insert"])) {
    $tm = md5(time());
    $fnm = $_FILES['obrazok']['name'];
    $dst = "./obrazky/" . $tm . $fnm;
    $dstl = "obrazky/" . $tm . $fnm;
    move_uploaded_file($_FILES["obrazok"]["tmp_name"], $dst);
    $loginId = $_SESSION['user']['id'];
    $meno = $_SESSION['user']['meno'];
    $contact = $_SESSION['user']['email'];


    mysqli_query($db, "INSERT INTO produkty values(NULL,'$meno', '$_POST[nazov]','$_POST[info]', '$contact', '$dstl','$loginId')");
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
    <link rel="stylesheet" href="CSS/hlavneCSS.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>
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
    <div class="col-lg-12">
        <form name="form1" method="post" enctype="multipart/form-data">
            <div class="form-group my-3">
                <p>Info</p>
                <input type="text" class="form-control" minlength="10" id="info" name="info" placeholder="Zadaj Info"
                       required autocomplete="off">
            </div>
            <div class="form-group my-3">
                <p>Názov</p>
                <input type="text" class="form-control" id="nazov" minlength="5" name="nazov" placeholder="Zadaj názov"
                       required autocomplete="off">
            </div>
            <div class="form-group my-3">
                <p>Obrázok</p>
                <input type="file" class="form-control" name="obrazok" required>
            </div>
            <button type="submit" name="insert" class="btn_insert">Vlož</button>
        </form>
    </div>
</div>

<div class="col-lg-12">
    <table class="table">
        <thead>
        <tr>
            <th>Obrazok</th>
            <th>Meno</th>
            <th>Názov</th>
            <th>Info</th>
            <th>Kontakt</th>
            <th>Komentár</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        <?php
        $res = "SELECT * FROM produkty";
        $result = mysqli_query($db, $res);
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>"; ?> <img src="<?php echo $row["obrazok"]; ?>" height="300" width="300"
                                 alt=""> <?php echo "</td>";
            echo "<td>";
            echo $row["meno"];
            echo "</td>";
            echo "<td>";
            echo $row["nazov"];
            echo "</td>";
            echo "<td>";
            echo $row["info"];
            echo "</td>";
            echo "<td>";
            echo $row["contact"];
            echo "</td>";


            echo "<td>"; ?>  <a href="komentar.php?id=<?php echo $row["id"] ?> ">
                <button type="button" class="btn_insert btn-primary">Komentar</button>
            </a> <?php "</td>";
            if ($_SESSION['user']['id'] == $row['login_id']) {
                echo "<td>"; ?> <a href="editProdukt.php?id=<?php echo $row["id"] ?>">
                    <button class="bi-pencil-fill">
                    </button>
                </a> <?php "</td>";
                echo "<td>"; ?>  <a href="MYSQL/deleteProdukt.php?id=<?php echo $row["id"] ?> ">
                    <button class="bi-trash-fill">
                    </button>
                </a> <?php "</td>";
                echo "</tr>";
            } else {
                echo "<td>";
                echo "</td>";
                echo "<td>";
                echo "</td>";
            }
            echo "<tr>";
            $iid = $row["id"];
            $stmt = $db->prepare("SELECT * from komentare WHERE id_produkt= ?");
            $stmt->bind_param("s", $iid);
            $stmt->execute();
            $re = $stmt->get_result();
            while ($row = mysqli_fetch_array($re)) {
                echo "<td>";
                echo $row["meno"];
                echo "</td>";
                echo "<td>";
                echo $row["text"];
                echo "</td>";
                if ($_SESSION['user']['id'] == $row['login_id']) {
                    echo "<td>"; ?> <a href="editKoment.php?id=<?php echo $row["id"] ?>">
                        <button class="bi-pencil-fill">
                        </button>
                    </a> <?php "</td>";
                    echo "<td>"; ?>  <a href="MYSQL/deleteKoment.php?id=<?php echo $row["id"] ?> ">
                        <button class="bi-trash-fill">
                        </button>
                    </a> <?php "</td>";
                } else {
                    echo "<td>";
                    echo "</td>";
                    echo "<td>";
                    echo "</td>";
                }
                echo "</tr>";
            }
        }

        ?>
        </tbody>
    </table>
</div>
</body>
</html>