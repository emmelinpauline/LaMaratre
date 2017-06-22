<?php

require_once "../connect.php";
//
$sql = "SELECT `nom`, `img`, `description` FROM `cadeaux` WHERE `id` = :id;";

$stmt = $pdo-> prepare($sql);
$stmt -> bindValue (":id", $_GET['id']);
$stmt->execute();

?>


<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Page Produits</title>
    <link rel="stylesheet" href="stylesheet.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
    <link href="https://fonts.googleapis.com/css?family=Sacramento" rel="stylesheet">
</head>
<html>

<body>
<main class="container clearfix">
    <?php include('includes/header.php') ?>
    <section class="filtres wfull">
        <h3 id="choix">Tu aimes ta Marâtre ?</h3>

    </section>

    <section class="detail">

        <?php while ($pdts = $stmt->fetch(PDO::FETCH_ASSOC)):?>

<!--            création de la variable produit qui va chercher
                dans le tableau associatif tous les champs spécifiés
                dans ma requete SELECT
-->
            <article class="wfull">
                <h3 class="w33 lenom"><?= $pdts['nom'] ?> </h3>
                <div class="leproduit">
                    <img class="w33" src="img-content/<?= $pdts['img'] ?> " alt="">
                    <p class="w75 description"><?= $pdts['description'] ?> </p>
                </div>
            </article>

        <?php endwhile; ?>

    </section>
    <?php include('includes/footer.php') ?>
</main>
</body>

</html>