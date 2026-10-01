<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
include 'koneksi.php';
?>
<h2>Selamat Datang, <?= $_SESSION['nama']; ?>!</h2>
<a href="tambah.php">+ Tambah Produk</a> | <a href="logout.php">Logout</a>
<br><br>
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama Produk</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>
    <?php
    $no = 1;
    $query = mysqli_query($koneksi, "SELECT * FROM produk");
    while ($row = mysqli_fetch_assoc($query)) :
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $row['nama_produk']; ?></td>
        <td>Rp <?= number_format($row['harga']); ?></td>
        <td><?= $row['stok']; ?></td>
        <td>
            <a href="edit.php?id=<?= $row['id']; ?>">Edit</a> | 
            <a href="hapus.php?id=<?= $row['id']; ?>" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>