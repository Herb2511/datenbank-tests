<?php
// Datenbankverbindung aufbauen
$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysqli_error($mysqli));

// Verbindung überprüfen und mögliche Fehlerausgabe
if ($mysqli->connect_errno) {
    printf(" MYSQL-Verbindung fehlgeschlagen %s\n", $mysqli->connect_error);
    exit();
}