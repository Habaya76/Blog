<?php
require('header.php');
?>

<main id="main_admin">
<form action="afficheAdmin" >
    <section id="admin">
      <div id="contenuAdmin">
        <h2 id=admin> Administration</h2>
        <button type="submit" action="ajout" class="button"><a class="ajou" href="ajout.php">Ajouter</a></button>
        <button type="submit" action="messageRecu" class="button"><a class= "ajou" href="contact.php">Contact</a></button>
      </div>
      <table>
        <tr>
          <td name="idArticle">id</td>
          <td name="title">Titre</td>
          <td name="category">Catégorie</td>
          <td>Action
          </td>
        </tr>
          <tr>
            <td name="idArticle"><?php echo $value['idArticle']; ?></td>
            <td name="title"><?php echo $value['title']; ?></td>
            <td name="category"><?php echo $value['category']; ?></td>
            <td id="button">
            </form>
              <form action="ajoutArticle">
                <button type="submit" action="ModiferArticle" class="button">Modifier</button>
              </form>
              <form action="supprimerArticle">
                <button type="submit" action="SupprimerArticle" class="button">Supprimer</button>
              </form>
            </td>
        </tr>
      </table>
      </form>
</main>
<?php
require('footer.php');
?>
