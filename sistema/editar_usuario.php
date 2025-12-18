<?php
    include "../conexion.php";

    if (!empty($_POST)) {
        if (empty($_POST['nombre']) || empty($_POST['correo']) || empty($_POST['usuario']) || empty($_POST['rol'])) {
            $alert = "<p class='msg_error'>Todos los campos son obligatorios</p>";
        } else {

            $idusuario = $_POST['idUsuario'];
            $idusuario = (int) $idusuario;
            $nombre = $_POST['nombre'];
            $correo = $_POST['correo'];
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
            $claveHash = password_hash($clave, PASSWORD_DEFAULT);
            $rol = $_POST['rol'];
            $rol = (int) $rol;

            $stmt = $conection->prepare("SELECT * FROM usuario WHERE
                                        (usuario = ? AND idusuario != ?) or (correo = ? and idusuario != ?)");
                $stmt->bind_param("sisi", $usuario, $idusuario, $correo, $idusuario);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $alert = "<p class='msg_error'>Este correo o nombre de usuario ya existe</p>";
            } else {

                if (empty($_POST['clave'])) {
                    $stmt_update = $conection->prepare("UPDATE usuario
                                                        SET nombre = ?, correo = ?, usuario = ?, rol = ?
                                                        Where idusuario = ?");
                    $stmt_update->bind_param("sssii", $nombre, $correo, $usuario, $rol, $idusuario);
                    $stmt_update->execute();
                } else {
                    $stmt_update = $conection->prepare("UPDATE usuario
                                                        SET nombre = ?, correo = ?, usuario = ?, clave = ?, rol = ?
                                                        Where idusuario = ?");
                    $stmt_update->bind_param("ssssii", $nombre, $correo, $usuario, $claveHash, $rol, $idusuario);
                    $stmt_update->execute();
                }

                if ($stmt_update->affected_rows >= 0) {
                    $alert = "<p class='msg_save'>Usuario editado con éxito</p>";
                } else {
                    $alert = "<p class='msg_error'>Error al editar usuario</p>";
                }
            }
        }
    }

    //

    //Mostrar datos
    if (empty($_GET['id'])) {
        header("Location: lista_usuarios.php");
        exit;
    }
    $iduser = $_GET['id'];
    $stmt = $conection->prepare("select u.idusuario, u.nombre, u.correo, u.usuario, (u.rol) as idrol, (r.rol) as rol from usuario u
                                inner join rol r
                                on u.rol = r.idrol
                                where idusuario = ?;");
    $stmt->bind_param("i", $_GET['id']);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        header("Location: lista_usuarios.php");
    } else {
        $option = 0;
        while($data = mysqli_fetch_assoc($result)) {
            $iduser = $data['idusuario'];
            $nombre = $data['nombre'];
            $correo = $data['correo'];
            $usuario = $data['usuario'];
            $idrol = $data['idrol'];
            $rol = $data['rol'];

            if ($idrol == 1) {
                $option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
            } elseif ($idrol == 2) {
                $option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
            } elseif ($idrol == 3) {
                $option = '<option value="'.$idrol.'" select>'.$rol.'</option>';
            }
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editor de usuarios</title>
    <link rel="stylesheet" href="css/style.css">
	<?php include "includes/scripts.php"; ?>
</head>
<body>
    <?php include "includes/header.php"; ?>
	<section id="container">
		<div class="form_register">

            <form action="" method="post">
                <h1>Editar usuario</h1>
                <div class="alert"><?php echo isset($alert) ? $alert : '' ?></div>
                <fieldset>
                    <legend>Información</legend>
                    <input type="hidden" name="idUsuario" value="<?php echo $iduser?>">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Joe Random" value="<?php echo $nombre?>">
                    <label for="correo">Correo Electrónico</label>
                    <input type="email" name="correo" id="correo" placeholder="joerandom@example.com" value="<?php echo $correo?>">
                </fieldset>

                <fieldset>
                    <legend>Usuario</legend>
                    <label for="usuario">Nombre de usuario</label>
                    <input type="text" name="usuario" id="usuario" placeholder="Ingresa tu nombre de usuario" value="<?php echo $usuario?>">

                    <label for="clave">Contraseña</label>
                    <input type="password" name="clave" id="clave" placeholder="********">

                    <label for="rol">Tipo de usuario</label>

                    <?php
                    $stmt = $conection->prepare("SELECT * FROM rol");
                    $stmt->execute();
                    $result = $stmt->get_result();

                    ?>

                    <select class="noitemOne" name="rol" id="rol" value="<?php echo $nombre?>">
                        <?php
                            echo $option;   
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
                <input type="submit" value="Actualizar usuario" class="btn_save">
            </form>
        </div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>