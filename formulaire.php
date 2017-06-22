<?php
require_once('../connect.php');

$sql = "INSERT INTO `temoignage`
(`nom`,
`commentaire`,
`visible`) VALUES
(:nom,
:commentaire);";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(":nom", $_POST['nom']?? '');
$stmt->bindValue(":commentaire", $_POST['commentaire']?? '');
$stmt->execute();


if(isset($_GET['v'])){
    $visible = $_GET['v'];
} else {
    $visible = 1;
}
$sql = "SELECT `nom`, `commentaire` FROM `temoignage` WHERE `visible` =1;";
//$sql = "SELECT `nom`, `commentaire` FROM `pokemon` WHERE `visible` = 1 ;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>

    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>formulaire</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Oswald">
        <link rel="stylesheet" href="stylesheet.css"> </head>

    <body>
        <main>
            <?php include('includes/header.php')?>

                <section class="clearfix lestemoignages">
                    <h2 class="titre">Quel est le pire cadeau que v&ocirc;tre Mar&acirc;tre vous ait offert ? </h2>
                    <div class="lescommentaires">
                        <table>
                            <thead>
                            <th id="pseudo">Nom</th>
                            <th id="temoignage">Témoignages</th>
                            </thead>
                            <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)):?>
                                <tr>
                                    <td>
                                        <?=$row['nom']?>
                                    </td>

                                    <td>
                                        <?=$row['commentaire']?>
                                    </td>

                                </tr>
                            <?php endwhile;?>
                        </table> </div>


                    <article class="formulaire">
                        <form action="../addcommentaire.php" method="post">
                            <p>
                                <label for="nom">Nom</label>
                                <br/>
                                <input type="text" name="nom" id="nom" placeholder="votre nom"> </p>

                                <p>
                                    <label for="type">Description</label>
                                    <br/>
                                    <textarea name="commentaire" id="" cols="40" rows="20" placeholder="Ecrivez ici votre texte"></textarea>
                                </p>
                                <input class="submit" type="submit" value="Envoyez c'est pesé" onclick="return alert('Merci d\'avoir partagé votre expérience avec nous.')">
                        </form>
                    </article>
                </section>
                <?php include('includes/footer.php')?>
        </main>

    </body>

    </html>