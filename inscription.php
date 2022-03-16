<?php
require('header.php');
?>

<main class="main_inscription">
    <article class="article_inscription">
        <div id="inscri">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form_inscription">
                <h1>Inscription</h1>
                <label for="">Nom</label>
                <input type="text" name="nom" placeholder="votre nom" value="<?php echo $nom; ?>">
                <p class="error"><?php echo $nomError; ?></p>
                <label for="">Prenom</label>
                <input type="text" name="prenom" placeholder="votre prenom" value="<?php echo $prenom; ?>">
                <p class="error"><?php echo $prenomError; ?></p>
                <label for="">Pseudo</label>
                <input type="text" name="pseudo" placeholder="votre pseudo" value="<?php echo $pseudo; ?>">
                <p class="error"><?php echo $pseudoError; ?></p>
                <label for="">E-mail</label>
                <input type="email" name="email" placeholder="votre E-mail" value="<?php echo $email; ?>">
                <p class="error"><?php echo $emailError; ?></p>
                <label for="">Mot de passe</label>
                <input type="password" name="passwords" placeholder="votre mot de passe" value="<?php echo $passwords; ?>">
                <p class="error"><?php echo $passwordsError; ?></p>
                <input type="submit" name="" value="Inscription">
                <p class="merci" style="display:<?php if ($isValid) echo 'block';
                                                else echo 'none'; ?>">votre compte a bien été crée:)</p>
                  <p class="register">Déjà inscrit? 
	          <a href="connexion.php">Connectez-vous ici</a></p>
            </form>
        </div>
    </article>
</main>

<?php
require('footer.php');
?>