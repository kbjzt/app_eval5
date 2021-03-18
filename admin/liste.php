<?php
require_once('security.inc');
require_once('../connect.php');

if(isset($_POST['submit']) && !empty($_POST['search'])){
    $mCle = trim(addslashes(htmlentities($_POST['search'])));
    $sql = "SELECT * FROM articles a
            INNER JOIN categorie c 
            ON a.id_categorie = c.id
            WHERE titre LIKE '$mCle%' OR auteur LIKE '$mCle%' OR description LIKE '$mCle%' OR nom LIKE '$mCle%' OR nom LIKE '$mCle%'";    

}else{

$sql = "SELECT * FROM articles a
        INNER JOIN categorie c
        ON a.id_categorie = c.id
        ORDER BY id_a";
}


$result = mysqli_query($conn, $sql);


?>

<?php require_once('../partials/header.inc'); ?>

<div class="container">
    <h1 class="text-center mt-5">Administration</h1>
    <div class="row">
    <form action="<?=$_SERVER['PHP_SELF']; ?>" method="post">
    <div class="input-group justify-content-end col-6">
        <input type="search" class="form-control offset-9 col-3 text-center" name="search" id="search" placeholder="Rechercher">
        <button type="submit" name="submit"><i class="fas fa-search"></i></button>
    </div>
    <div class="col-6"><a href="ajouter.php" class="btn mb-2 text-dark"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
</form>
    </div>
    <table class="table  table-hover text-center" style="background-color: white;">
        <thead class="">
            <tr>
                <th>Id</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Image</th>
                <th>Contenu</th>
                <th>Date de création</th>
                <th>Catégorie</th>
                <th colspan="2" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $rows['id_a'] ?></td>
                    <td><?= $rows['titre'] ?></td>
                    <td><?= $rows['auteur'] ?></td>
                    <td><img src="../assets/images/<?= $rows['image'] ?>" width="100" alt=""></td>
                    <td><?= $rows['description'] ?></td>
                    <td><?= $rows['date_created'] ?></td>
                    <td><?= $rows['nom'] ?></td>

                    <td><a href="editer.php?id=<?= $rows['id_a']; ?>" class="btn" ><i class="fas fa-edit"></i></a></td>
                    <?php if(isset($_SESSION['ok']) && $_SESSION['ok']['role'] == 1){ ?>
                    <td>
                        <a href="supprimer.php?id=<?= $rows['id_a']; ?>" class="btn" onclick="return confirm('Etes vous sur de vouloir supprimer cet article')"><i class="fas fa-trash"></i></a>
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once('../partials/footer.inc'); ?>