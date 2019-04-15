<html>

<head>
    <title>Bilder in MYSQL hochladen</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="userfile[]" value="" multiple="">
        <input type="submit" name="submit" value="Upload">
    </form>
</body>

<?php

// Datenbankverbindung aufbauen.
$mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysql_error($mysqli));
// Variable erstellen, die die Tabelle der Bilder in der Datenbank beinhaltet.
$table = 'rezept_bilder';

// Fehlermeldungsausgabe.
$phpFileUploadErrors = array(
    0 => 'There is no error, the file uploaded was success',
    1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
    2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was uploaded',
    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A PHP extension stopped the file upload.',
);

// $_$FILES global variable
if (isset($_FILES['userfile'])) {
    $file_array = reArrayFiles($_FILES['userfile']);
    // pre_r($file_array);
    for ($i = 0; $i < count($file_array); $i++) {
        if ($file_array[$i]['error']) {
            ?> <div class="alert alert danger">
                <?php echo $file_array[$i]['name'] . ' - ' . $phpFileUploadErrors[$file_array[$i]['error']];
                ?> </div> <?php

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

                                            // SQL Statemen: Speichern des Namens und des Speicherorts in die Datenbank.
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
