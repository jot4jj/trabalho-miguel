<?php

$localhost = 'localhost';
$user = 'root';
$pass = '';
$database = 'thunder';

$conn = new mysqli($localhost, $user, $pass, $database);

if($conn -> connect_error){
    die('Connection failed:' . $conn -> connect_error);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (user, email, password) VALUES ('$user', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration completed successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn -> close();
?>