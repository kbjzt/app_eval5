<?php
require_once('security.inc');
require_once('../connect.php');

session_start();
if(isset($_SESSION['ok']) && $_SESSION['ok']['role'] != 1){
    header('location:index.php');
}


$sql = "SELECT * FROM utilisateurs";


$result = mysqli_query($conn, $sql);


?>

<?php require_once('../partials/header.inc'); ?>

<div class="container"  style="margin-bottom: 327px;">
    <h3 class="text-center mt-5">Liste des utilisateurs</h3>
    <div class="row">
    <div class="col-6"><a href="addUser.php" class="btn mb-2 text-dark"><i class="fa fa-plus" aria-hidden="true"></i></a></div>
    </div>
    <table class="table  table-hover text-center" style="background-color: white;" >
        <thead class="">
            <tr>
                <th>Id</th>
                <th>Login</th>
                <th>Mot de passe</th>
                <th>Role</th>
                <th>Date de création</th>
                <th colspan="2" class="text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($rows = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?= $rows['id'] ?></td>
                    <td><?= $rows['login'] ?></td>
                    <td><?= $rows['pass'] ?></td>
                    <td><?= $rows['role'] ?></td>
                    <td><?= $rows['created'] ?></td>

                    <td><a href="editUser.php?id=<?= $rows['id']; ?>" class="btn" ><i class="fas fa-edit"></i></a></td>
                    <?php if(isset($_SESSION['ok']) && $_SESSION['ok']['role'] == 1){ ?>
                    <td>
                        <a href="delUser.php?id=<?= $rows['id']; ?>" class="btn" onclick="return confirm('Etes vous sur de vouloir supprimer cet utilisateur')"><i class="fas fa-trash"></i></a>
                    </td>
                    <?php } ?>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once('../partials/footer.inc'); ?>