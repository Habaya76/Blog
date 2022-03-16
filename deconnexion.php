
  <?php
require('header.php');
?>

    
<?php
	// Initialiser la session
	session_start();
	
	// Détruire la session.
	if(session_destroy())
	{
		// Redirection vers la page de connexion
		header("Location: connexion.php");
	}
?>

<?php
require('footer.php');
?>