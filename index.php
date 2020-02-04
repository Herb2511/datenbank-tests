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

        // Datenbankabfrage.
        // pre_r($result);
        // Methode "fetch_assoc" benutzen um Daten aus der Datenbank abzufragen und anzuzeigen.
        // pre_r($result->fetch_assoc());
        ?>

        <div class="row mt-3">
            <h2>Neues Rezept hinzufügen</h2>
        </div>

        <!-- Formular in Tabelle zur Dateneingabe. -->
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
            <form action="aufgaben.php" method="GET">
                <h2>Rezeptübersicht</h2>
        </div>
        <div class="row justify-content-center">
            <table class="table">
                <thead>
                    <tr>
                        <th>Bild</th>
                        <th>Name</th>
                        <th>Kategorie</th>
                        <th>Schwierigkeit</th>
                        <th>Dauer</th>
                        <th>Küche</th>
                        <th colspan="2">Aktion</th>
                    </tr>
                </thead>
                <?php

                // Den Verzeichnispfad und Namen des Bildes zum Löschen raus finden.

                // $path = dirname($row["BildVerzeichnis"]);
                // $path = $path . "/" . $row["BildName"];

                // Den Realname eines Bildes anzeigen
                // $row = $result->fetch_array();
                // $path = $row['RealerBildname'];
                // print "Die Bilddatei heißt: " . $path;


                // While Schleife benutzen, um alle Daten aus der Datenbank in die Tabelle zu schreiben.
                while ($row = $result->fetch_assoc()) :
                ?>
                    <tr>
                        <td><img class="img-responsive" src="<?= $row['dbrezeptbildverzeichnis'] ?>" width='70px' title="<?= $row['dbrezeptbildname']; ?>" alt="<?= $row['dbrezeptbildname']; ?>"></td>
                        <td><?php echo $row['dbrezeptbezeichnung'] ?></td>
                        <td><?php echo $row['dbrezeptkategorie'] ?></td>
                        <td><?php echo $row['dbrezeptschwierigkeit'] ?></td>
                        <td><?php echo $row['dbrezeptdauer'], ' Min.' ?></td>
                        <td><?php echo $row['dbrezeptkueche'] ?></td>
                        <td>
                            <!-- Button Bearbeiten. -->
                            <a href="rezept-bearbeiten.php?edit=<?php echo $row['dbrezeptid']; ?>" class="btn btn-info" title="Bearbeiten">Bearbeiten</a>

                            <!-- Button und Funktion Löschen mit Warnhinweis. -->
                            <a href="index.php?delete=<?php echo $row['dbrezeptid']; ?>" onclick="return confirm('Rezept <?php echo $row['dbrezeptbezeichnung']; ?> wirklich löschen?'); " class="btn btn-danger" title="Löschen">Löschen</a>
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