<?php
    include "../conexion.php";

    if (!empty($_POST)) {

        $protegidos = [1,7];

        if (in_array($_POST['idusuario'], $protegidos)) {
            header("Location: lista_usuarios.php");
            exit;
        }
        $idusuario = $_POST['idusuario'];

        /*
        $stmt_delete = $conection->prepare("DELETE FROM usuario WHERE idusuario = ?");
        $stmt_delete->bind_param("i", $idusuario);
        $stmt_delete->execute();
        */
        $stmt_delete = $conection->prepare("UPDATE usuario set estatus = 0 WHERE idusuario = ?");
        $stmt_delete->bind_param("i", $idusuario);
        $stmt_delete->execute();

        if ($stmt_delete->affected_rows > 0) {
            header("Location: lista_usuarios.php");
            exit;
        } else {
            $alert = "<p class='msg_error'>Error al eliminar usuario</p>";
        }
    }

    $protegidos = [1,7];
    if (empty($_REQUEST['id']) or in_array($_REQUEST['id'], $protegidos)) {
        header("Location: lista_usuarios.php");
        exit;
    } else {

        $idusuario = $_REQUEST['id'];
        $stmt = $conection->prepare("select u.nombre, u.usuario, r.rol
                                    from usuario u
                                    inner join rol r
                                    on u.rol = r.idrol
                                    where u.idusuario = ?;");
        $stmt->bind_param("i", $idusuario);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($data = mysqli_fetch_assoc($result)) {
                
                $nombre = $data['nombre'];
                $usuario = $data['usuario'];
                $rol = $data['rol'];
            }
        } else {
            header("Location: lista_usuarios.php");
            exit;
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Eliminar Usuario</title>
	<?php include "includes/scripts.php"; ?>
</head>
<body>
	<?php include "includes/header.php"; ?>
	<section id="eliminar_container">
		<div class="confirm_delete">
            <h1>Eliminar usuario</h1>
            <div class="icon_warning">
                <i class="fa-solid fa-triangle-exclamation"></i>
            </div>
            <div class="alert"><?php echo isset($alert) ? $alert : '' ?></div>
            <p class="question">¿Quieres eliminar el siguiente usuario?</p>
            <p class="warning_text">Esta acción no se puede deshacer</p>


            <div class="user_info">
                <p class="user_main">
                    @<?php echo $usuario ?>
                </p>
                <p><strong>Nombre: </strong><?php echo $nombre ?></p>
                <p><strong>Tipo de usuario: </strong><?php echo $rol ?></p>
            </div>

            <div class="actions">
                <form action="" method="post" class="form_actions">
                    <input type="hidden" name="idusuario" value="<?php echo $idusuario; ?>">
                    <a href="lista_usuarios.php" class="btn_cancel">Cancelar</a>
                    <input type="submit" value="Eliminar" class="btn_delete">
                </form>
            </div>
        </div>
	</section>
	<?php include "includes/footer.php"; ?>
</body>
</html>