<?php
require('header.php');

$db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
$req = $db->prepare('SELECT * FROM categorie ');
$req->execute();
$resultat = $req->fetchAll();

$nom = $contenues = $categorie = "";
$nomError = $contenuesError = $image = "";
$isSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = verifyInput($_POST["nom"]);
    $contenues = verifyInput($_POST["contenues"]);
    $idcategorie = verifyInput($_POST['idcategorie']);
    $image = verifyInput($_POST['image']);
    $idusers = $_SESSION['idusers'];
    $isSuccess = true;
    

    if (empty($nom)) {
        $nomError = "le nom ne peut pas etre vide";
        $isSuccess = false;
        
    }
    if (empty($image)) {
        $imageError = "l'image ne peut pas etre vide";
        $isSuccess = false;
        
        
    }
    if (empty($contenues)) {
        $contenuesError = '"le contenues ne peut pas etre vide";';
        $isSuccess = false;
        
    }
    if ($isSuccess) {
        // la connexion basse de donnees
        $db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
        $resultats = $db->prepare("INSERT INTO `article`(`nom`, `image`, `idcategorie`, `idusers`, `contenues`) values (:nom, :image, :idusers, :idcategorie, :contenues)");
        $resultats->execute(['nom' => $nom, 'image' => $image, 'idcategorie' => $idcategorie, 'idusers' => $idusers, 'contenues' => $contenues]);
        
    }
    }
    var_dump($contenues);
function verifyInput($var)
{
    $var = trim($var);              //enlever les space suplementaiere
    $var = stripslashes($var);      //enlever tout les anti_slass
    $var = htmlspecialchars($var); //securiter
    return $var;
}

?>

<main id="main_ajout">

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
        <label for="nom">Titre</label>
        <input name="nom" type="text" value="<?php echo $nom; ?>" placeholder="entre le nom de l'article">
        <p class="error"><?php echo $nomError; ?></p>

        <label for="contenues">contenues</label>
        <textarea name="contenues" id="message" cols="30" rows="10"><?php echo $contenues; ?></textarea>
        <p class="error"><?php echo $contenuesError; ?></p>

        <label for="content">Image</label>
        <input name="image" type="text" value="<?php echo $image; ?>">
        <p class="error"><?php echo $imageError; ?></p>

        <label for="categorie">Categorie</label>

        <select name="idcategorie">
            <?php
            for ($i = 0; $i < count($resultat); $i++) :
            ?>
                <option value="<?php echo $resultat[$i]['idcategorie'] ?>"><?php echo $resultat[$i]['categorie'] ?></option>
            <?php endfor; ?>
        </select>
        <button class="button">Creer</button>
        <p class="merci" style="display:<?php if ($isSuccess) echo 'block';
                                        else echo 'none'; ?>">Article a été Ajouter:)</p>
    </form>


</main>

<?php
require('footer.php');
?>