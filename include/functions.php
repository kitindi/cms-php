<?php

function secure(){
    
    if(!isset($_SESSION['user_id'])){
       
        // echo "please enter login details";
       header("Location:index.php");
        die();
    }
    
}

function set_message($message){

$_SESSION['message'] = $message;
}


function getMessage(){
 if(!isset($_SESSION['message'])){
    echo "<p>".$_SESSION['message']."</p>";
    unset($_SESSION['message']);
}
}