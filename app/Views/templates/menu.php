<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!--a class="navbar-brand" href="#">Aktuelles</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button-->
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('Projekte/index') ?>">Projekte<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Aktuelles Projekt
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="<?= base_url('ProjektPage/index') ?>">Projektübersicht</a>
                    <a class="dropdown-item" href="<?= base_url('Reiter/index') ?>">Reiter</a>
                    <a class="dropdown-item" href="<?= base_url('Aufgaben/index') ?>">Aufgaben</a>
                    <a class="dropdown-item" href="<?= base_url('Mitglieder/index') ?>">Mitglieder</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
<div class="p-4"></div>

<!--div class="col-2">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="<!?= base_url('Login/index') ?>" class="text-primary text-decoration-none">Login</a>
        </li>
        <li class="list-group-item">
            <a href="<!?= base_url('Projekte/index') ?>" class="text-primary text-decoration-none">Projekte</a>
        </li>
        <li class="list-group-item">
            <a href="<!?= base_url('ProjektPage/index') ?>" class="text-primary text-decoration-none">Aktuelles Projekt</a>
        </li>
        <li class="list-group-item text-primary ms-4">
            <a href="<!?= base_url('Reiter/index') ?>" class="text-primary text-decoration-none">Reiter</a>
        </li>
        <li class="list-group-item text-primary ms-4">
            <a href="<!?= base_url('Aufgaben/index') ?>" class="text-primary text-decoration-none">Aufgaben</a>
        </li>
        <li class="list-group-item text-primary ms-4">
            <a href="<!?= base_url('Mitglieder/index') ?>" class="text-primary text-decoration-none">Mitglieder</a>
        </li>
    </ul>
</div-->
