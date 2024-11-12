<?php

function secure(){
    
    if(!isset($_SESSION['user_id'])){
       
        echo "please enter login details";
    //    header("Location:index.php");
        die();
    }
    
}