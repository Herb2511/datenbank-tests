<?php

// Browser Session wird gestartet (notwending für die Meldungen und Aktivitäten zum Speichern, löschen und bearbeiten pro Session.)
session_start();

// Datenbankverbindung aufbauen.
$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysql_error($mysqli));

// Verstecktes Input Feld für die Verknüpfung der ID mit der POST Methode.
$id = 0;

// Erst nach Klicken des "Speichern" Buttons wird der Wert der Variable $update auf "true" gesetzt. Dieser steht anfangs auf "false".
$update = false;

// Rückgabewert für das Einsetzen eines leeren Strings in den Wert "values" im Formular unter neues-rezept.php.
$produktname = '';
$produktpreis = '';
$produktbeschreibung = '';
$produktschwierigkeitsgrad = '';
$produktkategorie = '';
$produktdauer = '';

// Datumsausgabe in der Meldung definieren.
$datum = date("d.m.Y - H:i");








// Werte aus der Tabelle Schwierigkeitsgrad holen und in <option></option> legen.
$difficulty = $mysqli->query("SELECT SchwierigkeitsgradName FROM schwierigkeitsgrad ORDER BY SchwierigkeitsgradID ASC") or die($mysqli->error);
$option = '';
while ($row = mysqli_fetch_assoc($difficulty)) {
    $option .= '<option value = "' . $row['SchwierigkeitsgradName'] . '">' . $row['SchwierigkeitsgradName'] . '</option>';
}

// Werte aus der Tabelle Rezeptkategorie holen und in <options></options> legen.
$category = $mysqli->query("SELECT RezeptKategorieName FROM rezept_kategorie ORDER BY RezeptKategorieID ASC") or die($mysqli->error);
$options = '';
while ($row = mysqli_fetch_assoc($category)) {
    $options .= '<option value = "' . $row['RezeptKategorieName'] . '">' . $row['RezeptKategorieName'] . '</option>';
}

// Werte aus der Tabelle Dauer holen und in <optionss></optionss> legen.
$duration = $mysqli->query("SELECT DauerName FROM dauer ORDER BY DauerID ASC") or die($mysqli->error);
$optionss = '';
while ($row = mysqli_fetch_assoc($duration)) {
    $optionss .= '<option value = "' . $row['DauerName'] . '">' . $row['DauerName'] . ' Min.</option>';
}










// SPEICHERN
// Überprüfen, ob der Button Name "speichern" mit der Methode "POST" aus dem Formular geklickt wurde und erstellen von Variablen.
if (isset($_POST['speichern'])) {
    $produktname = $_POST['produktbezeichnung'];
    $produktpreis = $_POST['produktpreis'];
    $produktbeschreibung = $_POST['produktbeschreibung'];
    $produktschwierigkeitsgrad = $_POST['difficulty'];
    $produktkategorie = $_POST['category'];
    $produktdauer = $_POST['duration'];

    // Speichern in die Datenbank.
    $mysqli->query("INSERT INTO produkte (Produktbezeichnung, Produktpreis, Produktbeschreibung, ProduktSchwierigkeitsgrad, ProduktKategorie, ProduktDauer) VALUES('$produktname', '$produktpreis', '$produktbeschreibung', '$produktschwierigkeitsgrad', '$produktkategorie', '$produktdauer')") or die($mysqli->error);

    // Meldungen in einer Session über erfolgreiches Speichern mit definierter Bootstrap Klasse "success".
    $_SESSION['message'] = "Rezept $produktname wurde gespeichert am $datum!";
    $_SESSION['msg_type'] = "success";

    // Redirect nach dem Speichern zur index.php Seite.
    header("location: index.php");
}

// LÖSCHEN
// Überprüfen, ob der Button Name "delete" geklickt wurde und mit der Methode "GET" die Daten löschen.
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM produkte WHERE ProduktID=$id") or die($mysqli->error);

    // Meldungen in einer Session über erfolgreiches Löschen mit definierter Bootstrap Klasse "danger".
    $_SESSION['message'] = "Rezept $produktname wurde am $datum gelöscht!";
    $_SESSION['msg_type'] = "danger";


    // Redirect nach dem Löschen zur index.php Seite.
    header("location: index.php");
}

// ÄNDERN
// Überprüfen, ob der Button Name "edit" geklickt wurde und mit der Methode "GET" die Daten bearbeiten. Danach wird der Button "Update" in der index.php wieder zu "Speichern" gesetzt.
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM produkte WHERE ProduktID=$id") or die($mysqli->error());

    // Überprüfen, ob die Datei überhaupts existiert.
    if (@count($result) == 1) {
        $row = $result->fetch_array();
        $produktname = $row['Produktbezeichnung'];
        $produktpreis = $row['Produktpreis'];
    }
}

// AKTUALISIEREN
// Überprüfen, ob der Button Name "update" geklickt wurde und mit der Methode "POST" die Daten bearbeiten und zurück zur index.php Seite routen.
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $produktname = $_POST['produktbezeichnung'];
    $produktpreis = $_POST['produktpreis'];

    $mysqli->query("UPDATE produkte SET Produktbezeichnung='$produktname', Produktpreis='$produktpreis' WHERE ProduktID='$id'") or die($mysqli->error);

    $_SESSION['message'] = "Rezept $produktname wurde am $datum aktualisiert!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}
