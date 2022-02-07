<?php
session_start();
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');

/* Delete komentu podla ID*/
$id = $_GET["id"];
$stmt = $db->prepare("DELETE FROM komentare where id= ?");
$stmt->bind_param("s", $id);
$stmt->execute();
header('location: ../produkty.php');
?>
