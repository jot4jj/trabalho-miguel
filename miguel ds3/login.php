<?php

$localhost = 'localhost';
$user = 'root';
$pass = '';
$database = 'thunder';

$conn = new mysqli($localhost, $user, $pass, $database);

if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Login realizado com sucesso!";
        header('Location: profile.html');
        exit();
    } else {
        echo "Usuário ou senha incorretos.";
    }
}

$conn->close();
?>
