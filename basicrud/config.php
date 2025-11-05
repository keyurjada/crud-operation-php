<?php
    $mys = new mysqli("localhost","root","","employees");
    if($mys->connect_error){
        die("Connection failed : " . $mys->connect_error);
    }   
    session_start();
?>