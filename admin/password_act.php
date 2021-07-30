<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location: ../404.php");
}
if (isset($_POST['change_password'])) {
    $password = $_POST['password'];
    $reply_password = $_POST['new_password'];
    if ($password == $reply_password) {
        $id = $_POST['id'];
        $passwd_hash = password_hash($password, PASSWORD_DEFAULT); // hash password
        $conn = mysqli_connect('localhost', 'root', '', 'toko_kelontong');
        $query = "UPDATE user SET password='$passwd_hash' WHERE id='$id'";
        mysqli_query($conn, $query);
        echo "<script>alert('Sukses mengganti password!'); location = 'dashboard.php'</script>";
    } else {
        echo "<script>alert('password tidak cocok!'); location = 'setting.php'</script>";
    }
} else {
    echo "<script>alert('Gagal mengganti password!'); location = 'setting.php'</script>";
}
