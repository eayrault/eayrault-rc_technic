<?php
require("./partials/header.php");
require("./classes/Marques.php");
require("./modeles/marques.php");
permCheck2($_SESSION["user"][0]["role"]);
$marques = getMarques();
?>
<main>
        <section class="text-center my-5">
            <table class="table">
                <thead>
                    <th>Nom</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    <?php
                    foreach($marques as $value){?>
                    <tr>
                        <td><?=$value['nom']?></td>
                        <td><?=$value['contact']?></td>
                        <td><?=$value['email']?></td>
                        <td><form action="form_marque.php"><button class="btn btn-warning" type="submit">Modifier</button></form></td>
                    </tr>
                    <?php } ?>
                    <!-- <tr>
                        <td>Toshiba</td>
                        <td>M. Toriyama</td>
                        <td>akira-rip@fake.com</td>
                        <td><form action="form_marque.php"><button class="btn btn-warning" type="submit">Modifier</button></form></td>
                    </tr>
                    <tr>
                        <td>Schneider</td>
                        <td>M. Wolff</td>
                        <td>dwolff@fake.com</td>
                        <td><form action="form_marque.php"><button class="btn btn-warning" type="submit">Modifier</button></form></td>
                    </tr>
                    <tr>
                        <td>Legrand</td>
                        <td>Mme Ursula</td>
                        <td>ursula-legrand@fake.com</td>
                        <td><form action="form_marque.php"><button class="btn btn-warning" type="submit">Modifier</button></form></td>
                    </tr> -->
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>