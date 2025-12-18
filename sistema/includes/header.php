<?php
session_start();
if (empty($_SESSION['active'])) {
    header("Location: ../index.php");
}

?>
<header>
		<div class="header">
			
			<h1>Sistema de Facturación</h1>
			<div class="optionsBar">
				<p>República Dominicana <?php echo fechaC() ?></p>
				<span>|</span>
				<span class="user"><?php echo $_SESSION['nombre'];?></span>
				<img class="photouser" src="img/user.png" alt="Usuario">
				<a href="salir.php"><img class="close" src="img/salir.png" alt="Salir del sistema" title="Salir"></a>
			</div>
		</div>
        <?php include "nav.php"; ?>
	</header>