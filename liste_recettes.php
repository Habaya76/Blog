<?php
require('header.php');
?>
<?php

require_once('code.php');
?>
<main id="main_listerecettes">
    <section class="section_listerecettes">
        <?php
        while ($row = $resultats->fetch()) :
           
        ?>
            <article class="article_listerecettes">
                <div id="liste">
                <img src="images/<?php echo $row['image']; ?>">
                <p><?php
                     echo $row['nom'];
                    ?></p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                     Magni tempora nisi necessitatibus nemo eos aspernatur soluta suscipit.
                     Illum vero itaque fugit nam aliquid, incidunt voluptatem expedita nisi rerum eos quaerat?<?php
                    // echo $row['image'];
                    ?> </p>
               <button type="submit" action="voir" class="button"><a class="voir" href="recette.php?idarticle=<?php echo $row['idarticle'];?> ">Voir plus</a></button>
                </div>
            </article>

        <?php
        endwhile;
        ?>
    </section>
</main>
<?php
require('footer.php');
?>