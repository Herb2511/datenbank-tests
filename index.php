<?php

// Datenbankinhalt laden.
require 'inc/db.php';

?>

<html>

<head>
<title>Datenbank Inhalte anzeigen, erstellen, bearbeiten, löschen</title>
</head>

<body>
    <!-- Formular zur Dateneingabe in die Datenbank. Ruft die insert.php-Datei auf mit der Methode "post" -->
    <form action="insert.php" method="post">
        <h1>Daten eingeben:</h1>

        Name: <input type="text" name="produktbezeichnung" placeholder="Produktname">
        <br />
        Produktpreis: <input type="number" name="produktpreis" placeholder="0">
        <br />
        <input type="submit" value="Speichern">

    </form>

</body>

</html>