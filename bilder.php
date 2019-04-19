<html>

<head>
    <title>Bilder in MySQL hochladen</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="form-group">
        <form action="" method="POST" enctype="multipart/form-data">
            <!-- <input type="file" name="userfile[]" value=""> -->
            <input type="file" name="userfile[]" value="" multiple="">
            <input type="submit" name="submit" value="Upload">
        </form>
    </div>

    <div class="form-group mt-4">
        <!-- Button Zurück -->
        <a href="neues-rezept.php" class="btn btn-secondary" title="Zurück">Zurück</a>
        <!-- Button Speichern -->
        <button type="submit" class="btn btn-primary" name="speichern" title="Speichern und weiter">Speichern und weiter</button>
    </div>
</body>

</html>

<?php

// Datenbankverbindung aufbauen.
$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysql_error($mysqli));
// Variable erstellen, die die Tabelle der Bilder in der Datenbank beinhaltet.
$table = 'rezept_bilder';

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

                                            move_uploaded_file(
                                                $file_array[$i]['tmp_name'],
                                                $img_dir
                                            );

                                            // SQL Statement: Speichern des Namens und des Speicherorts in die Datenbank.
                                            $sql = "INSERT IGNORE INTO $table (RezeptBildName,RezeptBildVerzeichnis) VALUES('$name','$img_dir')";
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

                            function pre_r($array)
                            {
                                echo '<pre>';
                                print_r($array);
                                echo '</pre>';
                            }


                            // Bilder aus der Datenbank abfragen.
                            $result = $mysqli->query("SELECT * FROM $table") or die($mysqli->error);

                            // Mit einer While-Schleife alle Bilder aus der Datenbank darstellen.
                            while ($data = $result->fetch_assoc()) {
                                // print_r($data);
                                // echo "<h2>{$data['RezeptBildName']}</h2>";
                                echo "<img src='{$data['RezeptBildVerzeichnis']}' width='20%' height='20%' title='{$data['RezeptBildName']}' alt='{$data['RezeptBildName']}'>";
                            }
