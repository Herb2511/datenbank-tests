<?php

echo 'Datenbankverbindung erfolgreich hergestellt am: ';
echo date("D,d M Y");
echo ' um ';
echo date("H:i:s");
echo '<h1>Datenbankinhalt:</h1>';
// echo ("<br /><br />");
error_reporting(E_ALL);
// error_reporting(0);

// Datenbankverbindung herstellen.
$pdo = new PDO('mysql:host=localhost;dbname=test', 'root'); 
 
// Daten aus Datenbank vorbereiten und ausgeben.
$statement = $pdo->prepare("SELECT ProduktID, Produktbezeichnung, Produktpreis FROM produkte");
 
if($statement->execute()) {
    while($row = $statement->fetch()) {
        // echo $row['ProduktID']."<br />";
        echo $row['Produktbezeichnung']." ";
        echo $row['Produktpreis']." €<br />";
        echo "<br />";
    }    
} else {
    echo "SQL Error <br />";
    echo $statement->queryString."<br />";
    echo $statement->errorInfo()[2];
}

?>






