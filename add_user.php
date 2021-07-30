<?php
include "connect.php";

$mysqli = new mysqli('localhost', 'root', '', 'toko_kelontong');
if (isset($_POST['register'])) {
    $name = $mysqli->real_escape_string($_POST['name']);
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    $passwd_hash = password_hash($password, PASSWORD_DEFAULT); // hash password

    $add_data = $mysqli->prepare("insert into user(name,email,password)values(?,?,?)");
    $add_data->bind_param("sss", $name, $email, $passwd_hash);
    if ($add_data->execute()) {
        echo "<script>alert('Selamat Anda Berhasil Mendaftar!'); location = 'register.php'</script>";
    } else {
        echo "<script>alert('Pendaftaran Gagal, Silahkan Dicoba Lagi!'); </script>";
    }

    $mysqli->close();
}
