<?php
require("./partials/header.php");
?>
<main>
        <section class="text-center my-5">
        <?php
        if (isset($_SESSION["user"])){
            $nom = $_SESSION["user"][0]["prenom"];
            echo '<h1>Bonjour et bienvenue sur le site de gestion de RC-Technic, ' . $nom . '.</h1>';
        } else {
            echo '<h1>Bonjour, merci de vous connecter : <a href="login.php">ici</a></h1>';
        }
        ?>
        </section>
    </main>
</body>
</html>