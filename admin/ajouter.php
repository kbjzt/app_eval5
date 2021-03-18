<?php
require_once('security.inc');
require_once('../connect.php');
$error = "";
$sql = "SELECT id, nom FROM categorie";
$res = mysqli_query($conn, $sql);

if(isset($_POST['soumis'])){
        $titre = trim(htmlspecialchars(addslashes($_POST['titre'])));
        $auteur = trim(htmlspecialchars(addslashes($_POST['auteur'])));
        $description = trim(htmlspecialchars(addslashes($_POST['desc'])));
        $id_categorie = trim(htmlspecialchars(addslashes($_POST['categorie'])));
        $image = $_FILES['image']['name'];

        $destination = "../assets/images/";
        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);

        // var_dump($_POST); die;

        $sql2 ="INSERT INTO articles(titre, auteur, description, id_categorie, image)
                VALUES ('$titre', '$auteur', '$description', '$id_categorie', '$image')";
        $result = mysqli_query($conn, $sql2);
        if(mysqli_insert_id($conn) > 0){
            header('location:liste.php');
        }
        else{
            $error = '<div class="alert alert-danger">Erreur d\'insertion</div>';
        }
    
}



require_once('../partials/header.inc');
?>
<div class="offset-2 col-8">
    <h1 class="text-center bg-dark text-white mt-3">Administration</h1>
    <h2>Formulaire d'ajout</h2>
    <?= $error;?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="col-6">
            <label for="titre">Titre*</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Entrez un titre" required>
        </div>
        <div class="col-6">
        <label for="auteur">Auteur*</label>
            <input type="text" class="form-control" id="auteur" name="auteur" placeholder="Entrez un auteur" required>
        </div>        
    </div>
    <div class="row">
        <div class="col">
            <label for="image">Image</label>
            <input type="file" class="form-control" id="image" name="image" placeholder="Entrez une photo">
        </div>
        <div class="col">
        <label for="categorie">Catégorie*</label>
            <select class="form-select" id="categorie" name="categorie">
                <option>Choisir une catégorie</option>
                <?php while($rows = mysqli_fetch_assoc($res)){?>                
                <option value="<?= $rows['id'] ?>"><?= ucfirst($rows['nom']); ?></option>
                <?php }?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col mb-2">
            <label for="desc">Contenu</label>
            <textarea class="form-control" id="desc" name="desc" rows="5" placeholder="Entrez le contenu"></textarea>
        </div>        
    </div>
    <button type="submit" class="btn btn-primary col-12" name="soumis">Soumettre</button>
</form>
</div>
<?php

require_once('../partials/footer.inc');

?>