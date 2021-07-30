<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location: ../404.php");
}
?>
<?php
// menyimpan data id kedalam variabel
if (isset($_POST['delete'])) {
    $id_barang  = $_POST['id_barang'];
    // query SQL untuk insert data
    $conn = mysqli_connect('localhost', 'root', '', 'toko_kelontong');
    $query = "DELETE from barang where id_barang='$id_barang'";
    mysqli_query($conn, $query);
    // mengalihkan ke halaman index.php
    echo "<script>alert('Sukses Menghapus Barang!'); location = 'barang.php'</script>";
} else {
    echo "<script>alert('Gagal Menghapus Barang!'); location = 'barang.php'</script>";
}
