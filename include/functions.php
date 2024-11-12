<?php

function secure(){

    $loginMessage="";

    if(!isset($_SESSION['id'])){
        $loginMessage="Please login in login first!";
       header("Location:index.php");
        die();
    }
    
}