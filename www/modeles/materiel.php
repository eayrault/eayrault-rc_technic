<?php
require_once("./inc/db.php");

function getMateriel(){
    require("./inc/db.php");

    $sql="SELECT * FROM `materiel`;";
    $request=$pdo->query($sql);
    $result=$request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function getStock(){
    require("./inc/db.php");

    $sql="SELECT `quantite` FROM `materiel`;";
    $request=$pdo->query($sql);
    $result=$request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}

function createMateriel($materiel){
    require("./inc/db.php");

    $sql="INSERT INTO `materiel` (`marque`, `nom`, `reference`, `quantite`, `prix`) VALUES(?, ?, ?, ?, ?);";
    $request=$pdo->prepare($sql);
    $request->execute(array($materiel->marque, $materiel->nom, $materiel->reference, $materiel->quantite, $materiel->prix));
}