<?php include "../conexion.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lista de usuarios</title>
	<?php include "includes/scripts.php"; ?>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="container">
		<div class="title-page">
			<h1>Lista de usuarios</h1>
			<a href="registro_usuario.php" class="btn_new"><i class="fa-solid fa-user-plus"></i></a>
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
				$sql_register = mysqli_query($conection, "SELECT count(*) as total_registro from usuario where estatus = 1");
				$result = mysqli_fetch_assoc($sql_register);
				$total_registro = $result['total_registro'];

				$xPag = 6;

				if(empty($_GET['pagina'])) {
					$pagina = 1;
				} else {
					$pagina = $_GET['pagina'];
				}

				$desde = ($pagina-1) * $xPag;
				$totalPag = ceil($total_registro / $xPag);

				"<tbody>";

				$stmt = $conection->prepare("SELECT u.idusuario, u.nombre, u.correo, u.usuario, r.rol from usuario u inner join rol r on u.rol = r.idrol WHERE u.estatus = 1 ORDER BY idusuario ASC LIMIT ?,?");
				$stmt->bind_param("ii", $desde, $xPag);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows > 0) {

					while($data = mysqli_fetch_assoc($result)) {
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
		</div>
		<div class="paginador">
			<ul>
				<?php
				if ($pagina != 1) {

				?>
				<li><a href="?pagina=<?php echo 1; ?>">|<</a></li>
				<li><a href="?pagina=<?php echo $pagina-1; ?>"><<</a></li>

				<?php
				}
				for ($i=1; $i <= $totalPag; $i++) {
					if ($i == $pagina) {
						echo '<li class="page_selected">'.$i.'</li>';
					} else {
						echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
					}
				}

				if ($pagina != $totalPag) {
				?>


				<li><a href="?pagina=<?php echo $pagina+1 ?>">>></a></li>
				<li><a href="?pagina=<?php echo $totalPag ?>">>|</a></li>
				<?php
				}
				?>
			</ul>
		</div>
	</section>
	<?php include "includes/footer.php"; ?>


</body>
</html>