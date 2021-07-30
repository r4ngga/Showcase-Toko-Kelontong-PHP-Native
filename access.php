<?php
include 'connect.php';
$mysqli = new mysqli('localhost', 'root', '', 'toko_kelontong');
if (isset($_POST['access'])) {
    // $email =  $_POST['email'];
    // $password = $_POST['password'];
    $email = $mysqli->real_escape_string($_POST['email']);
    $password = $mysqli->real_escape_string($_POST['password']);
    //cek user login 
    $cek_login = $mysqli->query("select * from user where email='$email'");
    $ktm_login = $cek_login->num_rows;
    $data_login = $cek_login->fetch_assoc();

    if ($ktm_login >= 1) {
        //login email tersedia
        //verify password 
        if (password_verify($password, $data_login['password'])) {
            session_start();
            $_SESSION['id'] = $data_login['id'];
            $_SESSION['name'] = $data_login['name'];
            $_SESSION['email'] = $data_login['email'];
            echo "<script>alert('Selamat Anda Berhasil Login!'); location = 'admin/dashboard.php'</script>";
            //silakan buat session dan redirect disini

            //redircet 
            //header("location:index.php");
        } else {
            echo "<script>alert('Login gagal!'); location = 'login.php'</script>";
        }
    } else {
        //login gagal, email tidak tersedia
        echo "<script>alert('Login gagal, Email tidak tersedia!'); location = 'login.php'</script>";
    }

    $mysqli->close();
}
// $email = $_POST['email'];
// $password = $_POST['password'];
// $query = "SELECT COUNT(email) AS jumlah FROM user  WHERE email='$email' AND password='$password'";
// $exec_query = mysqli_query($conn, $query);
// $data = mysqli_fetch_array($exec_query);

// if ($data['jumlah'] >= 1) {
//     session_start();
//     $_SESSION['email']  = $emai;
//     $_SESSION['password']  = $password;
//     $_SESSION['name'] = $name;
//     $email  = $_SESSION['email'];
//     $name = $_SESSION['name'];

//     header('location:admin/dashboard.php');
// } else {
//     header('location:login.php');
// }
