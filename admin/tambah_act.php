<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("location: ../404.php");
}
?>
<?php
if (isset($_POST['insert'])) {
    if (isset($_FILES['image'])) {
        $gambar_barang = $_FILES['image']['name'];
        $target = "images/" . basename($_FILES['image']['name']);
        $nama_barang = $_POST['nama_barang'];
        //query untuk simpan barang
        $koneksikan = mysqli_connect('localhost', 'root', '', 'toko_kelontong');
        $query = "INSERT INTO barang SET nama_barang='$nama_barang', gambar_barang='$gambar_barang'";
        $prosesquery = mysqli_query($koneksikan, $query);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            echo "Gambar barang berhasil diupload";
        } else {
            echo "gagl upload";
        }
    }
    echo "<script>alert('Sukses Menambahkan Barang!'); location = 'barang.php'</script>";
} else {
    echo "<script>alert('Gagal Menambahkan Barang!'); location = 'tambah.php'</script>";
}
