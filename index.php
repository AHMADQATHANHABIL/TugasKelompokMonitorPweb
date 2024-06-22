<?php
include 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library System</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="wrapper">
        <!-- Login Form -->
        <form action="" class="form-login" onsubmit="showLibraryMenu(event)">
            <h1>Login</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox"> Remember me</label>
                <a href="#">Forgot Password</a>
            </div>
            <button type="submit" class="btn">Login</button>
            <div class="register-link">
                <p>Don't have an account <a href="#" onclick="toggleForms()">Register</a></p>
            </div>
        </form>

        <!-- Register Form -->
        <form action="" class="form-register" style="display:none;" onsubmit="showLibraryMenu(event)">
            <h1>Register</h1>
            <div class="input-box">
                <input type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
            </div>
            <div class="input-box">
                <input type="email" placeholder="Email" required>
                <i class='bx bxs-envelope'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Confirm Password" required>
                <i class='bx bxs-lock-alt'></i>
            </div>
            <button type="submit" class="btn">Register</button>
            <div class="register-link">
                <p>Already have an account? <a href="#" onclick="toggleForms()">Login</a></p>
            </div>
        </form>
    </div>

    <!-- Library Menu -->
    <div class="library-menu" style="display:none;">
        <h1>Library Catalog</h1>
        <form method="GET" action="index.php">
            <input type="text" name="search" placeholder="Search books...">
            <button type="submit" class="btn">Search</button>
        </form>
        <div class="book-list">
            <?php
            $search = isset($_GET['search']) ? $_GET['search'] : '';
            $sql = "SELECT books.id, books.title, books.author, categories.name AS category FROM books JOIN categories ON books.category_id = categories.id WHERE books.title LIKE '%$search%' OR books.author LIKE '%$search%'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div class='book-item'>";
                    echo "<h2>" . $row["title"]. "</h2>";
                    echo "<p>Author: " . $row["author"]. "</p>";
                    echo "<p>Category: " . $row["category"]. "</p>";
                    echo "</div>";
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>

    <script>
        function toggleForms() {
            const loginForm = document.querySelector('.form-login');
            const registerForm = document.querySelector('.form-register');
            loginForm.style.display = loginForm.style.display === 'none' ? 'block' : 'none';
            registerForm.style.display = registerForm.style.display === 'none' ? 'block' : 'none';
        }

        function showLibraryMenu(event) {
            event.preventDefault();
            document.querySelector('.wrapper').style.display = 'none';
            document.querySelector('.library-menu').style.display = 'block';
        }
    </script>
</body>
</html>
