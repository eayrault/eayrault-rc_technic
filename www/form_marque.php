<?php
require("./partials/header.php");
require("./classes/Marques.php");
require("./modeles/marques.php");
permCheck2($_SESSION["user"][0]["role"]);

if($_POST!=[]){
    $strRegex = "/^\D{1,100}$/";
    $emailRegex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";

    if(!isset($_POST['nom']) || !preg_match($strRegex, $_POST['nom'])){
        $erreur['nom']='Ce nom contient des charactères interdits';
    }

    if(!isset($_POST['email']) || !preg_match($emailRegex, $_POST['email'])){
        $erreur['email']='Cette adresse email contient des caractères interdits';
    }

    if(empty($_POST['contact'])){
        $erreur['contact']='Veuillez indiquer une personne à contacter';
    }

    if(empty($erreur)){
        $marque=new Marque();
        foreach($_POST as $key => $value){
            $marque->$key=$value;
        }
        createMarque($marque);
        header("Location: http://localhost/eliot_ayrault-php-DM/www/index.php");
    }
}
?>
    <main>
        <form class="w-75 mx-auto my-5 border p-2" action="" method="post">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="staticEmail" placeholder="Schneider" name="nom">
                </div>
                <?=isset($erreur['nom']) ? "<div class=\"alert alert-danger\" role=\"alert\">" . $erreur['nom']."</div>" : ""?>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Personne à contacter</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="staticEmail" placeholder="M. Bidule" name="contact">
                </div>
                <?=isset($erreur['contact']) ? "<div class=\"alert alert-danger\" role=\"alert\">" . $erreur['contact']."</div>" : ""?>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="staticEmail" placeholder=michel@fake.com name="email">
                </div>
                <?=isset($erreur['email']) ? "<div class=\"alert alert-danger\" role=\"alert\">" . $erreur['email']."</div>" : ""?>
            </div>
            <button class="btn btn-secondary mt-3">Valider</button>
        </form>
    </main>
</body>
</html>