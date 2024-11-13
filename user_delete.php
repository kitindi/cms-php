<?php
include 'include/config.php';
include 'include/database.php';
include 'include/functions.php';

secure();

$uid =$_GET['user_id'];

$sql = "DELETE FROM users WHERE user_id = :user_id";
$statement = $conn->prepare($sql);
$statement->execute([':user_id' =>$uid]);
header('Location:users.php');
die();