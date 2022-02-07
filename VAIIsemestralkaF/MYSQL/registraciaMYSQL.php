<?php
session_start();
$db = mysqli_connect('localhost', 'root', 'dtb456', 'databazasem');
$errors = array();

/* Registracia uzivatela*/
if (isset($_POST['register_btn'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $duplikat = $db->prepare("SELECT meno FROM users WHERE meno = ?");
    $duplikat->bind_param("s", $username);
    $duplikat->execute();
    $res = $duplikat->get_result();
    if (mysqli_num_rows($res) > 0) {
        array_push($errors, "Toto meno už existuje");
        echo '<script> alert("Toto meno už existuje") </script>';
    }
    if (count($errors) == 0) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $db->prepare("INSERT INTO users (meno, email,heslo) 
					  VALUES(?, ?,?)");
        $stmt->bind_param("sss", $username, $email, $password);
        $stmt->execute();
    }
}

/* Prihlasenie pouzivatela a verifikovanie hesla*/
if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        array_push($errors, "Zadajte nickname");
    }
    if (empty($password)) {
        array_push($errors, "Zadajte heslo");
    }
    if (count($errors) == 0) {
        $stmt = $db->prepare("SELECT * FROM users  WHERE meno = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $res = $stmt->get_result();
        if (mysqli_num_rows($res) == 1) {
            while ($row = mysqli_fetch_assoc($res)) {
                if (password_verify($password, $row['heslo'])) {
                    header('location: index.php');
                    $_SESSION['user'] = $row;
                }
            }
        } else {
            array_push($errors, "Nesprávne meno alebo heslo");
        }
    }

}

/* Vracia ci je prihlaseny pouzivatel */
function isLoggedIn()
{
    if (isset($_SESSION['user'])) {
        return true;
    } else {
        return false;
    }
}

/* Odhlasenie prihlaseneho pouzivatela */
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
}
