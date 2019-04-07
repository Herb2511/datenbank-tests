<?php

// Datenbankverbindung herstellen.
$con = mysqli_connect('localhost', 'root', '', 'test');

// Verbindung überprüfen.
// if (!$con) {
//     echo 'Nicht verbunden';
// }
// if (!mysqli_select_db($con, 'test')) {
//     echo 'Datenbank nicht ausgewählt';
// }

// Variablen definieren und aus dem Formular aus index.php verknüpfen.
$Name = $_POST['produktbezeichnung'];
$Preis = $_POST['produktpreis'];

// Verknüpfte Variablen in die Datenbank schreiben mit INSERT.
$sql = "INSERT INTO produkte (Produktbezeichnung, Produktpreis) VALUES('$Name', '$Preis')";

// Speichern bestätigen mit Uhrzeit.
if (!mysqli_query($con, $sql)) {
    echo 'Nicht gespeichert!';
} else {
    echo 'Gespeichert am ';
    echo date("D,d M Y");
    echo ' um ';
    echo date("H:i:s");
    echo '.';
}

// Nach drei Sekunden wird die Eingabeseite neu geladen.
header("refresh:3; url=index.php");
