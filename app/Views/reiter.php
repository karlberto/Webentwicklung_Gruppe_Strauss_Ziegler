<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("templates/header.php"); ?>
    <title>Reiter</title>
</head>

<body>
<!--? php
$reiter = array(
    array('ToDo', 'Erledigt', 'Verschoben'),
    array('Dinge, die erledigt werden müssen', 'Dinge, die erledigt sind', 'Dinge, die später erledigt werden'),
    array('Aktuelles Projekt')
);

var_dump($reiter)
?-->
<div class="container">
    <div class="container-fluid">
        <div class="card text-center border-0 mb-3">
            <div class="text-bg-light p-5">
                <h2>Aufgabenplaner: Reiter</h2>
            </div>
        </div>
        <div class="row">
            <?php include ("templates/menu.php"); ?>
            <div class="col-2"></div>
            <div class="col-8">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Beschreibung</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($reiterdata as $item) { ?>
                        <tr>
                            <td><?= $item['name']?></td>
                            <td><?= $item['beschreibung']?></td>
                            <td class="text-primary">
                                <a href="<?= base_url('Reiter/bearbeiten_index/' . $item['name'] . '/') ?>">
                                    <button class="fa-regular fa-pen-to-square" type="submit" id="bearbeitenIcon" name="bearbeitenIcon"></button>
                                </a>
                                <a href="<?= base_url('Reiter/index/1/' . $item['name'] . '/') ?>">
                                    <button onclick="alarm();" class="fa-regular fa-trash-can" type="submit" name="loeschenIcon" id="loeschenIcon"></button>
                                </a>
                            </td>
                        </tr>
                    <?php }?>

                    </tbody>
                </table>
                <div class="p-4"></div>


                <h4>Reiter erstellen:</h4>
                <form action="<?= base_url('Reiter/index') ?>" method="post">
                    <label for="name">Reitername:</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Reiter">
                    <div class="p-2"></div>
                    <div class="form-group">
                        <label for="beschreibung">Reiterbeschreibung:</label>
                        <textarea class="form-control" id="beschreibung" name="beschreibung" rows="3" placeholder="Beschreibung"></textarea>
                    </div>
                    <div class="p-2"></div>
                    <button type="submit" name="btnErstellenSpeichern" id="btnErstellenSpeichern" class="btn btn-primary">Speichern</button>
                    <button type="submit" name="btnReset" id="btnReset" class="btn btn-info text-white">Reset</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>

