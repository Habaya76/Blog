<?php
require('header.php');

$db = new PDO('mysql:host=localhost;dbname=projet_recettes_cuisine', 'root', 'root');
?>

<main id="main_admin">
    <section id="admin">
        <h3>Modification d'Article</h3>
        <table>
            <thead>
                <tr>
                    <th name="idarticle">id</th>
                    <th name="Nom">Titre</th>
                    <th name="category">Catégorie</th>
                    <th>Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>

                   <td></td>
                   <td></td>
                   <td></td>
                    <td >
                        <button action="ModiferArticle" class="button"><a class="ajou" href="">Modifier</a></button>
                    </td>
                </tr>

            </tbody>
        </table>
</main>

<?php
require('footer.php');
?>