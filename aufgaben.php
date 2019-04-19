<?php

// Browser Session wird gestartet (notwending für die Meldungen und Aktivitäten zum Speichern, löschen und bearbeiten pro Session.)
session_start();

// Datenbankverbindung aufbauen.
$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysql_error($mysqli));

// Alle Produkte aus der Datenbank in Variable $result schreiben.
$result = $mysqli->query("SELECT * FROM produkte LEFT JOIN bilder ON ProduktBildID = BildID") or die($mysqli->error);

// Verstecktes Input Feld für die Verknüpfung der ID mit der POST Methode.
$id = 0;

// Datumsausgabe in der Meldung/message definieren.
$datum = date("d.m.Y - H:i");

// Erst nach Klicken des "Speichern" Buttons wird der Wert der Variable $update auf "true" gesetzt. Dieser steht anfangs auf "false".
$update = false;

// Rückgabewert für das Einsetzen eines leeren Strings in den Wert "values" im Formular unter neues-rezept.php.
$produktname = '';
$produktpreis = '';
$produktbeschreibung = '';
$produktschwierigkeitsgrad = '';
$produktkategorie = '';
$produktdauer = '';
$produktbild = '';

// SPEICHERN
// Überprüfen, ob der Button Name "speichern" mit der Methode "POST" aus dem Formular geklickt wurde und erstellen von Variablen.
if (isset($_POST['speichern'])) {
    $produktname = $_POST['produktbezeichnung'];
    $produktpreis = $_POST['produktpreis'];
    $produktbeschreibung = $_POST['produktbeschreibung'];
    $produktschwierigkeitsgrad = $_POST['difficulty'];
    $produktkategorie = $_POST['category'];
    $produktdauer = $_POST['duration'];
    $produktbild  = $_POST['userfile[]'];


    // Speichern in die Datenbank.
    $mysqli->query("INSERT INTO produkte (Produktbezeichnung, Produktpreis, Produktbeschreibung, ProduktSchwierigkeitsgrad, ProduktKategorie, ProduktDauer, ProduktBildID) VALUES('$produktname', '$produktpreis', '$produktbeschreibung', '$produktschwierigkeitsgrad', '$produktkategorie', '$produktdauer', '$produktbild')") or die($mysqli->error);







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
        $produktbeschreibung = $row['Produktbeschreibung'];
        $produktschwierigkeitsgrad = $row['ProduktSchwierigkeitsgrad'];
        $produktkategorie = $row['ProduktKategorie'];
        $produktdauer = $row['ProduktDauer'];
    }
}

// AKTUALISIEREN
// Überprüfen, ob der Button Name "update" geklickt wurde und mit der Methode "POST" die Daten bearbeiten und zurück zur index.php Seite routen.
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $produktname = $_POST['produktbezeichnung'];
    $produktpreis = $_POST['produktpreis'];
    $produktbeschreibung = $_POST['produktbeschreibung'];
    $produktschwierigkeitsgrad = $_POST['difficulty'];
    $produktkategorie = $_POST['category'];
    $produktdauer = $_POST['duration'];

    $mysqli->query("UPDATE produkte SET Produktbezeichnung='$produktname', Produktpreis='$produktpreis', Produktbeschreibung='$produktbeschreibung', ProduktSchwierigkeitsgrad='$produktschwierigkeitsgrad', ProduktKategorie='$produktkategorie', ProduktDauer='$produktdauer'  WHERE ProduktID='$id'") or die($mysqli->error);

    $_SESSION['message'] = "Rezept $produktname wurde am $datum aktualisiert!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}

// Select Elemente ANZEIGEN und den Fokus setzen.
// Werte aus der Tabelle Schwierigkeitsgrad holen und in Variable $option1 legen.
$difficulty = $mysqli->query("SELECT SchwierigkeitsgradName FROM schwierigkeitsgrad ORDER BY SchwierigkeitsgradID ASC") or die($mysqli->error);
$option1 = '';
while ($row = mysqli_fetch_assoc($difficulty)) {

    if ($row['SchwierigkeitsgradName'] == $produktschwierigkeitsgrad) {
        $option1 .= '<option selected value = "' . $row['SchwierigkeitsgradName'] . '">' . $row['SchwierigkeitsgradName'] . '</option>';
    } else {
        $option1 .= '<option value = "' . $row['SchwierigkeitsgradName'] . '">' . $row['SchwierigkeitsgradName'] . '</option>';
    }
}

// Werte aus der Tabelle Schwierigkeitsgrad holen und in Variable $option2 legen.
$category = $mysqli->query("SELECT RezeptKategorieName FROM rezept_kategorie ORDER BY RezeptKategorieID ASC") or die($mysqli->error);
$option2 = '';
while ($row = mysqli_fetch_assoc($category)) {

    if ($row['RezeptKategorieName'] == $produktkategorie) {
        $option2 .= '<option selected value = "' . $row['RezeptKategorieName'] . '">' . $row['RezeptKategorieName'] . '</option>';
    } else {
        $option2 .= '<option value = "' . $row['RezeptKategorieName'] . '">' . $row['RezeptKategorieName'] . '</option>';
    }
}

// Werte aus der Tabelle Schwierigkeitsgrad holen und in Variable $option3 legen.
$duration = $mysqli->query("SELECT DauerName FROM dauer ORDER BY DauerID ASC") or die($mysqli->error);
$option3 = '';
while ($row = mysqli_fetch_assoc($duration)) {

    if ($row['DauerName'] == $produktdauer) {
        $option3 .= '<option selected value = "' . $row['DauerName'] . '">' . $row['DauerName'] . '</option>';
    } else {
        $option3 .= '<option value = "' . $row['DauerName'] . '">' . $row['DauerName'] . '</option>';
    }
}


// --------------------------------------------------------------------------------------------------------------------------
// Bilderupload und Speichern in der Datenbank.

// Fehlermeldungsausgabe.
$phpFileUploadErrors = array(
    0 => 'Der Bildupload war erfolgreich!',
    1 => 'Der Bildupload übersteigt die maximale Dateispeichergröße. Diese ist in der php.ini einzustellen.',
    2 => 'Der Bildupload übersteigt die MAX_FILE_SIZE . Diese ist in der HTML form vorgeschrieben.',
    3 => 'Die Bilddatei wurde nur zum Teil hochgeladen.',
    4 => 'Keine Bilddatei wurde hochgeladen.',
    6 => 'Es fehlt der temporäre Ordner.',
    7 => 'Fehler beim Schreiben der Datei auf den Server.',
    8 => 'Eine PHP Erweiterung stoppte den Bilderupload.',
);

// $_$FILES global variable
if (isset($_FILES['userfile'])) {
    $file_array = reArrayFiles($_FILES['userfile']);
    // pre_r($file_array);
    for ($i = 0; $i < count($file_array); $i++) {
        if ($file_array[$i]['error']) {
            ?> <div class="alert alert danger">
                <?php echo $file_array[$i]['name'] . ' - ' . $phpFileUploadErrors[$file_array[$i]['error']];
                ?> </div>
        <?php

    } else {

        $extensions = array('jpg', 'png', 'gif', 'jpeg');

        $file_ext = explode('.', $file_array[$i]['name']);

        // pre_r($file_ext);die;
        // Bildformatierung des Namens in der Datenbank.
        $name = $file_ext[0];
        $name = preg_replace("!-!", " ", $name);
        $name = ucwords($name);

        $file_ext = end($file_ext);

        if (!in_array($file_ext, $extensions)) {
            ?> <div class="alert alert-danger">
                    <?php echo "{$file_array[$i]['name']}";
                    ?> </div> <?php                                  
        } 
        else
        {

                // Daten Upload mit Name und Speicherort.
                $img_dir = 'images/web/' . $file_array[$i]['name'];

                move_uploaded_file($file_array[$i]['tmp_name'],$img_dir);

                // SQL Statement: Speichern des Namens und des Speicherorts in die Datenbank.
                $sql = "INSERT IGNORE INTO bilder (BildName,BildVerzeichnis) VALUES('$name','$img_dir')";
                $mysqli->query($sql) or die($mysqli->error);

                    ?> <div class="alert alert-success">
                    <?php echo $file_array[$i]['name'] . ' - ' . $phpFileUploadErrors[$file_array[$i]['error']];
                    ?> </div> <?php
        }
                                    }
                                }
                            }

                            function reArrayFiles(&$file_post)
                            {

                                $file_ary = array();
                                $file_count = count($file_post['name']);
                                $file_keys = array_keys($file_post);

                                for ($i = 0; $i < $file_count; $i++) {
                                    foreach ($file_keys as $key) {
                                        $file_ary[$i][$key] = $file_post[$key][$i];
                                    }
                                }

                                return $file_ary;
                            }

                            // function pre_r($array)
                            // {
                            //     echo '<pre>';
                            //     print_r($array);
                            //     echo '</pre>';
                            // }

// Bilder aus der Datenbank abfragen.
$bilder = $mysqli->query("SELECT BildVerzeichnis, BildName FROM bilder WHERE BildID = '1'") or die($mysqli->error);

// Mit einer While-Schleife alle Bilder aus der Datenbank darstellen.
$data = $bilder->fetch_assoc();
    // print_r($data);
    // echo "<h2>{$data['BildName']}</h2>";
    // echo "<img src='{$data['BildVerzeichnis']}' width='20%' height='20%' title='{$data['BildName']}' alt='{$data['BildName']}'>";
                            
