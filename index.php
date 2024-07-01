<?php
session_start();
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $sql = "SELECT id, email, password FROM users WHERE email = '$email'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $_SESSION['loggedin'] = true;
      $_SESSION['email'] = $email;
      // Redirect using JavaScript
      echo "<script>
                    alert('Login successful! Redirecting to homepage...');
                    window.location.href='index.php';
                  </script>";
      exit;
    } else {
      $error = "Invalid password.";
    }
  } else {
    $error = "No account found with that email.";
  }
}

mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <title>RDN STORE</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cute+Font&display=swap" rel="stylesheet" />
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Cute+Font&family=Honk&display=swap" rel="stylesheet" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img class="img-fluid" src="images/RDNstore.png" alt="Logo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="nav-login">
        <button class="login-btn" onclick="window.location.href='signin.php'">
          <i class='bx bx-log-in'></i>Login
        </button>
        <button class="logout-btn" onclick="window.location.href='logout.php'">
          <i class="bx bx-log-out-circle"></i>Logout
        </button>
      </div>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="nav-center">
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
    </div>
  </nav>


  <!-- Hero Section -->
  <section class="hero">
    <div class="container-fluid text-banner">
      <h1 class="display-4" style="margin-top: -150px">
        WELCOME TO RDN STORE
      </h1>
      <div style="margin-top: 10px; font-size: 2.5em">
        <p class="lead">Enjoy the shopping</p>
      </div>
      <a href="produk.php" class="btn btn-primary btn-lg" style="font-size: 0.8em">View Product</a>
    </div>
  </section>

  <footer class="footer">
    <div class="container-fluid text-center">
      <p>&copy; 2024 </p>
    </div>
  </footer>
  <script src="script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>