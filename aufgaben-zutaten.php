<?php
// Datenbankverbindung einbinden
include 'db-verbindung.php';

$produkteinheit = $_POST['einheit'];
// $produktzutat = $_POST['names'];


// Select Elemente ANZEIGEN und den Fokus setzen.
// Werte aus der Tabelle einheit holen und in Variable $option5 legen.
$unit = $mysqli->query("SELECT EinheitName FROM einheiten ORDER BY EinheitID ASC") or die($mysqli->error);
$option5 = '';
while ($row = mysqli_fetch_assoc($unit)) {

     if ($row['EinheitName'] == $produkteinheit) {
          $option5 .= '<option selected value = "' . $row['EinheitName'] . '">' . $row['EinheitName'] . '</option>';
     } else {
          $option5 .= '<option value = "' . $row['EinheitName'] . '">' . $row['EinheitName'] . '</option>';
     }
}

// Zutaten und Einheit abholen und speichern.
$number = count($_POST["names"]);
if ($number > 0) {
     for ($i = 0; $i < $number; $i++) {
          if (trim($_POST["names"][$i] != '')) {
               //    $sql = "INSERT INTO zutaten(ZutatenName) VALUES('".mysqli_real_escape_string($mysqli, $_POST["names"][$i])."')";  
               $mysqli->query("INSERT INTO zutaten (ZutatenName, ZutatenEinheit) VALUES('" . mysqli_real_escape_string($mysqli, $_POST["names"][$i]) . ", $produktzutat', '$produkteinheit')") or die($mysqli->error);
               mysqli_query($mysqli, $sql);
          }
     }
     echo "Daten gespeichert!";
} else {
     echo "Bitte Namen eingeben!";
}
