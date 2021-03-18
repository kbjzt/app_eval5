<?php

session_start();
if(isset($_SESSION['ok']) && $_SESSION['ok']['role'] != 1){
    header('location:index.php');
}

$error = '';
require_once('../connect.php');

if(isset($_POST['submit'])){
    if(!empty($_POST['login']) && !empty($_POST['pass'])){
        $login = trim(htmlentities(addslashes($_POST['login'])));
        $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
        
        if(isset($_POST['role'])){
            $role = trim(htmlentities(addslashes($_POST['role'])));
        }else{
            $role = 2;
        }

        $sql = "INSERT INTO utilisateurs(login, pass, role)
                VALUES('$login','$pass','$role')";

        $result = mysqli_query($conn, $sql);

        if($result){

            header('location:index.php');
        }
    }
}

?>
<?php require_once('../partials/header.inc'); ?>
<div class="container mt-5">
<div class="card offset-4 col-4" style="margin-bottom: 327px;">
  <?=$error;?>
  <div class="card-header text-center">
    Formulaire d'inscription
  </div>
  <div class="card-body">
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
    <div class="mb-2">
        <label for="login" class="form-label">Login*</label>
        <input type="text" class="form-control" id="login" name="login"placeholder="Entrer le login" >
    </div>
    <div class="mb-2">
        <label for="pass" class="form-label">Mot de passe*</label>
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Entrer le mot de passe" required>
    </div>
    
    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="role" value="1" name="role">
        <label class="form-check-label" for="role">Administrateur</label>
    </div>
    
    <button type="submit" class="btn btn-primary col-12" name="submit">Soumettre</button>
    </form>
  </div>
</div>
</div>
<?php require_once('../partials/footer.inc'); ?>