<?php
session_start();
if (!isset($_SESSION['login'])) { header("Location: login.php"); exit; }
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nama = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    mysqli_query($koneksi, "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')");
    header("Location: index.php");
}
?>
<h2>Tambah Produk</h2>
<form method="POST">
    <input type="text" name="nama_produk" placeholder="Nama Produk" required><br>
    <input type="number" name="harga" placeholder="Harga" required><br>
    <input type="number" name="stok" placeholder="Stok" required><br>
    <button type="submit" name="submit">Simpan</button>
</form>