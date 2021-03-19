<?php
require_once('security.inc');

session_start();
if(isset($_SESSION['ok']) && $_SESSION['ok']['role'] != 1){
    header('location:index.php');
}

require_once('../connect.php');
$error ="";

$sql = "SELECT id, role FROM utilisateurs";
$res = mysqli_query($conn, $sql);

if(isset($_GET['id']) && $_GET['id'] <= 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
    $id = htmlspecialchars(addslashes($_GET['id']));
    $sql = "SELECT * FROM utilisateurs WHERE id = '$id'";

    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
    }
    
}

if(isset($_POST['soumis'])){
        $id = trim(htmlspecialchars(addslashes($_POST['id'])));        
        $login = trim(htmlspecialchars(addslashes($_POST['login'])));
        $pass = md5(trim(htmlspecialchars(addslashes($_POST['pass']))));
        $role = trim(htmlspecialchars(addslashes($_POST['role'])));

        $sql = "UPDATE utilisateurs SET login = '$login', pass = '$pass', role = '$role'
            WHERE id = '$id'";            
        
       

        $resultat = mysqli_query($conn, $sql);

        if(mysqli_affected_rows($conn) > 0){
            header('location:utilisateurs.php');
        }
        else{
            $error = '<div class="alert alert-danger">Erreur d\'insertion</div>';
        
    }
}




require_once('../partials/header.inc');
?>
<div class="offset-2 col-8"  style="margin-bottom: 327px;">
    <h1 class="text-center bg-dark text-white mt-3">Administration</h1>
    <h2>Formulaire d'édition</h2>
    <?= $error;?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $data['id'];?>">
    <div class="row">
        <div class="col">
            <label for="login">Login*</label>
            <input type="text" class="form-control" id="login" name="login" value="<?= $data['login'];?>" placeholder="Entrez un login" required>
        </div>
        <div class="col">
        <label for="pass">Mot de passe*</label>
            <input type="pass" class="form-control" id="pass" name="pass" value="<?= $data['pass'];?>"  placeholder="Entrez un mot de passe" required>
        </div>       
        <div class="col">
        <label for="role">Role*</label>
            <select class="form-select" id="role" name="role">
                <option value="<?= $data['role'];?>" ><?= $data['role'];?> </option>
                <?php while($rows = mysqli_fetch_assoc($res)){ if($data['role'] !== $rows['role']){?>                
                <option value="<?= $rows['role'] ?>"><?= $rows['role']; ?></option>
                <?php }}?>
            </select>
        </div>
    </div>
    <button type="submit" class="btn btn-warning col-12 mt-3" name="soumis">Modifier</button>
</form>
</div>
<?php

require_once('../partials/footer.inc');

?>