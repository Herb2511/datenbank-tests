<?php

// Browser Session wird gestartet (notwending für die Meldungen und Aktivitäten zum Speichern, löschen und bearbeiten pro Session.)
session_start();

// Datenbankverbindung einbinden
include 'db-verbindung.php';

// Alle Produkte aus der Datenbank in Variable $result schreiben und die Tabellen produkte und bilder mit der jeweiligen ID verknüpfen.
$result = $mysqli->query("SELECT * FROM dbrezepte LEFT JOIN dbrezeptbilder ON dbrezeptid = dbrezeptbildid") or die($mysqli->error);

// Verstecktes Input Feld für die Verknüpfung der ID mit der POST Methode.
$id = 0;

// Datumsausgabe in der Meldung/message definieren.
$datum = date("d.m.Y - H:i");

// Erst nach Klicken des "Speichern" Buttons wird der Wert der Variable $update auf "true" gesetzt. Dieser steht anfangs auf "false".
$update = false;

// Rückgabewert für das Einsetzen eines leeren Strings in den Wert "values" im Formular unter neues-rezept.php.
$produktname = '';
$produktbeschreibung = '';
$produktschwierigkeitsgrad = '';
$produktkategorie = '';
$produktdauer = '';
$produktbild = '';
$produktkueche = '';

// SPEICHERN
// Überprüfen, ob der Button Name "speichern" mit der Methode "POST" aus dem Formular geklickt wurde und erstellen von Variablen.
if (isset($_POST['speichern'])) {
    $produktname = $_POST['produktbezeichnung'];
    $produktbeschreibung = $_POST['produktbeschreibung'];
    $produktschwierigkeitsgrad = $_POST['difficulty'];
    $produktkategorie = $_POST['category'];
    $produktdauer = $_POST['duration'];
    $produktkueche = $_POST['kueche'];

    // Speichern aller Variablen aus den Formulardaten in die Datenbank.
    $mysqli->query("INSERT INTO dbrezepte (dbrezeptbezeichnung, dbrezeptbeschreibung, dbrezeptschwierigkeit, dbrezeptkategorie, dbrezeptdauer, dbrezeptkueche) VALUES('$produktname', '$produktbeschreibung', '$produktschwierigkeitsgrad', '$produktkategorie', '$produktdauer', '$produktkueche')") or die($mysqli->error);

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

    // LÖSCHEN EINES EINZELNEN BILDES AUF DEM SERVER: Erstmal alle Rezepte auswählen, die mit der ID verknüpft sind und in die Variable $result schreiben.
    $result = $mysqli->query("SELECT * FROM dbrezepte LEFT JOIN dbrezeptbilder ON dbrezeptid = dbrezeptbildid WHERE dbrezeptid=$id") or die($mysqli->error);
    // Dann wird eine neue Variable $path erzeugt, mit der man durch die Variable $result den Datensatz als gelesenes Array schreibt.
    $path = $result->fetch_array();
    // Dann wird mit unlink die Bilddatei gelöscht, indem man den Absoluten Pfad angibt und die Variable $path mit ausgibt.
    unlink("images/web/" . $path['dbrezeptbildrealerbildname']);

    // Rezept aus der DB löschen.
    $mysqli->query("DELETE FROM dbrezepte WHERE dbrezeptid=$id") or die($mysqli->error);
    // Bild aus der DB löschen.
    $mysqli->query("DELETE FROM dbrezeptbilder WHERE dbrezeptbildid=$id") or die($mysqli->error);

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
    $result = $mysqli->query("SELECT * FROM dbrezepte LEFT JOIN dbrezeptbilder ON dbrezeptid = dbrezeptbildid WHERE dbrezeptid=$id") or die($mysqli->error);

    // Überprüfen, ob die Datei überhaupts existiert.
    if (@count($result) == 1) {
        $row = $result->fetch_array();
        $produktname = $row['dbrezeptbezeichnung'];
        $produktbeschreibung = $row['dbrezeptbeschreibung'];
        $produktschwierigkeitsgrad = $row['dbrezeptschwierigkeit'];
        $produktkategorie = $row['dbrezeptkategorie'];
        $produktdauer = $row['dbrezeptdauer'];
        $produktbild  = $row['dbrezeptbildverzeichnis'];
        $produktbildname = $row['dbrezeptbildname'];
        $produktkueche = $row['dbrezeptkueche'];
    }
}

// AKTUALISIEREN
// Überprüfen, ob der Button Name "update" geklickt wurde und mit der Methode "POST" die Daten bearbeiten und zurück zur index.php Seite routen.
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $produktname = $_POST['produktbezeichnung'];
    $produktbeschreibung = $_POST['produktbeschreibung'];
    $produktschwierigkeitsgrad = $_POST['difficulty'];
    $produktkategorie = $_POST['category'];
    $produktdauer = $_POST['duration'];
    $produktbild  = $_POST['userfile[]'];
    $produktkueche = $_POST['kueche'];

    $mysqli->query("UPDATE dbrezepte LEFT JOIN dbrezeptbilder ON dbrezeptid = dbrezeptbildid SET dbrezeptbezeichnung='$produktname', dbrezeptbeschreibung='$produktbeschreibung', dbrezeptschwierigkeit='$produktschwierigkeitsgrad', dbrezeptkategorie='$produktkategorie', dbrezeptdauer='$produktdauer', dbrezeptkueche='$produktkueche'  WHERE dbrezeptid='$id'") or die($mysqli->error);

    $_SESSION['message'] = "Rezept $produktname wurde am $datum aktualisiert!";
    $_SESSION['msg_type'] = "warning";

    header('location: index.php');
}

// Select Elemente ANZEIGEN und den Fokus setzen.
// Werte aus der Tabelle Schwierigkeitsgrad holen und in Variable $option1 legen.
$difficulty = $mysqli->query("SELECT dbschwierigkeitsgradname FROM dbschwierigkeitsgrad ORDER BY dbschwierigkeitsgradid ASC") or die($mysqli->error);
$option1 = '';
while ($row = mysqli_fetch_assoc($difficulty)) {

    if ($row['dbschwierigkeitsgradname'] == $produktschwierigkeitsgrad) {
        $option1 .= '<option selected value = "' . $row['dbschwierigkeitsgradname'] . '">' . $row['dbschwierigkeitsgradname'] . '</option>';
    } else {
        $option1 .= '<option value = "' . $row['dbschwierigkeitsgradname'] . '">' . $row['dbschwierigkeitsgradname'] . '</option>';
    }
}

// Werte aus der Tabelle Kategorie holen und in Variable $option2 legen.
$category = $mysqli->query("SELECT dbrezeptkategoriename FROM dbrezeptkategorie ORDER BY dbrezeptkategorieid ASC") or die($mysqli->error);
$option2 = '';
while ($row = mysqli_fetch_assoc($category)) {

    if ($row['dbrezeptkategoriename'] == $produktkategorie) {
        $option2 .= '<option selected value = "' . $row['dbrezeptkategoriename'] . '">' . $row['dbrezeptkategoriename'] . '</option>';
    } else {
        $option2 .= '<option value = "' . $row['dbrezeptkategoriename'] . '">' . $row['dbrezeptkategoriename'] . '</option>';
    }
}

// Werte aus der Tabelle Dauer holen und in Variable $option3 legen.
$duration = $mysqli->query("SELECT dbdauername FROM dbdauer ORDER BY dbdauerid ASC") or die($mysqli->error);
$option3 = '';
while ($row = mysqli_fetch_assoc($duration)) {

    if ($row['dbdauername'] == $produktdauer) {
        $option3 .= '<option selected value = "' . $row['dbdauername'] . '">' . $row['dbdauername'] . '</option>';
    } else {
        $option3 .= '<option value = "' . $row['dbdauername'] . '">' . $row['dbdauername'] . '</option>';
    }
}

// Werte aus der Tabelle Kueche holen und in Variable $option4 legen.
$kueche = $mysqli->query("SELECT dbkuechename FROM dbkueche ORDER BY dbkuecheid ASC") or die($mysqli->error);
$option4 = '';
while ($row = mysqli_fetch_assoc($kueche)) {

    if ($row['dbkuechename'] == $produktkueche) {
        $option4 .= '<option selected value = "' . $row['dbkuechename'] . '">' . $row['dbkuechename'] . '</option>';
    } else {
        $option4 .= '<option value = "' . $row['dbkuechename'] . '">' . $row['dbkuechename'] . '</option>';
    }
}


// BILDER

// Standard Bild beim Erstellen eines neuen Rezepts aus der Datenbank holen und anzeigen
$bilder = $mysqli->query("SELECT dbrezeptbildverzeichnis, dbrezeptbildname FROM dbrezeptbilder WHERE dbrezeptbildid = '0'") or die($mysqli->error);

// Standard Bild in Variable $vstandardbild übertragen und in neues-rezept.php darstellen.
$vstandardbild = $bilder->fetch_assoc();

// Datensatz Array zur Kontrolle anzeigen lassen.
// print_r($vstandardbild);


// --------------------------------------------------------------------------------------------------------------------------
// BILDERUPLOAD und Speichern in der Datenbank.

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
                            } else {

                                // Daten Upload mit Name und Speicherort.
                                $img_dir = 'images/web/' . $file_array[$i]['name'];
                                $img_realname = $file_array[$i]['name'];

                                move_uploaded_file($file_array[$i]['tmp_name'], $img_dir);

                                // SQL Statement: Speichern des Namens und des Speicherorts in die Datenbank.
                                $sql = "INSERT IGNORE INTO dbrezeptbilder (dbrezeptbildname,dbrezeptbildverzeichnis,dbrezeptbildrealerbildname) VALUES('$name','$img_dir','$img_realname')";
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
