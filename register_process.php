<?php
// Pastikan ada data yang dikirimkan melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Memeriksa apakah semua field sudah diisi
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['no_hp'])) {
        echo "Semua field harus diisi";
    } else {
        // Memproses data yang diterima dari form
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $no_hp = $_POST['no_hp'];

        // Lakukan koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password_db = "";
        $dbname = "tugas_form";

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password_db, $dbname);

        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        // Menyiapkan dan mengeksekusi statement SQL untuk menyimpan data ke dalam database
        $sql = "INSERT INTO user (name, email, password, no_hp) VALUES ('$name', '$email', '$password', '$no_hp')";

        if ($conn->query($sql) === TRUE) {
            header("Location: login.html");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Menutup koneksi
        $conn->close();
    }
} else {
    // Jika metode yang digunakan bukan POST, tampilkan pesan error
    echo "Metode yang digunakan harus POST";
}
?>
