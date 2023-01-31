<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("templates/header.php"); ?>
    <title>Aufgaben</title>
</head>

<body>
<div class="container">
    <div class="container-fluid">
        <div class="card text-center border-0 mb-3">
            <div class="text-bg-light p-5">
                <h2>Aufgabenplaner: Aufgaben</h2>
            </div>
        </div>
        <div class="row">
            <?php include ("templates/menu.php"); ?>
            <div class="col-2"></div>
            <div class="col-8">
                <table class="table">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">Aufgabenbezeichnung:</th>
                        <th scope="col">Beschreibung der Aufgabe:</th>
                        <th scope="col">Reiter:</th>
                        <th scope="col">Zuständig:</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($aufgabendata as $item) { ?>
                        <tr>
                            <td><?= $item['name']?></td>
                            <td><?= $item['beschreibung']?></td>
                            <td><?= $item['name_r']?></td>
                            <td><?= $item['mail']?></td>
                            <td class="text-primary">
                                <a href="<?= base_url('Aufgaben/bearbeiten_index/' . $item['name'] . '/') ?>">
                                    <button class="fa-regular fa-pen-to-square" type="submit" id="bearbeitenIcon" name="bearbeitenIcon"></button>
                                </a>
                                <a href="<?= base_url('Aufgaben/index/2/' . $item['name'] . '/') ?>">
                                    <!--script src="deleteAlert.js"></script-->
                                    <button onclick="alarm();" class="fa-regular fa-trash-can" type="submit" name="loeschenIcon" id="loeschenIcon"></button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="p-4"></div>


                <h4>Aufgabe Bearbeiten:</h4>
                <form action="<?php base_url('Aufgaben/index')?>" method="post">
                    <div class="form-group">
                        <label for="name">Aufgabenbezeichnung:</label>
                        <input class="form-control" id="name" name="name" type="text" value="<?= $chosenAufgabe['name'] ?>">
                        <input type="hidden" class="form-control" id="old_name" name="old_name" value="<?= $chosenAufgabe['name'] ?>">
                    </div>
                    <div class="p-2"></div>
                    <div class="form-group">
                        <label for="beschreibung">Beschreibung der Aufgabe:</label>
                        <input class="form-control" id="beschreibung" name="beschreibung" value="<?= $chosenAufgabe['beschreibung'] ?>"></input>
                    </div>
                    <div class="p-2"></div>
                    <div class="form-group">
                        <label for="erstelldatum">Erstellungsdatum:</label>
                        <input class="form-control" id="erstelldatum" name="erstelldatum" type="text" value="<?= $chosenAufgabe['erstelldatum'] ?>">
                    </div>
                    <div class="p-2"></div>
                    <div class="form-group">
                        <label for="fällig">fällig bis:</label>
                        <input class="form-control" id="fällig" name="fällig" type="text" value="<?= $chosenAufgabe['fällig'] ?>">
                    </div>
                    <div class="p-2"></div>
                    <div><label for="chosen_reiter">Zugehöriger Reiter:</label></div>
                    <select name="chosen_reiter" id="chosen_reiter" class="form-control">
                        <option><?= $chosenAufgabe['chosen_reiter'] ?></option>
                        <?php foreach ($reiter_option as $item) { ?>
                            <?php if($item['name'] != $chosenAufgabe['chosen_reiter']){ ?>
                                <option><?= $item['name'] ?></option>
                            <?php }
                        } ?>
                    </select>
                    <div class="p-2"></div>
                    <div><label for="zuständigkeit">Zuständig:</label></div>
                    <select name="chosen_zustaendigkeit" class="form-control" id="chosen_zustaendigkeit">
                        <option><?= $chosenAufgabe['chosen_zustaendigkeit'] ?></option>
                        <?php foreach ($zustaendigkeit_option as $item) { ?>
                            <?php if($item['name'] != $chosenAufgabe['chosen_zustaendigkeit']){ ?>
                                <option value="<?= $item['mail'] ?>"><?= $item['name'] ?></option>
                            <?php }
                        } ?>
                    </select>
                    <div class="p-2"></div>
                    <button name="btnBearbeitenSpeichern" id="btnBearbeitenSpeichern" type="submit" class="btn btn-primary">Speichern</button>
                    <button type="submit" name="btnBearbeitenReset" id="btnBearbeitenReset" class="btn btn-info text-white">Reset</button>
                </form>
                <div class="p-4"></div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

