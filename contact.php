<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['pesan'];

    // Buat query untuk memasukkan data ke database
    $sql = "INSERT INTO contacts (name, email, pesan) VALUES ('$name', '$email', '$pesan')";

    // Eksekusi query
    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "error";
    }

    // Tutup koneksi
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>RDN STORE</title>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="contact.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <!--navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img height="50%" width="20%" src="images/RDNstore.png" alt="logo" />
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="nav-login">
          <button class="login-btn" onclick="window.location.href='signin.php'">
            <i class='bx bx-log-in'></i>Login
          </button>
            </div>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="bx bx-home"></i>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="produk.php"><i class='bx bx-cart'></i>Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><i class='bx bx-info-circle'></i>About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php"><i class='bx bx-envelope'></i>Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" id="successModal">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Saran Terkirim</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">Saran Anda telah terkirim. Terima kasih!</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>

    <section id="Contact" class="Contact">
        <div class="container">
            <h2>Contact Us</h2>
            <p>
                Have questions or want to inquire about our services? Reach out to us!
            </p>
            <form id="contactForm" method="POST" action="submit_contact.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Anda</label>
                    <input type="text" class="form-control" id="name" name="name" required />
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Anda</label>
                    <input type="email" class="form-control" id="email" name="email" required />
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan Anda</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" onclick="submitForm()">Kirim</button>
            </form>
        </div>
    </section>
</body>
</html>
