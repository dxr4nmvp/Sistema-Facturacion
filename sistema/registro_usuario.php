<?php
include "../conexion.php";

if (!empty($_POST)) {
    if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['clave']) || empty($_POST['rol'])) {
        $alert = "<p class='msg_error'>Todos los campos son obligatorios</p>";
    } else {

        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $usuario = $_POST['usuario'];
        $clave = $_POST['clave'];
        $claveHash = password_hash($clave, PASSWORD_DEFAULT);
        $rol = $_POST['rol'];


        $stmt = $conection->prepare("SELECT * FROM usuario where usuario = ? or correo = ?");
            $stmt->bind_param("ss", $usuario, $correo);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $alert = "<p class='msg_error'>Este correo o nombre de usuario ya existe</p>";
        } else {
            $stmt_insert = $conection->prepare("INSERT INTO usuario(nombre, correo, usuario, clave, rol) values (?,?,?,?,?)");
            $stmt_insert->bind_param("ssssi", $nombre, $correo, $usuario, $claveHash, $rol);
            $stmt_insert->execute();

            if ($stmt_insert->affected_rows > 0) {
                $alert = "<p class='msg_save'>Usuario creado con éxito</p>";
            } else {
                $alert = "<p class='msg_error'>Error al crear usuario</p>";
            }
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro de usuarios</title>
    <link rel="stylesheet" href="css/style.css">
	<?php include "includes/scripts.php"; ?>
</head>
<body>
    <?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_register">

            <form action="" method="post">
                <h1>Crear usuario</h1>
                <div class="alert"><?php echo isset($alert) ? $alert : '' ?></div>
                <fieldset>
                    <legend>Información</legend>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Joe Random">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" placeholder="joerandom@example.com">
                </fieldset>

                <fieldset>
                    <legend>Usuario</legend>
                    <label for="usuario">Nombre de usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu nombre de usuario">

                    <label for="clave">Contraseña</label>
                    <input type="password" name="clave" id="clave" placeholder="********">

                    <label for="rol">Tipo de usuario</label>

                    <?php
                    $stmt = $conection->prepare("SELECT * FROM rol");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    ?>

                    <select name="rol" id="rol">
                        <?php
                            if ($result->num_rows > 0) {
                                while ($rol = mysqli_fetch_assoc($result)) {
                        ?> 
                            <option value="<?php echo $rol['idrol']?>"><?php echo $rol['rol']?></option>
                        <?php

                                }
                            }
                        ?>
                    </select>
                </fieldset>
                <input type="submit" value="Registrar usuario" class="btn_save">
            </form>
        </div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>