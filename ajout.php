<?php
require('header.php');
?>
<main id="main_ajout">
<form  action="">
    <label for="nom">Titre</label>
    <input name="nom" type="text" value="">

    <label for="contenu">Contenu</label>
    <textarea name="content" type="text" value=""> </textarea>

    <label for="content">Image</label>
    <input name="nom" type="text" value="">

    <label for="category">Category</label>
    <select name="category" type="text" value="">
        <option value=""></option>
    </select>
    <label for="auteur">Auteur</label>
    <select name="auteur" type="text" value="">
        <option value=""></option>
    </select>
    <button class="button">Ajouter</button>
</form>
</main>

<?php
require('footer.php');
?>