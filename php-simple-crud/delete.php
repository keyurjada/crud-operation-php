<?php 
    include('config.php');
    if(!isset($_SESSION['user'])) header("Location: index.php");
    $id = $_GET['id'];
    $mys->query("DELETE FROM employees WHERE id=$id");
    header("Location: dashboard.php");
?>