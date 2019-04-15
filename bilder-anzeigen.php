<html>

<head>
    <title>Bilder aus MySQL anzeigen</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    // Datenbankverbindung aufbauen. 
    $mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysql_error($mysqli));
    // Variable erstellen, die die Tabelle der Bilder in der Datenbank beinhaltet.
    $table = 'rezept_bilder';

    // Bilder aus der Datenbank abfragen.
    $result = $mysqli->query("SELECT * FROM $table") or die($mysqli->error);

    // Mit einer While-Schleife alle Bilder aus der Datenbank darstellen.
    while ($data = $result->fetch_assoc()) {
        // print_r($data);
        // echo "<h2>{$data['RezeptBildName']}</h2>";
        echo "<img src='{$data['RezeptBildVerzeichnis']}' width='20%' height='20%' title='{$data['RezeptBildName']}' alt='{$data['RezeptBildName']}'>";
    }
    ?>

</body>

</html>