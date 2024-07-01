<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "co";

$conn = mysqli_connect($servername, $username, $password, $database);

// Periksa koneksi
if (!$conn) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}
function register($data) {
    global $con;

    $username = strtolower(htmlspecialchars($data["username"]));
    $email = strtolower(htmlspecialchars($data["email"]));
    $password = mysqli_real_escape_string($con, $data["password"]);


    $password = password_hash($password, PASSWORD_DEFAULT);
    
    $sql = "INSERT INTO users VALUES ('','$username', '$email', '$password')"; 

    mysqli_query($con,$sql);
}

?>