<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location: ../404.php");
}
if (isset($_POST['setting'])) {
    $name = $_POST['name'];
    $id = $_POST['id'];
    $conn = mysqli_connect('localhost', 'root', '', 'toko_kelontong');
    $query = "UPDATE user SET name='$name' WHERE id='$id'";
    mysqli_query($conn, $query);
    echo "<script>alert('Sukses mengganti nama!'); location = 'dashboard.php'</script>";
} else {
    echo "<script>alert('Gagal mengganti nama!'); location = 'setting.php'</script>";
}
