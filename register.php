<?php
require('header.php');

?>
<!-- inscription -->
<?php
$nom = $prenom = $pseudo = $password = $email = "";
$nomError = $prenomError = $pseudoError = $passwordError = $emailError = $roleError = "";
$isValid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = verifyInput($_POST["nom"]);
    $prenom = verifyInput($_POST["prenom"]);
    $pseudo = verifyInput($_POST["pseudo"]);
    $password = verifyInput($_POST["password"]);
    $email = verifyInput($_POST["email"]);
    $isValid = true;

    if (empty($nom)) {
        $nomError = "Le nom ne peut pas etre vide";
        $isValid = false;
    }
    if (empty($prenom)) {
        $prenomError = "Le prenom ne peut pas etre vide";
        $isValid = false;
    }
    if (empty($pseudo)) {
        $pseudoError = "Le pseudo ne peut pas etre vide";
        $isValid = false;
    }
    if (empty($email)) {
        $emailError = "Le mail ne peut pas etre vide";
        $isValid = false;
    }
    if (empty($password)) {
        $passwordError = "Le mot de passe ne peut pas etre vide";
        $isValid = false;
    }
    if ($isValid) {
        $db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
        $resultats = $db->prepare("INSERT INTO `users` ( `nom`, `prenom`, `pseudo`, `password`, `email`, `role`) values (:nom, :prenom, :pseudo, :password, :email, :role)");
        $resultats->execute(['nom' => $nom, 'prenom' => $prenom, 'pseudo' => $pseudo, 'password' => $password, 'email' => $email, 'role' => 'user']);
        
    }

    
}

function verifyInput($var)
{
    $var = trim($var);              //enlever les space suplementaiere
    $var = stripslashes($var);      //enlever tout les anti_slass
    $var = htmlspecialchars($var); //securiter
    return $var;
}

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
                <input type="password" name="password" placeholder="votre mot de passe" value="<?php echo $password; ?>">
                <p class="error"><?php echo $passwordError; ?></p>
                <input type="submit" name="bouton" value="Inscription">
                <p class="merci" style="display:<?php if ($isValid) echo 'block';
                                                else echo 'none'; ?>">votre compte a bien été crée:)</p>
                <p class="register">Déjà inscrit?
                    <a href="connexion.php">Connectez-vous ici</a>
                </p>
            </form>
        </div>
    </article>
</main>

<?php
require('footer.php');
?>