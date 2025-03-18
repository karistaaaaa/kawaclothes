<?php

require 'function.php';

// Cek apakah pengguna sudah login
if (!isset($_SESSION['login'])) {
    header('Location: login.php');
    exit();
}

// Cek apakah role pengguna ada dalam sesi
if (!isset($_SESSION['role'])) {
    header('Location: login.php');
    exit();
}

// Daftar halaman yang boleh diakses setiap role
$akses_admin = ['index.php', 'stock.php', 'masuk.php', 'pelanggan.php'];
$akses_kasir = ['index2.php', 'order.php', 'pelanggan2.php'];
$akses_spg = ['index3.php', 'order.php', 'pelanggan3.php'];

$current_page = basename($_SERVER['PHP_SELF']); // Ambil nama halaman saat ini

// Batasi akses berdasarkan role
if ($_SESSION['role'] === 'admin' && !in_array($current_page, $akses_admin)) {
    header('Location: index.php');
    exit();
} elseif ($_SESSION['role'] === 'kasir' && !in_array($current_page, $akses_kasir)) {
    header('Location: index2.php');
    exit();
} elseif ($_SESSION['role'] === 'spg' && !in_array($current_page, $akses_spg)) {
    header('Location: index3.php');
    exit();
}
?>
