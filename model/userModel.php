<?php

require_once 'config/conn.php';

class UserModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Metode untuk memeriksa kredensial pengguna
    public function checkCredentials($username, $password) {
        // Persiapkan statement SQL untuk memeriksa kredensial pengguna
        $sql = "SELECT * FROM users WHERE username = ? AND password = ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("Error dalam persiapan pernyataan SQL: " . $this->conn->error);
        }
        $stmt->bind_param("ss", $username, $password);

        // Eksekusi statement SQL
        $stmt->execute();

        // Ambil hasil dari eksekusi statement
        $result = $stmt->get_result();

        // Periksa apakah pengguna dengan kredensial yang diberikan ditemukan
        if ($result->num_rows > 0) {
            return true; // Kredensial valid
        } else {
            return false; // Kredensial tidak valid
        }
    }
}

?>
