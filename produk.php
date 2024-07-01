<?php
require 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $productColor = $_POST['productColor'];
  $productCapacity = $_POST['productCapacity'];

  // Validate inputs
  if (!empty($productColor) && !empty($productCapacity)) {
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("INSERT INTO product_info (color, capacity) VALUES (?, ?)");
    $stmt->bind_param("ss", $productColor, $productCapacity);

    if ($stmt->execute()) {
      echo "Product information saved successfully!";
    } else {
      echo "Error: " . $stmt->error;
    }

    $stmt->close();
  } else {
    echo "All fields are required.";
  }

  $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>RDN STORE</title>
  <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="produk.css" />
  <!-- Custom CSS -->
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">
        <img class="img-fluid" width="350px" src="images/RDNstore.png" alt="Logo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <div class="nav-login">
          <button class="login-btn" onclick="window.location.href='signin.php'">
            <i class='bx bx-log-in'></i>Login
          </button>
        </div>
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
  <section id="Product" class="Product">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/g14.png" class="card-img-top" height="305" alt="G14" />
            <div class="card-body">
              <h5 class="card-title" value="Asus ROG Strix G14">Asus ROG Zephyrus G14</h5>
              <p class="card-text">Black</p>
              <p class="card-text">1TB/32GB</p>
              <p class="card-text"><strong>Rp.30jt</strong></p>
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulir untuk memilih warna Laptop dan kapasitas -->
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Black">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="512GB">512GB</option>
                            <option value="1TB">1TB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>
              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "signin.php";
                    }
                  });
              </script>

            </div>
          </div>
        </div>
        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/a15.png" class="card-img-top" alt="A15" />
            <div class="card-body">
              <h5 class="card-title" value="Asus TUF Gaming A15">Asus TUF Gaming A15</h5>
              <p class="card-text">Black</p>
              <p class="card-text">512GB/8GB</p>
              <p class="card-text"><strong>Rp.15.4jt</strong></p>
              <!-- Formulir/modal untuk memilih informasi tambahan -->
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulir untuk memilih warna Laptop dan kapasitas -->
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Black">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="512GB">512GB</option>
                            <option value="1 TB">1 TB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>

              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "login1.php";
                    }
                  });
              </script>
            </div>
          </div>
        </div>
        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/HELIOS 300.jpg" class="card-img-top" alt="HELIOS 300" />
            <div class="card-body">
              <h5 class="card-title" value="Acer Predator Helios 300 ">Acer Predator Helios 300</h5>
              <p class="card-text">black</p>
              <p class="card-text">512GB/16GB</p>
              <p class="card-text"><strong>Rp.19,5jt</strong></p>
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulir untuk memilih warna laptop dan kapasitas -->
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Black">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="512GB">512GB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>
              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "login1.php";
                    }
                  });
              </script>
            </div>
          </div>
        </div>
        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/N5.jpg" class="card-img-top" alt="Acer Nitro 5" />
            <div class="card-body">
              <h5 class="card-title" value="Acer Nitro 5">Acer Nitro 5</h5>
              <p class="card-text">black</p>
              <p class="card-text">512GB/8GB</p>
              <p class="card-text"><strong>Rp.13jt</strong></p>
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulir untuk memilih warna Laptop dan kapasitas -->
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Black">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="64GB">64GB</option>
                            <option value="256GB">256GB</option>
                            <option value="512GB">512GB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>
              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "login1.php";
                    }
                  });
              </script>
            </div>
          </div>
        </div>
        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/OMEN15.jpg" class="card-img-top" alt="Laptop" />
            <div class="card-body">
              <h5 class="card-title" value="HP Omen 15">HP Omen 15</h5>
              <p class="card-text">Black</p>
              <p class="card-text">512GB/8GB</p>
              <p class="card-text"><strong>Rp.16jt</strong></p>
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulir untuk memilih warna Laptop dan kapasitas -->
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Black">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="512GB">512GB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>
              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "login1.php";
                    }
                  });
              </script>
            </div>
          </div>
        </div>
        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/P15.jpg" class="card-img-top" height="305" alt="Laptop" />
            <div class="card-body">
              <h5 class="card-title" value="HP Pavilion Gaming">HP Pavilion Gaming</h5>
              <p class="card-text">Black</p>
              <p class="card-text">512GB/16</p>
              <p class="card-text"><strong>Rp.21jt</strong></p>
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulir untuk memilih warna Laptop dan kapasitas -->
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Black">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="512GB">512GB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>
              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "login1.php";
                    }
                  });
              </script>
            </div>
          </div>
        </div>
        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/G5.jpg" class="card-img-top" height="305" alt="Laptop" />
            <div class="card-body">
              <h5 class="card-title" value="Dell G5 15">Dell G5 15</h5>
              <p class="card-text">Black</p>
              <p class="card-text">1TB/32GB</p>
              <p class="card-text"><strong>Rp.27jt</strong></p>
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulir untuk memilih warna Laptop dan kapasitas -->
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Black">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="1TB">1TB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>
              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "login1.php";
                    }
                  });
              </script>
            </div>
          </div>
        </div>

        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/M15.jpg" class="card-img-top" alt="Laptop" />
            <div class="card-body">
              <h5 class="card-title" value="Dell Alienware M15">Dell Alienware M15</h5>
              <p class="card-text"> Hitam, Putih</p>
              <p class="card-text">1TB/32GB</p>
              <p class="card-text"><strong>Rp.27jt</strong></p>
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Hitam">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="512GB">1TB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>
              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "signin.php";
                    }
                  });
              </script>
            </div>
          </div>
        </div>
        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/Ideapad5.jpg" class="card-img-top" height="305" alt="Laptop" />
            <div class="card-body">
              <h5 class="card-title" value="Lenovo Ideapad Gaming 3">Lenovo Ideapad Gaming 3</h5>
              <p class="card-text">Black</p>
              <p class="card-text">512GB/16GB</p>
              <p class="card-text"><strong>Rp.19jt</strong></p>
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulir untuk memilih warna Laptop dan kapasitas -->
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Black">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="512GB">512GB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>
              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "login1.php";
                    }
                  });
              </script>
            </div>
          </div>
        </div>
        <div class="col-lg-3 menu-item">
          <div class="card">
            <img src="images/Legion5.jpg" class="card-img-top" height="305" alt="Laptop" />
            <div class="card-body">
              <h5 class="card-title" value="Lenovo Legion 5">Lenovo Legion 5</h5>
              <p class="card-text">Black</p>
              <p class="card-text">512/16GB</p>
              <p class="card-text"><strong>Rp.18jt</strong></p>
              <div class="modal" id="productInfoModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Pilih Informasi Tambahan</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <!-- Formulir untuk memilih warna Laptop dan kapasitas -->
                      <form id="productInfoForm">
                        <div class="mb-3">
                          <label for="productColor" class="form-label">Warna:</label>
                          <select class="form-select" id="productColor" required>
                            <option value="">Pilih warna...</option>
                            <option value="Black">Hitam</option>
                          </select>
                        </div>
                        <div class="mb-3">
                          <label for="productCapacity" class="form-label">Kapasitas:</label>
                          <select class="form-select" id="productCapacity" required>
                            <option value="">Pilih kapasitas...</option>
                            <option value="512gb">512GB</option>
                          </select>
                        </div>
                      </form>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                      <button type="button" class="btn btn-primary" id="continueToCheckout">Lanjutkan</button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Tombol "Beli" -->
              <a href="#" class="btn btn-primary btn-lg" id="beliButton" data-bs-toggle="modal"
                data-bs-target="#productInfoModal">Beli</a>

              <script>
                // Fungsi untuk menangani klik tombol "Lanjutkan"
                document.getElementById("continueToCheckout").addEventListener("click", function () {
                  // Ambil nilai warna yang dipilih oleh pengguna
                  var selectedColor = document.getElementById("productColor").value;

                  // Lakukan sesuatu dengan nilai warna yang dipilih (misalnya, tambahkan ke keranjang)
                  // ...

                  // Setelah selesai, tutup modal
                  var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
                  modal.hide();
                });
              </script>
              <script>
                document
                  .getElementById("beliButton")
                  .addEventListener("click", function () {
                    // Periksa apakah pengguna sudah login atau belum
                    if (userLoggedIn) {
                      // Jika sudah login, arahkan ke halaman pembelian
                      window.location.href = "buy.php";
                    } else {
                      // Jika belum login, arahkan ke halaman login
                      window.location.href = "login1.php";
                    }
                  });
              </script>
            </div>
          </div>
        </div>
        <script>
          // Fungsi untuk menangani klik tombol "Lanjutkan"
          document.getElementById("continueToCheckout").addEventListener("click", function () {
            // Ambil nilai warna yang dipilih oleh pengguna
            var selectedColor = document.getElementById("productColor").value;

            window.location.href = "buy.php";

            // Setelah selesai, tutup modal
            var modal = bootstrap.Modal.getInstance(document.getElementById("productInfoModal"));
            modal.hide();
          });
        </script>
        <!-- Add more columns as needed -->
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>