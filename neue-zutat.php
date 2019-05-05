<html>

<head>
    <title>Zutaten mit JQuery hinzufügen</title>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<!-- Datei einbinden, um Rückgabewerte für option zu erhalten. -->
<?php require_once 'aufgaben-zutaten.php'; ?>

<body>
    <div class="container">
        <br />
        <br />
        <h2 class="mb-5">Zutaten mit JQuery hinzufügen und abfragen, ob diese schon existieren</h2>
        <div class="form-group">
            <form name="add_name" id="add_name">
                <!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="dynamic_field">
                        <tr>
                            <td>
                                <label><b>Menge:</b></label>
                                <input type="number" name="names[]" placeholder="Menge eingeben" class="form-control name_list" />
                            </td>
                            <td>
                                <!-- Einheit Rückgabewert aus der Tabelle einheit -->
                                <label><b>Einheit:</b></label><br>
                                <select name="einheit">
                                    <?php echo $option5; ?>
                                </select>
                            </td>
                            <td>
                                <label><b>Name:</b></label>
                                <input type="text" name="names[]" placeholder="Zutat" class="form-control name_list" />
                            </td>
                            <td><button type="button" name="add" id="add" class="btn btn-success" title="Weitere Zutat hinzufügen">Weitere Zutat hinzufügen</button></td>
                        </tr>
                    </table>
                    <input type="button" name="submit" id="submit" class="btn btn-info" value="Speichern" title="Speichern" />
                </div>
            </form>
        </div>
    </div>
</body>

</html>
<!-- Zutaten Felder hinzufügen, löschen und speichern. Hier wird die aufgaben-zutaten.php aufgerufen -->
<script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            i++;
            $('#dynamic_field').append('<tr id="row' + i + '"><td><label><b>Menge:</b></label><input type="number" name="names[]" placeholder="Menge eingeben" class="form-control name_list"/></td><td><label><b>Einheit:</b></label><br><select name="einheit"><?php echo $option5; ?> </td><td><label><b>Name:</b></label><input type="text" name="names[]" placeholder="Zutat" class="form-control name_list" /></td>  <td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove">Löschen</button></td></tr>');
        });
        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row' + button_id + '').remove();
        });
        $('#submit').click(function() {
            $.ajax({
                url: "aufgaben-zutaten.php",
                method: "POST",
                data: $('#add_name').serialize(),
                success: function(data) {
                    alert(data);
                    $('#add_name')[0].reset();
                }
            });
        });
    });
</script>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>