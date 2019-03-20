<header>
    <a href="index.php"><img src="modele/fichiers/images/logoCamTech.png" alt="Logo de CamTech" title="Logo de CamTech" /></a>
	<em>Actualités High-Tech, informations et astuces</em>
    <section class="compte">
		<?php
		session_start();
		if (!isset($_SESSION['utilisateur'])){
		?>
			<form method="post" action="index.php?page=treatments/login">
				<input type="email" name="email" id="email" placeholder="address email" autofocus required/>
				<input type="password" name="pwd" id="pwd" placeholder="mot de passe" required/><br />
				<input type="submit" value="se connecter" />
				<input type="button" id="inscription" value="S'inscrire" title="S'inscrire au site" />
			</form>
		<?php
		} else {
		?>
			<p>Salut <?php echo htmlspecialchars($_SESSION['utilisateur']->getEmail()); ?> <a href="index.php?page=treatments/deconnexion" title="Se deconnecter">Deconnexion</a></p>
		<?php
		}
		?>
    </section>
</header>
