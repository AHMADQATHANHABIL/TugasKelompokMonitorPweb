<?php
require "koneksi.php";
if (isset($_POST["register"])) {
    if (register($_POST) > 0) {
        echo "<script>alert('Data baru berhasil ditambah');</script>";
        header("Location: index.php?status=success");
        exit();
    } else {
        echo mysqli_error($con);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="signin.css" />
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form action="" method="post">
                <h1>Buat Akun</h1>
                <div class="social-icons">
                    <a href="index.php" class="icon"><i class='bx bx-home'></i></a>
                    <a href="produk.php" class="icon"><i class='bx bx-cart'></i></a>
                    <a href="about.php" class="icon"><i class='bx bx-info-circle'></i></a>
                    <a href="contact.php" class="icon"><i class='bx bx-message-rounded-dots'></i></a>
                </div>
                <span>Masukkan username dan password Anda!</span>
                <input type="email" name="email" id="regEmail" placeholder="Email" />
                <input type="text" name="username" id="regUsername" placeholder="Username" />
                <input type="password" name="password" id="regPassword" placeholder="Password" />
                <button type="submit" name="register" class="btn btn-primary" onclick="daftar()">Daftar</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form>
                <h1>Login</h1>
                <div class="social-icons">
                    <a href="index.php" class="icon"><i class='bx bx-home'></i></a>
                    <a href="produk.php" class="icon"><i class='bx bx-cart'></i></a>
                    <a href="about.php" class="icon"><i class='bx bx-info-circle'></i></a>
                    <a href="contact.php" class="icon"><i class='bx bx-message-rounded-dots'></i></a>
                </div>
                <span>Gunakan username dan password untuk login</span>
                <input type="text" id="username" placeholder="Username" />
                <input type="password" id="password" placeholder="Password" />
                <button type="button" class="btn btn-primary" onclick="login()">Login</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Selamat datang kembali!</h1>
                    <p>Masukkan detail pribadi Anda untuk menggunakan semua fitur situs</p>
                    <button class="hidden" id="login">Login</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hallo, Teman!</h1>
                    <p>Daftar akunmu untuk menggunakan semua fitur kami</p>
                    <button class="hidden" id="register">Daftar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        function daftar() {
            var regEmail = document.getElementById("regEmail").value;
            var regUsername = document.getElementById("regUsername").value;
            var regPassword = document.getElementById("regPassword").value;

            if (!regEmail || !regUsername || !regPassword) {
                alert("Harap masukkan data dengan benar!");
                return; // Return untuk berhenti ketika ada inputan yang kosong
            }

            // Mengecek apakah data pengguna tersimpan
            var storedPassword = localStorage.getItem(regUsername);

            if (storedPassword === regPassword) {
                alert("Anda sudah terdaftar!");
                window.location.href = "signin.php";
            } else {
                // Jika pengguna belum terdaftar, simpan informasi pendaftaran ke penyimpanan lokal
                localStorage.setItem(regUsername, regPassword);
                alert("Pendaftaran berhasil!");
                window.location.href = "index.php";
            }
        }

        function login() {
            var username = document.getElementById("username").value;
            var password = document.getElementById("password").value;

            if (!username || !password) {
                alert("Harap masukkan data dengan benar!");
                return; // Return untuk berhenti klo ada inputan yg kosong
            }

            // mengambil informasi dari storage / penyimpanan
            var storedPassword = localStorage.getItem(username);

            if (storedPassword === password) {
                alert("Login berhasil!");
                window.location.href = "index.php";
            } else {
                alert("Katasandi Anda salah. Silakan coba lagi.");
            }

            // untuk mereset formulir
            document.getElementById("loginForm").reset();
        }
    </script>

    <script src="script.js"></script>
</body>

</html>