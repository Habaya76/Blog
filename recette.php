<?php
require('header.php');

$db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
$req = $db->prepare('SELECT * FROM article WHERE idarticle = :idarticle');
$req->execute(array('idarticle' => $_GET['idarticle']));
$resultat = $req->fetch();

$date = new DateTime();
$email = $message = "";
$emailError = $messageError = "";
$isSuccess = false;
$idarticle = $_GET['idarticle'];
$idusers = $_SESSION['idusers'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = verifyInput($_POST["email"]);
    $message = verifyInput($_POST["message"]);
    $isSuccess = true;



    if (empty($email)) {
        $emailError = "saisir email balala";
        $isSuccess = false;
    }
    if (empty($message)) {
        $messageError = 'veillez saissir un message';
        $isSuccess = false;
    }
    if ($isSuccess) {

        //controler la connexion
        $resultats = $db->prepare("INSERT INTO `comments` ( `comments`, `date`,`idusers`, `idarticle`) values (:comments, :date, :idusers, :idarticle)");
        $resultats->execute(['comments' => $message, 'date' => $date->format('Y-m-d H:m:s'), 'idarticle' => $idarticle, 'idusers' => $idusers]);
    }
}

function isEmail($var)
{
    return filter_var($var, FILTER_VALIDATE_EMAIL);
}

// FONCTION POUR VERIFIER NOS INPUT
function verifyInput($var)
{
    $var = trim($var);              //enlever les space suplementaiere
    $var = stripslashes($var);      //enlever tout les anti_slass
    $var = htmlspecialchars($var); //securiter
    return $var;
}

?>
<main id="main_recette">
    <section class="section_recette">
        <img src="images/<?php echo $resultat['image']; ?>">
        <p>
            <?php
            echo $resultat['nom'];
            ?>
        <h4>Nulla gravida condimentum justo nec rhoncus</h4>
        <p> ipsum dolor sit amet consectetur adipisicing elit.
            Ullam modi placeat est aliquam earum recusandae,
            debitis doloribus ratione architecto,
            vitae ex quibusdam!
        </p>
        <hr>
        <input type="submit" value="Voir plus">
        <form action="" method="POST">
            <h4>laisser un commentaire</h4>
            <input type="email" placeholder="E-mail" name="email" value="<?php echo $email; ?>">
            <p class="error"><?php echo $emailError; ?></p>
            <textarea name="message" id="" cols="30" rows="10" placeholder="message"><?php echo $message; ?></textarea>
            <p class="error"><?php echo $messageError; ?></p>
            <input type="submit" value="Envoyer">
            <p class="merci" style="display:<?php if ($isSuccess) echo 'block';
                                            else echo 'none'; ?>">votre message à bien été envoyé.Merci de vous avoir contacter :)</p>

        </form>
    </section>
</main>

<?php
require('footer.php');
?>