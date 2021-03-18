<?php
session_start();
if(!isset($_SESSION['ok'])){
    header('location:index.php');
}

?>