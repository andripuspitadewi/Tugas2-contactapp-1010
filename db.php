<?php
$namaserver = "localhost";
$namapengguna = "root";
$katasandi = "";
$namadb = "tugas_form";

// Membuat koneksi
$conn = mysqli_connect($namaserver, $namapengguna, $katasandi, $namadb);

// Memeriksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Mendapatkan data dari form
$email = $_POST['email'];
$password = $_POST['password'];

// Menghindari SQL Injection
$email = mysqli_real_escape_string($conn, $email);
$password = mysqli_real_escape_string($conn, $password);

// Mencari user dengan email dan password yang sesuai
$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    // Login berhasil, arahkan ke halaman dashboard
    header("Location: dashboard.html");
    exit(); // Pastikan untuk menghentikan eksekusi skrip setelah header() dijalankan
} else {
    // Login gagal
    echo "Login gagal. Email atau password salah.";
}

// Menutup koneksi
mysqli_close($conn);
?>
