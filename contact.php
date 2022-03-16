<?php
require('header.php');
?>
<?php
require('code.php');
?>
<main>
    <section class="section_contact">
        <article class="article_contact">

            <form id="contact_form" method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" role="form">
                <h2>Nous contactez</h2>
                <label classe="labelmail" for="email">E-mail*</label>
                <input type="text" id="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>">
                <p class="error"><?php echo $emailError; ?></p>
                <label class="labelmessage" for="message">Message*</label>
                <textarea name="message" id="message" cols="30" rows="10"><?php echo $message; ?></textarea>
                <p class="error"><?php echo $messageError; ?></p>
                <input type="submit" value="Envoyer" class="button">
                <p class="merci" style="display:<?php if ($isSuccess) echo 'block';
                                                else echo 'none'; ?>">votre message à bien été envoyé.Merci de m'avoir contacter :)</p>
            </form>
        </article>
    </section>
</main>
<?php
require('footer.php');
?>