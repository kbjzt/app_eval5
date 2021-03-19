<?php
require_once('security.inc');
require_once('../connect.php');

if(isset($_GET['id']) && $_GET['id'] < 1000){
    $id = (int)htmlspecialchars(addslashes($_GET['id']));

    $sql = "DELETE FROM utilisateurs WHERE id =".$id;
    $result = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0){
        header('location:utilisateurs.php');
    }else{
        echo'<div class="">Erreur de suppression</div>';
    }
}

?>