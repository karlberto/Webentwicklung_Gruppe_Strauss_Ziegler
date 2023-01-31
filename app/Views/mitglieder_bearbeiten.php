<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <?php include("templates/header.php"); ?>
    <title>Mitglieder</title>
</head>

<body>
<div class="container">
    <div class="container-fluid">
        <div class="card text-center border-0 mb-3">
            <div class="text-bg-light p-5">
                <h2>Aufgabenplaner: Mitglieder</h2>
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
                        <th scope="col">E-Mail</th>
                        <th scope="col">In Projekt</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach($mitgliederdata as $item){ ?>
                        <tr>
                            <td><?= $item['name'] ?></td>
                            <td><?= $item['mail'] ?></td>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="cb_mitglied_zugeordnet"
                                        <?php if($item['inProjekt'] == 'true') { ?> checked <?php } ?>>
                                </div>
                            </td>
                            <td class="text-primary">
                                <a href="<?= base_url('Mitglieder/showMitgliedinfos/' . $item['mail'] . '/') ?>">
                                    <button class="fa-regular fa-pen-to-square" type="submit" id="bearbeitenIcon" name="bearbeitenIcon"></button>
                                </a>
                                <a href="<?= base_url('Mitglieder/index/1/' . $item['mail'] . '/') ?>">
                                    <script src="deleteAlert.js"></script>
                                    <button onclick="alarm();" class="fa-regular fa-trash-can" type="submit" name="loeschenIcon" id="loeschenIcon"></button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="p-4"></div>

                <h4>Mitglied Bearbeiten</h4>
                <form action="<?= base_url('Mitglieder/index') ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <div class="p-1"></div>
                        <input class="form-control" name="name" id="name" type="text" value="<?= $chosenMitglied['name'] ?>">
                    </div>
                    <div class="p-2"></div>
                    <div class="form-group">
                        <label for="mail">E-Mail Adresse:</label>
                        <div class="p-1"></div>
                        <input class="form-control" type="text" name="mail" id="mail" value="<?= $chosenMitglied['mail'] ?>">
                        <br>
                    </div>
                    <div hidden class="p-2"></div>
                    <div hidden class="form-group">
                        <div class="p-1"></div>
                        <input class="form-control" type="text" name="old_mail" id="old_mail" value="<?= $chosenMitglied['mail'] ?>">
                        <br>
                    </div>
                    <?php
                    if($_SESSION['mail'] == $chosenMitglied['mail']) { ?>
                        <div class="mb-3">
                            <label for="password">Passwort:</label>
                            <div class="p-1"></div>
                            <input class="form-control" type="password" name="passwort" id="passwort">
                            <br>
                        </div>
                    <?php } ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="projekt_zugeordnet" id="projekt_zugeordnet">
                        <label class="form-check-label" for="projekt_zugeordnet">Dem Projekt zugeordnet</label>
                    </div>
                    <div class="p-2"></div>
                    <button name="btnBearbeitenSpeichern" id="btnBearbeitenSpeichern" type="submit" class="btn btn-primary">Speichern</button>
                    <button type="submit" name="btnBearbeitenReset" id="btnBearbeitenReset" class="btn btn-info text-white">Reset</button>
                </form>
                <div class="p-5"</div>
        </div>
    </div>
</div>

</body>
</html>
