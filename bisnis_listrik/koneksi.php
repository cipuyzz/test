<?php
// --- Koneksi Database ---
 $host = 'localhost';
 $user = 'username_db';
 $pass = 'password_db';
 $db   = 'nama_database';

 $conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
