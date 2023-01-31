<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("templates/header.php"); ?>
    <title>Login</title>
</head>
<body>
<?= session()->getFlashdata('error') ?>

<div class="container">
    <div class="container-fluid">
        <div class="card text-center border-0 mb-3">
            <div class="text-bg-light p-5">
                <h2>Aufgabenplaner: Login</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">

                <form action="<?= base_url('Login/index') ?>" method="post">
                    <div class="form-group">
                        <label for="mail">E-Mail Adresse</label>
                        <div class="p-1"></div>
                        <input class="form-control <?=(isset($errors['mail']))?'is-invalid':'' ?>" type="text" name="mail" id="mail" value="">
                        <div class="invalid-feedback"> <?=(isset($errors['mail']))?$errors['mail']:''?> </div>
                        <br>
                    </div>
                    <div class="p-1"></div>
                    <div class="mb-3">
                        <label for="password">Passwort</label>
                        <div class="p-1"></div>
                        <input class="form-control <?=(isset($errors['password']))?'is-invalid':'' ?>" type="password" name="password" id="password" value="">
                        <div class="invalid-feedback"> <?=(isset($errors['password']))?$errors['password']:''?> </div>
                        <br>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="checkbox" id="checkbox">
                        <label class="form-check-label <?=(isset($errors['checkbox']))?'is-invalid':'' ?>" for="exampleCheck1">AGBs und Datenschutzbedingungen gelesen</label>
                        <div class="invalid-feedback"> <?=(isset($errors['checkbox']))?$errors['checkbox']:''?> </div>
                        <div class="p-2"></div>
                    </div>
                    <button type="submit" name="btnEinloggen" class="btn btn-primary">Einloggen</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>