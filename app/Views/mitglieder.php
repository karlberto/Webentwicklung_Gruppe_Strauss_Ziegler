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
                                <a href="<?= base_url('Mitglieder/bearbeiten_index/' . $item['mail'] . '/') ?>">
                                    <button class="fa-regular fa-pen-to-square" type="submit" id="bearbeitenIcon" name="bearbeitenIcon"></button>
                                </a>
                                <a href="<?= base_url('Mitglieder/index/1/' . $item['mail'] . '/') ?>">
                                    <button onclick="alarm();" class="fa-regular fa-trash-can" type="submit" name="loeschenIcon" id="loeschenIcon"></button>
                                </a>
                            </td>
                        </tr>
                    <?php } ?>
                    </tbody>
                </table>
                <div class="p-4"></div>

                <h4>Mitglied Erstellen:</h4>
                <!--?php include ("templates/mail_password.php"); ?-->
                <form action="<?= base_url('Mitglieder/index') ?>" method="post">
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <div class="p-1"></div>
                        <input class="form-control" name="name" id="name" type="text"">
                    </div>
                    <div class="p-2"></div>
                    <div class="form-group">
                        <label for="mail">E-Mail Adresse:</label>
                        <div class="p-1"></div>
                        <input class="form-control" type="text" name="mail" id="mail">
                        <br>
                    </div>
                    <div class="mb-3">
                        <label for="password">Passwort:</label>
                        <div class="p-1"></div>
                        <input class="form-control" type="password" name="password" id="password">
                        <br>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="projekt_zugeordnet" id="projekt_zugeordnet">
                        <label class="form-check-label" for="projekt_zugeordnet">Dem Projekt zugeordnet</label>
                    </div>
                    <div class="p-2"></div>
                    <button name="btnErstellenSpeichern" id="btnErstellenSpeichern" type="submit" class="btn btn-primary">Speichern</button>
                    <button type="submit" name="btnErstellenReset" id="btnErstellenReset" class="btn btn-info text-white">Reset</button>
                </form>
                <div class="p-5"</div>
        </div>
    </div>
</div>
</div>

</body>
</html>
