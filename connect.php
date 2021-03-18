<?php
$conn = mysqli_connect('localhost', 'root', '', 'appblog');
if(!$conn){
    echo "Erreur de connexion: ".mysqli_connect_error($conn)." ".mysqli_connect_errno();
}

?>