<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Bersihkan data untuk menghindari SQL injection
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $message = mysqli_real_escape_string($conn, $message);

    // Buat query untuk memasukkan data ke database
    $sql = "INSERT INTO contacts (name, email, message) VALUES ('$name', '$email', '$message')";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "<script type='text/javascript'>
                alert('Pesan terkirim!');
                window.location.href = 'index.php'; // Ganti dengan halaman yang diinginkan setelah sukses
              </script>";
    } else {
        echo "<script type='text/javascript'>
                alert('Pesan gagal terkirim.');
                window.location.href = 'error_page.php'; // Ganti dengan halaman yang diinginkan setelah gagal
              </script>";
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>
