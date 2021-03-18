<?php
require_once('security.inc');

require_once('../connect.php');
$error ="";

$sql = "SELECT id, nom FROM categorie";
$res = mysqli_query($conn, $sql);

if(isset($_GET['id']) && $_GET['id'] <= 1000 && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
    $id = htmlspecialchars(addslashes($_GET['id']));
    $sql = "SELECT * FROM articles a
            INNER JOIN categorie c 
            ON a.id_categorie = c.id
            WHERE a.id_a = '$id'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0){
        $data = mysqli_fetch_assoc($result);
    }
    
}

if(isset($_POST['soumis'])){
        $id_a = trim(htmlspecialchars(addslashes($_POST['id_a'])));        
        $titre = trim(htmlspecialchars(addslashes($_POST['titre'])));
        $auteur = trim(htmlspecialchars(addslashes($_POST['auteur'])));
        $description = trim(htmlspecialchars(addslashes($_POST['description'])));
        $id_categorie = trim(htmlspecialchars(addslashes($_POST['categorie'])));     
        $image = $_FILES['image']['name'];

        $destination = "../assets/images/";
        move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);

        if(empty($image)){
        $sql = "UPDATE articles SET titre = '$titre', auteur = '$auteur', id_categorie = '$id_categorie', description = '$description' 
            WHERE id_a = '$id_a'";            
        }else{
            if(file_exists('../assets/images/'.$data['image'])){
                unlink('../assets/images/'.$data['image']);
            }
            $sql = "UPDATE articles SET titre = '$titre', auteur = '$auteur', id_categorie = '$id_categorie', image = '$image' , description = '$description' 
            WHERE id_a = '$id_a'";   
        }
       

        $resultat = mysqli_query($conn, $sql);

        if(mysqli_affected_rows($conn) > 0){
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
    <h2>Formulaire d'édition</h2>
    <?= $error;?>
<form action="<?=$_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
<input type="hidden" name="id_a" value="<?= $data['id_a'];?>">
    <div class="row">
        <div class="col">
            <label for="titre">Titre*</label>
            <input type="text" class="form-control" id="titre" name="titre" value="<?= $data['titre'];?>" placeholder="Entrez un titre" required>
        </div>
        <div class="col">
        <label for="auteur">Auteur*</label>
            <input type="text" class="form-control" id="auteur" name="auteur" value="<?= $data['auteur'];?>"  placeholder="Entrez un auteur" required>
        </div>        
    </div>
    <div class="row">
        <div class="col">
            <label for="image">Image*</label>
            <input type="file" class="form-control" id="image" name="image" value="<?= $data['image'];?>">
            <img src="../assets/images/<?= $data['image'] ?>" alt="" width="50">
        </div>
        <div class="col">
        <label for="categorie">Catégorie*</label>
            <select class="form-select" id="categorie" name="categorie">
                <option value="<?= $data['id_categorie'];?>" ><?= ucfirst($data['nom']);?> </option>
                <?php while($rows = mysqli_fetch_assoc($res)){ if($data['nom'] !== $rows['nom']){?>                
                <option value="<?= $rows['id'] ?>"><?= ucfirst($rows['nom']); ?></option>
                <?php }}?>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col mb-2">
            <label for="description">Contenu</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Entrez une description"><?= $data['description'];?></textarea>
        </div>        
    </div>
    <button type="submit" class="btn btn-warning col-12" name="soumis">Modifier</button>
</form>
</div>
<?php

require_once('../partials/footer.inc');

?>