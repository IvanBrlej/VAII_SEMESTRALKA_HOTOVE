<?php
include "registraciaMYSQL.php";
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');

/* Vlozenie do databazy*/
if (isset($_POST['predmetPos']) && isset($_POST['textPos'])) {
    $meno = $_SESSION['user']['meno'];
    $predmetPos = $_POST['predmetPos'];
    $textPos = $_POST['textPos'];
    $loginId = $_SESSION['user']['id'];
    $sql = "INSERT INTO `forumajax` (meno,predmet, text, login_id) 
        values('$meno','$predmetPos', '$textPos', '$loginId')";

    $result = mysqli_query($db, $sql);
}

/* Vymazanie z databazy*/
if (isset($_POST['deletePos'])) {
    $unique = $_POST['deletePos'];
    $loginId = $_SESSION['user']['id'];

    $sql = "DELETE FROM `forumajax` WHERE id=$unique and login_id=$loginId";
    $result = mysqli_query($db, $sql);
}

/* Zobrazenie dat z databazy*/
if (isset($_POST['displayPos'])) {
    $table = '<table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">Meno</th>
      <th scope="col">Predmet</th>
      <th scope="col">Text</th>
      <th scope="col">Operacie</th>
    </tr>
  </thead>';

    $sql = "SELECT * FROM `forumajax`";
    $result = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $meno = $row['meno'];
        $predmet = $row['predmet'];
        $text = $row['text'];
        $table .= '<tr>
        <td>' . $meno . '</td>
      <td>' . $predmet . '</td>
      <td>' . $text . '</td>
      <td>
    <button class="bi-trash-fill btn-danger" onclick="vymazPrispevok(' . $id . ')">Delete</button>
    </td>
    </tr>';
    }
    $table .= '</table>';
    echo $table;
}

?>