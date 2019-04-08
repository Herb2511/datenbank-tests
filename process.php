<?php

// Browser Session wird gestartet (notwending für die Meldungen und Aktivitäten zum Speichern, löschen und bearbeiten.)
session_start();

// Datenbankverbindung aufbauen.
$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysql_error($mysqli));

// Überprüfen, ob der Button Name "speichern" mit der Methode "POST" aus dem Formular geklickt wurde und erstellen von Variablen.
if (isset($_POST['speichern'])) {
    $produktname = $_POST['produktbezeichnung'];
    $produktpreis = $_POST['produktpreis'];

    // Speichern in die Datenbank.
    $mysqli->query("INSERT INTO produkte (Produktbezeichnung, Produktpreis) VALUES('$produktname', '$produktpreis')") or die($mysqli->error);

    // Meldungen in einer Session über erfolgreiches Speichern mit definierter Bootstrap Klasse "success".
    $_SESSION['message'] = "Produkt wurde gespeichert!";
    $_SESSION['msg_type'] = "success";

    // Redirect nach dem Speichern zur index.php Seite.
    header("location: index.php");
}
// Überprüfen, ob der Button Name "delete" geklickt wurde und mit der Methode "GET" die Daten löschen.
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM produkte WHERE ProduktID=$id") or die($mysqli->error);

    // Meldungen in einer Session über erfolgreiches Löschen mit definierter Bootstrap Klasse "danger".
    $_SESSION['message'] = "Produkt wurde gelöscht!";
    $_SESSION['msg_type'] = "danger";

    // Redirect nach dem Löschen zur index.php Seite.
    header("location: index.php");
}

// Überprüfen, ob der Button Name "bearbeiten" geklickt wurde und mit der Methode "GET" die Daten bearbeiten.
if (isset($_GET['edit'])) {
    $id = $_GET['id'];
    $result = $mysqli->query("SELECT * FROM produkte WHERE ProduktID=$id") or die($mysqli->error());

//     // Überprüfen, ob die Datei überhaupts existiert.
    if (count(result) == 1) {
        $row = $result->fetch_array();
        $produktname = $row['Produktbezeichnung'];
        $produktpreis = $row['Produktpreis'];
    }
}

?>