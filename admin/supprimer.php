<?php
require_once('security.inc');
require_once('../connect.php');

if(isset($_GET['id']) && $_GET['id'] < 1000){
    $id = (int)htmlspecialchars(addslashes($_GET['id']));

    $req = "SELECT image FROM articles WHERE id_a =".$id;
    $res = mysqli_query($conn, $req);
    $data = mysqli_fetch_assoc($res);
    var_dump($data);

    $sql = "DELETE FROM articles WHERE id_a =".$id;
    $result = mysqli_query($conn, $sql);

    if(mysqli_affected_rows($conn) > 0){
        copy('assets/images/'.$data['image'], 'assets/archives/'.$data['image']);
        unlink('assets/images/'.$data['image']);
        header('location:liste.php');
    }else{
        echo'<div class="">Erreur de suppression</div>';
    }
}

?>