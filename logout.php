<?php
require "koneksi.php";

session_unset();
session_destroy();

// Menghapus cookie dan mengarahkan pengguna ke halaman login
setcookie("nonresiliunt", "", time() - 3600, "/");
setcookie("Session", "", time() - 3600, "/");

if (isset($_COOKIE["nonresiliunt"]) && isset($_COOKIE["Session"])) {
    $user_id = $_COOKIE["nonresiliunt"];
    $token = $_COOKIE["Session"];

    // Validasi token pada tabel remember_tokens
    $stmt = $con->prepare("SELECT id FROM pemilik WHERE id = ? AND token = ?");
    $stmt->bind_param("is", $user_id, $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($token_id);
        $stmt->fetch();

  $delete_stmt = $con->prepare("DELETE FROM pemilik WHERE id = ?");
        $delete_stmt->bind_param("i", $token_id);
        $delete_stmt->execute();
        $delete_stmt->close();
    }

    $stmt->close();
}

echo "<script>alert('Berhasil Logout'); document.location.href = 'signin.php'</script>";
exit;