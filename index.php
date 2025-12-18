<?php
$alert = '';
session_start();
if (!empty($_SESSION['active'])) {
    header("location: sistema/");
} else {

    if (!empty($_POST)) {
        if (empty($_POST['usuario']) || empty($_POST['clave'])) {
            $alert = 'Ingresa tu usuario y tu clave';
        } else {
            require_once 'conexion.php';
            $user = $_POST['usuario'];
            $pass = $_POST['clave'];

            $stmt = $conection->prepare("SELECT * FROM usuario where usuario = ?");
            $stmt->bind_param("s", $user);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();
                if (password_verify($pass, $data['clave'])) {

                    $_SESSION['active'] = true;
                    $_SESSION['iduser'] = $data['idusuario'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['email'] = $data['email'];
                    $_SESSION['user'] = $data['usuario'];
                    $_SESSION['rol'] = $data['rol'];
                    header("Location: sistema/");
                    exit;
                } else {
                    $alert = "Contraseña incorrecta";
                    session_destroy();
                }

            } else {
                $alert = "Ingresaste mal la clave o el usuario";
                session_destroy();
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Sistema Facturación</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section id="container">
        <form method="post">
            <h3>Accede a tu cuenta</h3>
            <img src="img/login.png" alt="Login">

            <input type="text" placeholder="Usuario" name="usuario">
            <input type="password" placeholder="Contraseña" name="clave">
            <div class="alert"><?php echo isset($alert)? $alert : '' ?></div>
            <input type="submit" value="Ingresar">

        </form>

    </section>
</body>
</html>