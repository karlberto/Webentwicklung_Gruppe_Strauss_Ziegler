<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("templates/header.php"); ?>
    <title>Projekte</title>
</head>

<body>
<div class="container">
    <div class="container-fluid">
        <div class="card text-center border-0 mb-3">
            <div class="text-bg-light p-5">
                <h2>Aufgabenplaner: Projekte</h2>
            </div>
        </div>
        <div class="row">
            <?php include ("templates/menu.php"); ?>
            <!-- hier gehts weiter -->
            <div class="col">
                <h4>Projekt auswählen:</h4>
                <form action="<?php base_url('Projekte/index/') ?>" method="post">
                    <select name="chosen_projekt" id="chosen_projekt" class="form-control">
                        <?php foreach ($projektedata as $item) { ?>
                            <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                        <?php } ?>
                    </select>
                    <div class="p-2"></div>
                    <button type="submit" name="btnAuswaehlen" id="btnAuswaehlen" class="btn btn-primary">Auswählen</button>
                    <button type="submit" name="btnBearbeiten" id="btnBearbeiten" class="btn btn-primary">Bearbeiten</button>
                    <button onclick="alarm();" type="submit" name="btnLoeschen" id="btnLoeschen" class="btn btn-danger">Löschen</button>
                    <div class="p-3"></div>
                </form>


                <h4>Projekt erstellen:</h4>
                <form action="<?= base_url('Projekte/index') ?>" method="post">
                    <label for="name">Projektname:</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Projekt">
                    <div class="p-2"></div>
                    <div class="form-group">
                        <label for="beschreibung">Projektbeschreibung:</label>
                        <textarea class="form-control" id="beschreibung" name="beschreibung" rows="3" placeholder="Beschreibung"></textarea>
                    </div>
                    <div class="p-2"></div>
                    <button type="submit" name="btnErstellenSpeichern" id="btnErstellenSpeichern" class="btn btn-primary">Speichern</button>
                    <button type="submit" name="btnReset" id="btnReset" class="btn btn-info text-white">Reset</button>
                </form>
                <div class="p-5"</div>
        </div>
    </div>
</div>
</div>
</body>
</html>
