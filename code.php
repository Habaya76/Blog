
<!-- connexion -->
<?php
$email = $password = "";
$Error = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($password)) {
        $db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
        $req = $db->prepare('SELECT email, password FROM users WHERE email = :email AND password = :password');
        $req->execute(array('email' => $_POST['email'], 'password' => $_POST['password']));
        $resultat = $req->fetch();
        if (!$resultat) {
            $Error = 'mot de passe ou E-mail incorrecte';
        } else {
            session_start();
            $_SESSION['email'] = $resultat['email'];
            $_SESSION['password'] = $resultat['password'];
            header('location:index.php');
        }
    }
}
?>

<!-- Contact -->
<?php
$date = new DateTime();
$email = $message = "";
$emailError = $messageError = "";
$isSuccess = false;

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
        $db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
        //controler la connexion
        $resultats = $db->prepare("INSERT INTO `message` (`email`, `message`, `date`) values (:email, :message, :date)");
        $resultats->execute(['email' => $email, 'message' => $message, 'date' => $date->format('Y-m-d H:m:s')]);
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

<!-- inscription -->
<?php
$nom = $prenom = $pseudo = $passwords = $email = $role = "";
$nomError = $prenomError = $pseudoError = $passwordsError = $emailError = $roleError = "";
$isValid = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = verifyInput($_POST["nom"]);
    $prenom = verifyInput($_POST["prenom"]);
    $pseudo = verifyInput($_POST["pseudo"]);
    $passwords = verifyInput($_POST["passwords"]);
    $email = verifyInput($_POST["email"]);
    $role = verifyInput($_POST["role"]);
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
    if (empty($passwords)) {
        $passwordsError = "Le mot de passe ne peut pas etre vide";
        $isValid = false;
    }

    if ($isValid) {
        $db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');

        //controler la connexion
        $resultats = $db->prepare("INSERT INTO `users` ( `nom`, `prenom`, `pseudo`, `password`, `email`, `role`) values (:nom, :prenom, :pseudo, :password, :email, :role)");
        $resultats->execute(['nom' => $nom, 'prenom' => $prenom, 'pseudo' => $pseudo, 'password' => $passwords, 'email' => $email, 'role' => 'user']);
    }
}

?>
<?php

$db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');

$resultats = $db->query('SELECT * From article', PDO::FETCH_ASSOC);


?>