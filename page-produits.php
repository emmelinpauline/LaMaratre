<?php

require_once "../connect.php";


$sql = "SELECT `nom`, `id`,`img` FROM `cadeaux` WHERE 1\n";
$typebon = [
    "unpeu",
    "beaucoup",
    "pasvraiment"
];

$bind = false;
if (isset($_GET['type']) && in_array($_GET['type'], $typebon)) {
    //
    $bind = true;
    $sql .= "AND  `type`= :type\n";
}
$sql .= "AND `visible` = 1\n";
$stmt = $pdo->prepare($sql);
if (true === $bind) {
    $stmt->bindValue(":type", $_GET['type']);
}
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
    <section class="clearfix wfull">
        <h3 id="choix">Tu aimes ta Marâtre ?</h3>
       <nav class="filtres">
            <ul class="ulfiltres">

                <li class="filtreli"><a href="page-produits.php?type=unpeu">Un peu</a></li>
                <li class="filtreli"><a href="page-produits.php?type=beaucoup" class="active">Beaucoup</a></li>
                <li class="filtreli"><a href="page-produits.php?type=pasvraiment">Pas vraiment</a></li>
                <li class="filtreli" id="tout"><a href="page-produits.php">Tout</a></li>
             </ul>
       </nav>
    </section>

    <section class="produits">
        <?php while ($pdts = $stmt->fetch(PDO::FETCH_ASSOC)): ?>

            <article class="">
                <a href="detail.php?id=<?= $pdts['id'] ?>">
                <img src="img-content/<?= $pdts['img'] ?> " alt="">
                <h3 class="nom"><a href=""><?= $pdts['nom'] ?></a></h3>
                </a>
            </article>


        <?php endwhile; ?>

    </section>
    <?php include('includes/footer.php') ?>
</main>
</body>

</html>