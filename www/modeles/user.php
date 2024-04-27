<?php
require_once("./inc/db.php");

function register($user){
    require("./inc/db.php");

    $plainPassword=$user->getPassword();
    $hashedPassword=hash('sha512', $plainPassword);
    $sql="INSERT INTO `user` (`email`, `nom`, `prenom`, `password`, `role`) VALUES(?, ?, ?, ?, ?);";
    $request=$pdo->prepare($sql);
    $request->execute(array($user->email, $user->nom, $user->prenom, $hashedPassword, $user->role));
}

function checkEmail($email){
    require("./inc/db.php");
    $sql="SELECT * FROM `user` WHERE `email`='$email';";
    $request=$pdo->query($sql);
    $result=$request->fetchAll(PDO::FETCH_ASSOC);
    return !empty($result);
}

function login($user){
    require("./inc/db.php");
    $hashedPassword=hash('sha512', $user->getPassword());
    $sql="SELECT `email`, `nom`, `prenom`, `role` FROM `user` WHERE `email`='$user->email' AND `password`='$hashedPassword';";
    $request=$pdo->query($sql);
    $result=$request->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}