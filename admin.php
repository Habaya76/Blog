<?php
require('header.php');


$db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');

$resultats = $db->query('SELECT * FROM `article` INNER JOIN categorie On categorie.idcategorie = article.idcategorie ' , PDO::FETCH_ASSOC);
$resu = $resultats->fetchAll();

?>

<main id="main_admin">
  <section id="admin">
    <div id="contenuAdmin">
      <h2 id=admin> Administration</h2>
      <button action="ajout" class="button"><a class="ajou" href="ajout.php">Ajouter</a></button>
      <button action="messageRecu" class="button"><a class="ajou" href="contact.php">Contact</a></button>
    </div>
    <table>
      <thead>
        <tr>
          <th name="idarticle">id</th>
          <th name="Nom">Titre</th>
          <th name="category">Catégorie</th>
          <th>Action
          </th>
        </tr>
      </thead>
      <tbody>
        <?php
        for ($i = 0; $i < count($resu); $i++) :
        ?>

          <tr>
            <td name="idArticle"><?php echo $resu[$i]['idarticle'] ?></td>
            <td name="Nom"><?php echo $resu[$i]['nom'] ?></td>
            <td name="category"><?php echo $resu[$i]['categorie'] ?></td>
            <td >

              <button action="ModiferArticle" class="button"><a class="ajou" href="modifie_article.php">Modifier</a></button>
              <button action="SupprimerArticle" class="button"><a class="ajou" href="²">Suprimer</a></button>

            </td>
          </tr>
        <?php
        endfor;
        ?>

      </tbody>
    </table>

</main>
<?php
require('footer.php');
?>