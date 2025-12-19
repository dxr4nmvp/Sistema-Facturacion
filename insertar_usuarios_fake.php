<?php
require_once "conexion.php";

$usuarios = [
    ['Juan Carlos Pérez', 'juan.perez@gmail.com', 'juanperez', 3, 1],
    ['Luis Miguel Rodríguez', 'luis.rodriguez@gmail.com', 'luisrod', 3, 1],
    ['Pedro Antonio Gómez', 'pedro.gomez@gmail.com', 'pedrog', 3, 1],
    ['Carlos Andrés Reyes', 'carlos.reyes@gmail.com', 'carlosreyes', 3, 1],
    ['Miguel Ángel Torres', 'miguel.torres@gmail.com', 'miguelt', 3, 1],
    ['José Manuel Ramírez', 'jose.ramirez@gmail.com', 'joseram', 3, 1],
    ['Fernando López', 'fernando.lopez@gmail.com', 'fernandol', 3, 1],
    ['Ricardo Sánchez', 'ricardo.sanchez@gmail.com', 'ricosan', 3, 1],
    ['Diego Martín Castillo', 'diego.castillo@gmail.com', 'diegoc', 3, 1],
    ['Alejandro Núñez', 'alejandro.nunez@gmail.com', 'alenu', 3, 1],

    // VENDEDORES
    ['Laura Sofía Martínez', 'laura.martinez@gmail.com', 'lauram', 3, 1],
    ['Sofía Isabel Torres', 'sofia.torres@gmail.com', 'sofiat', 3, 1],
    ['Valentina Pérez', 'valentina.perez@gmail.com', 'valep', 3, 1],
    ['Paola Jiménez', 'paola.jimenez@gmail.com', 'paolaj', 3, 1],
    ['Andrés Felipe Mora', 'andres.mora@gmail.com', 'andresm', 3, 1],
    ['Samuel Ortiz', 'samuel.ortiz@gmail.com', 'samortiz', 3, 1],
    ['Iván Morales', 'ivan.morales@gmail.com', 'ivanm', 3, 1],
    ['Cristian Rojas', 'cristian.rojas@gmail.com', 'crisr', 3, 1],
    ['Kevin Batista', 'kevin.batista@gmail.com', 'kevinb', 3, 1],
    ['Brandon Peña', 'brandon.pena@gmail.com', 'brandonp', 3, 1],

    // INACTIVOS (estatus = 0)
    ['Eduardo Méndez', 'eduardo.mendez@gmail.com', 'eduardom', 3, 0],
    ['Raúl Pimentel', 'raul.pimentel@gmail.com', 'raulp', 3, 0],
    ['Ángel Rosario', 'angel.rosario@gmail.com', 'angelr', 3, 0],

    // MÁS VENDEDORES
    ['Manuel Santana', 'manuel.santana@gmail.com', 'manuels', 3, 1],
    ['José Luis Herrera', 'josel.herrera@gmail.com', 'joselh', 3, 1],
    ['Francisco Cabrera', 'francisco.cabrera@gmail.com', 'franciscoc', 3, 1],
    ['Edwin Guerrero', 'edwin.guerrero@gmail.com', 'edwing', 3, 1],
    ['Wilmer Acosta', 'wilmer.acosta@gmail.com', 'wilmera', 3, 1],
    ['Jonathan Núñez', 'jonathan.nunez@gmail.com', 'jonathann', 3, 1],
    ['Brian Tejada', 'brian.tejada@gmail.com', 'briant', 3, 1],
    ['Jean Carlos Rodríguez', 'jeanc.rodriguez@gmail.com', 'jeanc', 3, 1],
    ['Alexis Marte', 'alexis.marte@gmail.com', 'alexism', 3, 1],
    ['Joel Vásquez', 'joel.vasquez@gmail.com', 'joelv', 3, 1],
    ['Cristopher Peña', 'crispena@gmail.com', 'crispena', 3, 1],
    ['Luis Alberto Gómez', 'luisag@gmail.com', 'luisag', 3, 1],
    ['Anthony Rodríguez', 'anthony.r@gmail.com', 'anthonyr', 3, 1],
    ['Rafael De León', 'rafael.deleon@gmail.com', 'rafaeld', 3, 1],
    ['Darwin Castillo', 'darwin.castillo@gmail.com', 'darwinc', 3, 1],
    ['Víctor Payano', 'victor.payano@gmail.com', 'victorp', 3, 1],
    ['Elías Familia', 'elias.familia@gmail.com', 'eliasf', 3, 1],
    ['Junior Alcántara', 'junior.alcantara@gmail.com', 'juniora', 3, 1],
    ['Kelvin Peralta', 'kelvin.peralta@gmail.com', 'kelvinp', 3, 1]
];

$supervisores = [
    // SUPERVISORES (POQUITOS)
    ['María Fernanda Díaz', 'maria.diaz@gmail.com', 'mariadiaz', 2, 1],
    ['Ana Carolina López', 'ana.lopez@gmail.com', 'analo', 2, 1],
    ['Daniel Alberto Cruz', 'daniel.cruz@gmail.com', 'danielc', 2, 1],
    ['Javier Hernández', 'javier.hernandez@gmail.com', 'javierh', 2, 1],
    ['Oscar Emilio Vargas', 'oscar.vargas@gmail.com', 'oscarv', 2, 1],
    ['Roberto Mejía', 'roberto.mejia@gmail.com', 'robertom', 2, 1],
    ['Héctor Valdez', 'hector.valdez@gmail.com', 'hectorv', 2, 1]
];
$clave_supervisores = password_hash("SUP_#2025*", PASSWORD_DEFAULT);
$clave = password_hash("Usuario2025*", PASSWORD_DEFAULT);

foreach ($usuarios as $u) {
    $sql = "INSERT INTO usuario (nombre, correo, usuario, clave, rol, estatus)
            VALUES ('$u[0]', '$u[1]', '$u[2]', '$clave', $u[3], $u[4])";
    mysqli_query($conection, $sql);
}

foreach ($supervisores as $s) {
    $sql = "INSERT INTO usuario (nombre, correo, usuario, clave, rol, estatus)
            VALUES ('$u[0]', '$u[1]', '$u[2]', '$clave_supervisores', $u[3], $u[4])";
    mysqli_query($conection, $sql);
}


echo "✅ Usuarios insertados correctamente";
