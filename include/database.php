<?php

$dsn = "mysql:host=localhost;dbname=cms";
$username ="cms";
$password ="12345";

try {
    $conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connection successful";
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}