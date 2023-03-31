<?php 
session_start();

if(isset($_POST['submit'])) {

    $name = filter_input(INPUT_POST, "name",  FILTER_SANITIZE_STRING); 
    $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // FILTER_FLAG_ALLOW_FRACTION -> permet l'utilisation de . ou , pour les nombre décimaux
    $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // Nota bene 2 : fonction filter_input()

    if($name && $price && $qtt){

        $product = [
            "name" => $name,
            "price" => $price,
            "qtt" => $qtt,
            "total" => $price*$qtt
        ];

    $_SESSION['products'][]=$product; // Nota bene 3 : variable _SESSION
    } 
}                               //Note 1 : sur l'intéret du code l. 4 à 8
header("Location:index.php"); //Nota bene 1 :  pour Header ici 