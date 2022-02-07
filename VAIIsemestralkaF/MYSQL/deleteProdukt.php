<?php
session_start();
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');

/* Delete produktu podla id*/
$id = $_GET["id"];
mysqli_query($db, "DELETE FROM produkty where id=$id");
mysqli_query($db, "DELETE FROM komentare where id_produkt=$id");
header('location: ../produkty.php');
?>

