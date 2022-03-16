<?php
require_once('header.php');
?>
<?php

require_once('code.php');
?>
<main>
    <section class="section_connexion">
        <article class="article_connexion">
            <div id="container">
                <!-- zone de connexion -->
                <form id="form_connexion" action="" method="POST">
                    <h1>Connexion</h1>
                    <label><b>Nom d'utilisateur</b></label>
                    <input type="text" placeholder="user ou E-mail" name="email" value="<?php echo $email; ?>" required>
                    <p class="error"><?php echo $Error; ?></p>
                    <label><b>Mot de passe</b></label>
                    <input type="password" placeholder="Entrer le mot de passe" name="password" required>
                    <p class="error"><?php echo $Error; ?></p>
                    <input type="submit" id='submit' value='Connexion'>
                    <p class="register">Vous êtes nouveau ? cliquez ici pour <a href="register.php"> S'inscrire </a>
                </form>
            </div>
        </article>
    </section>
</main>
<?php
require_once('footer.php');
?>