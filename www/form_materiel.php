<?php
require("./partials/header.php");
require("./classes/Materiel.php");
require("./modeles/materiel.php");
require("./modeles/marques.php");
$role = $_SESSION["user"][0]["role"];
permCheck1($role);
$marques = getMarques();

if($_POST!=[]){
    if($_POST['marque'] == "Marque"){
        $erreur['role']="Veuillez indiquer une marque.";
    }

    if (empty($_POST['nom'])) {
        $erreur['nom']="Veuillez indiquer une nom.";
    }

    if (empty($_POST['reference'])) {
        $erreur['reference']="Veuillez indiquer une référence.";
    }

    if (empty($_POST['quantite'])) {
        $erreur['quantite']="Veuillez indiquer une quantité.";
    }

    if (empty($_POST['prix'])) {
        $erreur['prix']="Veuillez indiquer un prix.";
    }

    if(empty($erreur)){
        $materiel=new Materiel();
        foreach($_POST as $key => $value){
            $materiel->$key=$value;
        }
        createMateriel($materiel);
        header("Location: http://localhost/eliot_ayrault-php-DM/www/index.php");
    }
}
?>
<main>
        <form class="w-75 mx-auto my-5 border p-2" action="" method="post">
            <?php if($role >= 2) { ?>
                <select class="form-select" aria-label="Default select example" name="marque">
                <option selected>Marque</option>
                <?php
                foreach($marques as $value){?>
                    <option value="<?=$value['nom']?>"><?=ucfirst($value['nom'])?></option>
                <?php } ?>
                </select>
                <?=isset($erreur['marque']) ? "<div class=\"alert alert-danger\" role=\"alert\">" . $erreur['marque']."</div>" : ""?>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Nom</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticEmail" placeholder="Interrupteur" name="nom">
                    </div>
                    <?=isset($erreur['nom']) ? "<div class=\"alert alert-danger\" role=\"alert\">" . $erreur['nom']."</div>" : ""?>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Référence</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control-plaintext" id="staticEmail" placeholder="RX1385" name="reference">
                    </div>
                    <?=isset($erreur['reference']) ? "<div class=\"alert alert-danger\" role=\"alert\">" . $erreur['reference']."</div>" : ""?>
                </div>
                <div class="mb-3 row">
                    <label for="staticEmail" class="col-sm-2 col-form-label">Prix d'achat</label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control-plaintext" id="staticEmail" placeholder=2.30 name="prix">
                    </div>
                    <?=isset($erreur['prix']) ? "<div class=\"alert alert-danger\" role=\"alert\">" . $erreur['prix']."</div>" : ""?>
                </div>
            <?php } ?>
            <div class="mb-3 row">
                <label for="staticEmail" class="col-sm-2 col-form-label">Quantité</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control-plaintext" id="staticEmail" placeholder=10 name="quantite">
                </div>
                <?=isset($erreur['quantite']) ? "<div class=\"alert alert-danger\" role=\"alert\">" . $erreur['quantite']."</div>" : ""?>
            </div>
            <button type="submit" class="btn btn-secondary mt-3">Valider</button>
        </form>
    </main>
</body>
</html>