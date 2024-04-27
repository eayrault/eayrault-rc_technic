<?php
require("./partials/header.php");
require("./classes/Materiel.php");
require("./modeles/materiel.php");
permCheck1($_SESSION["user"][0]["role"]);
$materiels = getMateriel();
?>
<main>
        <section class="text-center my-5">
            <table class="table">
                <thead>
                    <th>Nom</th>
                    <th>Référence</th>
                    <th>Marque</th>
                    <th>Prix</th>
                    <th>Quantité</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach($materiels as $value){?>
                    <tr>
                        <td><?=$value['nom']?></td>
                        <td><?=$value['reference']?></td>
                        <td><?=$value['marque']?></td>
                        <td><?=$value['prix']?></td>
                        <td><?=$value['quantite']?></td>
                        <td><form action="form_materiel.php"><button class="btn btn-warning" type="submit">Modifier</button></form></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>