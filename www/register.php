<?php
require("./partials/header.php");
require("./classes/User.php");
require("./modeles/user.php");
permCheck3($_SESSION["user"][0]["role"]);

if($_POST!=[]){
    $strRegex = "/^\D{1,100}$/";
    $emailRegex = "/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/";
    $pwdRegex = "/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@\/=+#*!])[a-zA-Z0-9@\/=+#*!]{8,20}$/";
    if(!isset($_POST['nom']) || !preg_match($strRegex, $_POST['nom'])){
        $erreur['nom']='Ce nom contient des charactères interdits';
    }

    if(!isset($_POST['prenom']) || !preg_match($strRegex, $_POST['prenom'])){
        $erreur['prenom']='Ce prenom contient des caractères interdits';
    }

    if(!isset($_POST['email']) || !preg_match($emailRegex, $_POST['email'])){
        $erreur['email']='Cette adresse email contient des caractères interdits';
    }

    if(!isset($_POST['password']) || !preg_match($pwdRegex, $_POST['password'])){
        $erreur['password']='Ce mot de passe contient des caractères interdits';
    }
    
    if(checkEmail($_POST['email'])){
        $erreur['email']="Cette adresse email est déjà enregistée";
    }

    if($_POST['role'] == "Rôle"){
        $erreur['role']="Veuillez indiquer un role.";
    }

    if(empty($erreur)){
        $user=new User();
        foreach($_POST as $key => $value){
            if($key=="password"){
                $user->setPassword($value);
            }else{
                $user->$key=$value;
            }
        }
        register($user);
        header("Location: http://localhost/eliot_ayrault-php-DM/www/index.php");
    }
}
?>

<main>
        <form class="w-75 mx-auto my-5 border p-2" action="" method="post">
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="staticEmail" placeholder="email@example.com" name="email">
                </div>
                <?=isset($erreur['email']) ? "<div class=\"alert alert-danger\" role=\"alert\">" .$erreur['email']."</div>" : ""?>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="staticEmail" placeholder="Votre nom" name="nom">
                </div>
                <?=isset($erreur['nom']) ? "<div class=\"alert alert-danger\" role=\"alert\">" .$erreur['nom']."</div>" : ""?>
            </div>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Prénom</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control-plaintext" id="staticEmail" placeholder="Votre prénom" name="prenom">
                </div>
                <?=isset($erreur['prenom']) ? "<div class=\"alert alert-danger\" role=\"alert\">" .$erreur['prenom']."</div>" : ""?>
            </div>
            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Mot de passe</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" id="inputPassword" name="password">
                </div>
                <?=isset($erreur['password']) ? "<div class=\"alert alert-danger\" role=\"alert\">" .$erreur['password']."</div>" : ""?>
            </div><select class="form-select" aria-label="Default select example" name="role">
                <option selected name="role">Rôle</option>
                <option value="1">ouvrier</option>
                <option value="2">gestionnaire</option>
                <option value="3">administrateur</option>
            </select>
            <?=isset($erreur['role']) ? "<div class=\"alert alert-danger\" role=\"alert\">" .$erreur['role']."</div>" : ""?>
            <button type="submit" class="btn btn-secondary mt-3">Valider</button>
        </form>
    </main>
</body>
</html>
