<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("templates/header.php"); ?>
    <title>ToDos</title>
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <div class="card text-center border-0 mb-3">
            <div class="text-bg-light p-5">
                <h2>Aufgabenplaner: ToDos</h2>
            </div>
        </div>
        <div class="row">
            <?php include ("templates/menu.php"); ?>
            <div class="col">
                <div class="row">
                    <?php foreach ($aktuelleReiter as $item_1) { ?>
                        <div class="col">
                            <div class="card">
                                <div class="card-header"><?= $item_1['name'] ?></div>
                                <ul class="list-group">
                                    <?php foreach ($aktuelleAufgaben as $item_2) {
                                        if ($item_1['name'] == $item_2['name_r']){ ?>
                                            <li class="list-group-item"><?= $item_2['name'] ?></li>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                    <?php } ?>

                    <!--li class="list-group-item list-group-flush">HTML Datei erstellen (Max Mustermann)</--li>
                    CSS Datei erstellen (Max Mustermann)>
        <div class="col">
            <div class="card">
                <div class="card-header">Erledigt:</div>
                <ul class="list-group">
                    <li class="list-group-item">PC eingeschaltet (Petra Müller)</li>
                    <li class="list-group-item">Kaffee trinken (Petra Müller)</li>
                </ul>
            </div>
        </div>
        <div class="col">
            <div class="card">
                <div class="card-header">Verschoben:</div>
                <ul class="list-group">
                    <li class="list-group-item">Für die Uni lernen (Max Mustermann)</li>
                </ul>
            </div>
        </div-->
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
