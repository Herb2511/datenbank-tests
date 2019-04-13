<?php

// Datenbankverbindung aufbauen.
$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysql_error($mysqli));








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






?>
<html>

<body>
    <form>
        <select name="difficulty">
            <?php echo $option; ?>
        </select>
    </form>



    <form>
        <select name="category">
            <?php echo $options; ?>
        </select>
    </form>



</body>

</html>