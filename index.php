<?php

require_once "../connect.php";


$sql = "SELECT `nom`, `id`,`img`,`description` FROM `cadeaux` WHERE `1`";
// Création d'une variable contenant un tableau
$typebon = [
    "unpeu",
    "beaucoup",
    "pasvraiment"
];
// par défaut bind = false
$bind = false;
// S
if (isset($_GET['type']) && in_array($_GET['type'], $typebon)) {
    //
    $bind = true;
    $sql .= "AND  `type`= :type\n";
}
$sql .= "AND `visible` = 1\n";
$stmt = $pdo->prepare($sql);
if (true === $bind) {
    //
    $stmt->bindValue(":type", $_GET['type']);
}
$stmt->execute();

?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Page d'accueuil</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet"> </head>

<body class="clearfix">
    <main>
        <div class="content">
            <?php include('includes/header.php')?>
                <!-- SECTION 1 - ACCROCHE ----->
                <section class="description">
                    <h2>Tu dois offrir un cadeau à ta <span> chère </span>belle-mère</h2>
                    <p>Mais tu ne sais pas quoi lui offrir !<br>
                        Ne t'inquiète pas La Marâtre est là pour t'aider dans ta recherche</p>
                    <div class="decouvrir"><a href=""><a href="page-produits.php">Découvrir</a></div>

                        <!--<a href="page-produits.php">
                            <img id="accroche" src="img-content/cadeau.jpg">
                        </a> -->

                </section>

            <!------ SECTION 3 - MARATRE DE LA SEMAINE ----->

            <section class="maratre clearfix">
                <h2>La marâtre de la semaine</h2>
                <article class="">
                    <img id="maratredumois" src="img-content/belle-mere.jpg">
                    <div class="text-description">
                    <h4>La possessive</h4>
                    <p>La Marâtre possessive a bien du mal à vous confier la garde de son chère et tendre fils. Elle est
                        pleine de stratégies afin de rester le plus proche possible de sa création, en effet elle est parvenue
                        à obtenir un double des clefs de votre humble demeure et se permet ainsi de vous rendre en permanence quelques
                        visites surprises.</p>
                    </div>
                </article>
                <article class="">
                    <img id="maratredumois" src="img-content/belle-mere.jpg">
                    <div class="text-description">
                        <h4>La possessive</h4>
                        <p>La Marâtre possessive a bien du mal à vous confier la garde de son chère et tendre fils. Elle est
                            pleine de stratégies afin de rester le plus proche possible de sa création, en effet elle est parvenue
                            à obtenir un double des clefs de votre humble demeure et se permet ainsi de vous rendre en permanence quelques
                            visites surprises.</p>
                    </div>
                </article>

            </section>


                <?php include('includes/footer.php')?>
        </div>
    </main>
</body>

</html>