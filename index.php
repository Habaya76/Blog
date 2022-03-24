<?php
require_once('header.php');

$db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
$resultats = $db->query('SELECT * From article', PDO::FETCH_ASSOC);
?>

<main class="main_acceuil">
            <h2> Bienvenue sur Aventures Gustatives</h2>
            <div class="para">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Pariatur voluptates officiis nobis autem vero sit, possimus qui repellat sapiente consequatur dolorum cum similique eum soluta officia rerum perspiciatis delectus tempora?
                    Repellendus, aliquid quibusdam. Ex odit fugit recusandae, magni dicta repudiandae ipsam fuga architecto laborum quod vitae deleniti cum nesciunt possimus ratione atque temporibus exercitationem voluptatum, sunt dolores autem blanditiis. Impedit.
                    Eveniet nobis facere, ullam accusantium optio harum voluptatum
                    voluptas dolore fuga iste quibusdam impedit eos libero ex soluta
                    quaerat omnis! Non, voluptates! Ipsam dolor ullam recusandae iure adipisci, modi nobis.</p>
            </div>
            <div class="gauche">
                <h4>Bonjour</h4>
                <hr id="hr">

                <p>Lorem, ipsum dolor sit amet consectetur
                    adipisicing elit. Officiis, incidunt, dignissimos voluptates saepe quasi dicta excepturi
                    cum eum perspiciatis sunt minus vitae nihil nam minima
                    sit nisi deserunt sint autem.</p>
                <hr>
                <ul>
                    <li><a href=""><i class="fa-brands fa-instagram"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-facebook"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-pinterest"></i></a></li>
                    <li><a href=""><i class="fa-brands fa-youtube"></i></a></li>
                </ul>
                <hr>
                <h2>Elu meilleur blog culinaire</h2>
                <hr>
                <h4>ma derniere recette</h4>
                <hr id="hr">
                <img src="images/pasta.jpg" alt="image_pasta">
                <p>Nulla gravida condimention justo nec rhoncus</p>
                <button type="submit" action="voir" class="button_liste"><a class="voir" href="recette.php?idarticle=<?php echo $row['idarticle']; ?> ">Voir plus</a></button>
            </div>
            <?php
            while ($row = $resultats->fetch()) :
            ?>
                <div class="centre">
                    <img src="images/<?php echo $row['image']; ?>">
                    <ul class="info">
                        <li><i class="fa-solid fa-user"></i> Habaya</li>
                        <li>Le 22/03/2022</li>
                        <li>Plat</li>
                    </ul>
                    <h4>Nulla gravida condimentum justo nec rhoncus</h4>
                    <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam modi placeat est aliquam earum recusandae, debitis doloribus ratione architecto, vitae ex quibusdam. Dolorum molestiae
                    praesentium, eos veniam numquam sint ex!
                    <?php
                    echo $row['image'];
                    ?></p>
                    <button type="submit" action="voir" class="button_liste"><a class="voir" href="recette.php?idarticle=<?php echo $row['idarticle']; ?> ">Voir plus</a></button>
                </div>
            <?php
            endwhile;
            ?>
</main>
<?php
require_once('footer.php');
?>

<!-- reste css et boutons -->