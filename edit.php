<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }
include 'koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM produk WHERE id=$id"));

if (isset($_POST['update'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "UPDATE produk SET nama_produk='$nama', harga='$harga', stok='$stok' WHERE id=$id");
    header("Location: index.php");
}
?>
<h2>Edit Produk</h2>
<form method="POST">
    <input type="text" name="nama_produk" value="<?= $data['nama_produk']; ?>" required><br>
    <input type="number" name="harga" value="<?= $data['harga']; ?>" required><br>
    <input type="number" name="stok" value="<?= $data['stok']; ?>" required><br>
    <button type="submit" name="update">Update</button>
</form>