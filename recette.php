<?php
require('header.php');
?>
 <?php

    $db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
    $req = $db->prepare('SELECT * FROM article WHERE idarticle = :idarticle');
    $req->execute(array('idarticle' => $_GET['idarticle']));
    $resultat = $req->fetch();
?> 
<main id="main_recette">
    <section class="section_recette">
        <img src="images/<?php echo $resultat['image']; ?>">
        <p>
        <?php
         echo $resultat['nom'];
        ?>
        <h4>Nulla gravida condimentum justo nec rhoncus</h4>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam modi placeat est aliquam earum recusandae, debitis doloribus ratione architecto, vitae ex quibusdam. Dolorum molestiae
        praesentium, eos veniam numquam sint ex!
        </p>
        <hr>
        <input type="submit" value="Voir plus">
        <form action="">
            <h3>laisser un commentaire</h3>
            <input type="text" placeholder="pseudo">
            <textarea name="" id="" cols="30" rows="10" placeholder="commentaire"></textarea>
            <input type="submit" value="Envoyer">
        </form>
        <img src="images/<?php echo $resultat['image']; ?>">
        <h4>Nulla gravida condimentum justo nec rhoncus</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae illum doloribus expedita laboriosam, temporibus vel architecto molestiae fugit nisi nesciunt officiis aperiam nulla,
            fugiat incidunt error consectetur molestias non distinctio.</p>
            <button type="submit" action="voir" class="button"><a class="voir" href="recette.php">Voir plus</a></button>
    </section>
</main>

<?php
require('footer.php');
?> 