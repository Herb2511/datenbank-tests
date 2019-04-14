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
    <!-- process.php Datei einbinden und einmal ausführen. -->
    <?php require_once 'process.php'; ?>

    <?php
    // Ausgabe der Meldungen je nach Aktion von "msg_type" aus "process.php".
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
        // Datenbankverbindung aufbauen.
        $mysqli = new mysqli('localhost', 'root', '', 'test') or die(mysql_error($mysqli));
        // Alle Produkte aus der Datenbank in Variable $result schreiben.
        $result = $mysqli->query("SELECT * FROM produkte") or die($mysqli->error);
        // Datenbankabfrage.
        // pre_r($result);
        // Methode "fetch_assoc" benutzen um Daten aus der Datenbank abzufragen und anzuzeigen.
        // pre_r($result->fetch_assoc());
        ?>

        <div class="row mt-3">
            <h2>Neues Rezept hinzufügen</h2>
        </div>

        <!-- Formular in Tabelle zur Dateneingabe -->
        <div class="row">

            <table class="table">

                <div class="form-group mt-4">
                    <!-- Button erstellen -->
                    <a href="neues-rezept.php" class="btn btn-primary" title="Erstellen">Erstellen</a>

                </div>
                </td>
                </tr>
            </table>

        </div>

        <!-- Tabelle zur Darstellung aller Produkte. -->
        <div class="row mt-3">
            <form action="process.php" method="GET">
                <h2>Rezeptübersicht</h2>
        </div>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Preis</th>
                        <th colspan="2">Aktion</th>
                    </tr>
                </thead>
                <?php
                // While Schleife benutzen, um alle Daten aus der Datenbank in die Tabelle zu schreiben.
                while ($row = $result->fetch_assoc()) :
                    ?>
                    <tr>
                        <td><?php echo $row['Produktbezeichnung'] ?></td>
                        <td><?php echo $row['Produktpreis'], ' €' ?></td>
                        <td>
                            <!-- Button Bearbeiten. -->
                            <a href="rezept.php?edit=<?php echo $row['ProduktID']; ?>" class="btn btn-info" title="Bearbeiten">Bearbeiten</a>

                            <!-- Button und Funktion Löschen mit Warnhinweis. -->
                            <script type="text/javascript">
                                function ConfirmDelete() {
                                    if (confirm("Wollen Sie das Rezept wirklich löschen?"))
                                        location.href = 'process.php?delete=<?php echo $row['ProduktID']; ?>';
                                }
                            </script>
                            <a href="#" class="btn btn-danger" onclick="ConfirmDelete()" title="Löschen">Löschen</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </table>
        </div>
        </form>

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