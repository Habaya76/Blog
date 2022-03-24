<?php
require('header.php');

$db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
$resultats = $db->query('SELECT * FROM `message` ');
$resu = $resultats->fetchAll();


?>

<main id="main_admin">
    <section id="admin">
        <h3>Liste des messages reçus</h3>
        <table>
            <button action="" id="button"><a id="retour" href="">Retour</a></button>
            <thead>
                <tr>
                    <th name="idarticle">id</th>
                    <th name="Nom">Email</th>
                    <th name="category">Message</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
            <?php
        for ($i = 0; $i < count($resu); $i++) :
        ?>
                <tr>
                    <td name="idmessage_recu"><?php echo $resu[$i]['idmessage'] ?></td>
                    <td name="emeil_recu"><?php echo $resu[$i]['email'] ?></td>
                    <td name="message"><?php echo $resu[$i]['message'] ?> </td>
                    <td name="date"><?php echo $resu[$i]['date'] ?></td>
                </tr>
    
                <?php
        endfor;
        ?>
            </tbody>
         
        </table>
</main>
<?php
require('footer.php');
?>