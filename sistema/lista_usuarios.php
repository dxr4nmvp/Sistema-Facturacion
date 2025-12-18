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

		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>Correo</th>
					<th>Rol</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$stmt = $conection->prepare("select u.idusuario, u.nombre, u.correo, u.usuario, r.rol from usuario u inner join rol r on u.rol = r.idrol");
				$stmt->execute();
				$result = $stmt->get_result();
				
				if ($result->num_rows > 0) {
					
					while($data = mysqli_fetch_assoc($result)) {
			?>
				<tr>
					<td><?php echo $data['idusuario']?></td>
					<td><?php echo $data['nombre']?></td>
					<td><?php echo $data['correo']?>@gmail.com</td>
					<td><?php echo $data['rol']?></td>
					<td>
						<a href="#" class="link_edit"><i class="fa-solid fa-user-pen"></i></a>
						<a href="#" class="link_delete"><i class="fa-solid fa-user-minus"></i></a>
					</td>
				</tr>
			<?php
				}
			}
			?>
			</tbody>
		</table>
	</section>
	<?php include "includes/footer.php"; ?>


</body>
</html>