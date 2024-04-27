<?php
require_once("./inc/db.php");

function getMarques(){
    require("./inc/db.php");

    $sql="SELECT * FROM `marque`;";
    $request=$pdo->query($sql);
    $result=$request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function createMarque($marque){
    require("./inc/db.php");

    $sql="INSERT INTO `marque` (`nom`, `contact`, `email`) VALUES(?, ?, ?);";
    $request=$pdo->prepare($sql);
    $request->execute(array($marque->nom, $marque->contact, $marque->email));
}