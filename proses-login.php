<?php
$userAkun = 'akmal';
$passAkun = '123';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $userInput = $_POST['username'];
    $passInput = $_POST['password'];

    if ($userAkun === $userInput and $passAkun === $passInput) {
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Username atau Password salah !";
        header('Location: login.php');
    }
}


?>