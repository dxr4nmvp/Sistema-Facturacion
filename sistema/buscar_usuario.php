<?php include "../conexion.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Busqueda de usuarios</title>
	<?php include "includes/scripts.php"; ?>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="header_lista">
			<div class="title-page">
				<h1>Busqueda de usuarios</h1>
				<a href="registro_usuario.php" class="btn_new"><i class="fa-solid fa-user-plus"></i></a>
			</div>

            <?php
            
            $busqueda = strtolower($_REQUEST['busqueda']);

            if (empty($busqueda)) {
                header("Location: lista_usuarios.php");
                exit;
            }
            
            ?>
	
			<div class="buscador">
				<form action="buscar_usuario.php" method="GET" class="form_search">
					<input type="text" name="busqueda" id="busqueda" placeholder="Buscar" value="<?php echo $busqueda?>">
					<input type="submit" value="Buscar" class="btn_search">
				</form>
			</div>
		</div>
		
		<div class="table_container">
			<table>
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombre</th>
						<th>Correo</th>
						<th>Usuario</th>
						<th>Rol</th>
						<th>Acciones</th>
					</tr>
				</thead>

				<?php 
				//PAGINADOR
                $rol = '';
				if ($busqueda == 'administrador') {
					$rol = "OR rol  LIKE '%1%' ";
				} elseif ($busqueda == 'supervisor') {
					$rol = "OR rol LIKE '%2%' ";
				} elseif ($busqueda == 'vendedor') {
					$rol = "OR rol LIKE '%3%' ";
				}

				$sql_registe = mysqli_query($conection, "SELECT count(*) as total_registro from usuario
															where (idusuario LIKE '%$busqueda%' OR
															nombre LIKE '%$busqueda%' OR
															correo LIKE '%$busqueda%' OR
															usuario LIKE '%$busqueda%'
															$rol )
															and estatus = 1");
				$result_register = mysqli_fetch_array($sql_registe);
				$total_registro = $result_register['total_registro'];


				$xPag = 6;

				if(empty($_GET['pagina'])) {
					$pagina = 1;
				} else {
					$pagina = $_GET['pagina'];
				}

				$desde = ($pagina-1) * $xPag;
				$totalPag = ceil($total_registro / $xPag);

				echo "<tbody>";


				$query = mysqli_query($conection, "SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol from usuario u inner join rol r on u.rol = r.idrol
				WHERE
				(u.idusuario LIKE '%$busqueda%' OR
				u.nombre LIKE '%$busqueda%' OR
				u.correo LIKE '%$busqueda%' OR
				u.usuario LIKE '%$busqueda%' OR
				r.rol LIKE '%$busqueda%')

				AND

				u.estatus = 1 ORDER BY idusuario ASC LIMIT $desde,$xPag ");
				$result = mysqli_num_rows($query);

				if ($result > 0) {

					while($data = mysqli_fetch_assoc($query)) {
				?>
					<tr>
						<td><?php echo $data['idusuario']?></td>
						<td><?php echo $data['nombre']?></td>
						<td class="td_correo"><?php echo $data['correo']?></td>
						<td><?php echo $data['usuario']?></td>
						<td><?php echo $data['rol']?></td>
						<td class="td_acciones">
							<a href="editar_usuario.php?id=<?php echo $data['idusuario']?>" class="link_edit"><i class="fa-solid fa-user-pen"></i></a>
							<span>|</span>

							<?php
								$protegidos = [1, 7];
								if (!in_array($data['idusuario'], $protegidos)) {?>
								<a href="eliminar_confirmar_usuario.php?id=<?php echo $data['idusuario']?>" class="link_delete"><i class="fa-solid fa-user-minus"></i></a>
							<?php } ?>	
						</td>
					</tr>
				<?php
					}
				}
				?>
				</tbody>
			</table>

		<?php
			if ($total_registro != 0 ) {
		?>
		</div>
		<div class="paginador">
			<ul>
				<?php
				if ($pagina != 1) {

				?>
				<li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo $busqueda ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo $busqueda ?>"><<</a></li>

				<?php
				}
				for ($i=1; $i <= $totalPag; $i++) {
					if ($i == $pagina) {
						echo '<li class="page_selected">'.$i.'</li>';
					} else {
						echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
					}
				}

				if ($pagina != $totalPag) {
				?>


				<li><a href="?pagina=<?php echo $pagina+1 ?>&busqueda=<?php echo $busqueda ?> ">>></a></li>
				<li><a href="?pagina=<?php echo $totalPag ?>&busqueda=<?php echo $busqueda ?> ">>|</a></li>
				<?php
				}
				}
				?>
			</ul>
		</div>
	</section>
	<?php include "includes/footer.php"; ?>


</body>
</html>