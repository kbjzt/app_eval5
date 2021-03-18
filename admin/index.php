<?php
require_once('../connect.php');

$error = "";

if(isset($_POST['submit'])){
    if (!empty($_POST['login']) && !empty($_POST['pass'])){
        $login = trim(htmlentities(addslashes($_POST['login'])));
        $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));

        $sql = "SELECT *
                FROM utilisateurs
                WHERE login = '$login' AND pass = '$pass' ";
        $res = mysqli_query($conn, $sql);

        if(mysqli_num_rows($res) > 0){
            $data = mysqli_fetch_assoc($res);
            session_start();
            $_SESSION['ok'] = $data;

            header('location: liste.php');
        }else{
            $error = '<div class="alert alert-danger text-center">Le login et/ou le mot de passe ne correspondent pas. Veuillez réessayer.</div>';
        }
    }else{
        $error = '<div class="alert alert-danger text-center">Le login et le mot de passe sont requis.</div>';
    }
}

?>
<?php
require_once('../partials/header.inc');

?>

<div class="container">
    <div class="card offset-4 col-4 mt-5" style="margin-bottom: 327px;">
    <?= $error; ?>
        <div class="card-header text-center">
            Formulaire de connexion
        </div>
        <div class="card-body">
            <form action="<?= $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="mb-2">
                    <label for="login" class="form-label">Login*</label>
                    <input type="text" class="form-control" id="login" name="login" placeholder="Entrez votre login">

                    <div class="mb-2">
                        <label for="pass" class="form-label">Mot de passe*</label>
                        <input type="password" class="form-control" id="pass" name="pass" placeholder="Entrez votre mot de passe">
                    </div>
                    <button type="submit" class="btn btn-primary col-12" name="submit">Soumettre</button>
            </form>
        </div>
    </div>

</div>

<?php

require_once('../partials/footer.inc')

?>