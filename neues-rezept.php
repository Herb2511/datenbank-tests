<html>

<head>
    <title>Datenbank Inhalte anzeigen, erstellen, bearbeiten, löschen</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- aufgaben.php Datei einbinden und einmal ausführen. -->
    <?php require_once 'aufgaben.php'; ?>

    <?php
    // Ausgabe der Meldungen je nach Aktion von "msg_type" aus "aufgaben.php".
    if (isset($_SESSION['message'])) : ?>

        <div class="alert alert-<?= $_SESSION['msg_type'] ?>">

            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <div class="container">
        <?php
        // Alle Produkte aus der Datenbank in Variable $result schreiben.
        $result = $mysqli->query("SELECT * FROM produkte") or die($mysqli->error);
        // Datenbankabfrage.
        // pre_r($result);
        // Methode "fetch_assoc" benutzen um Daten aus der Datenbank abzufragen und anzuzeigen.
        // pre_r($result->fetch_assoc());
        ?>

        <div class="row mt-3">
            <h2>Rezept anlegen</h2>
        </div>

        <!-- Formular in Tabelle zur Dateneingabe -->
        <div class="row">
            <form action="aufgaben.php" method="POST" enctype="multipart/form-data">
                <!-- Verstecktes Input Feld für die Verknüpfung der ID mit der POST Methode. -->
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <table class="table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label><b>Rezeptname:</b></label>
                                <input type="text" name="produktbezeichnung" class="form-control" value="<?php echo $produktname; ?>" placeholder="Produkt eingeben">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label><b>Preis:</b></label>
                                <input type="text" name="produktpreis" class="form-control" value="<?php echo $produktpreis; ?>" placeholder="Preis in €">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label><b>Rezeptbeschreibung:</b></label>
                                <input type="text" name="produktbeschreibung" class="form-control" value="<?php echo $produktbeschreibung; ?>" placeholder="Produktbeschreibung">
                            </div>

                            <!-- Select Optionen. Kommen von der Datenbank in aufgaben.php, werden hier über das "name-tag" in aufgaben.php übertragen und in die Datenbank Tabelle produkte/jeweilige Spalte gespeichert. -->
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Schwierigkeit:
                                                <select name="difficulty">
                                                    <?php echo $option1; ?>
                                                </select>
                                            </th>
                                            <th>Kategorie:
                                                <select name="category">
                                                    <?php echo $option2; ?>
                                                </select>
                                            </th>

                                            <th>Dauer:
                                                <select name="duration">
                                                    <?php echo $option3; ?>
                                                </select>
                                            </th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </td>
                    </tr>
                </table>

                <div class="row">
                    <?php

                    // Bilder aus der Datenbank abfragen.
                    $bilder = $mysqli->query("SELECT BildVerzeichnis, BildName FROM bilder WHERE BildID = '1'") or die($mysqli->error);

                    // Mit einer While-Schleife alle Bilder aus der Datenbank darstellen.
                    $data = $bilder->fetch_assoc();

                    echo "<img src='{$data['BildVerzeichnis']}' width='20%' height='20%' title='{$data['BildName']}' alt='{$data['BildName']}'>";
                    ?>
                </div>

                <div class="row">
                    <div class="form-group">
                        <input type="file" name="userfile[]" value="" multiple="">
                        <input type="submit" name="submit" value="Upload">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mt-4">
                        <!-- Button Zurück -->
                        <a href="index.php" class="btn btn-secondary" title="Zurück">Zurück</a>
                        <!-- Button Speichern.-->
                        <button type="submit" class="btn btn-primary" name="speichern" title="Speichern">Speichern</button>
                    </div>
                </div>


            </form>
        </div>




        <?php

        function pre_r($array)
        {
            echo '
    <pre>';
            print_r($array);
            echo '</pre>';
        }

        ?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>