<?php
    //Se inicia sesion para almacenar sobre la pagina el mensaje exitoso
    session_start();

    //Se crea la conexion a la base de datos
    $conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'crud_php'
    );

    if (!$conn){
        die("Conexion fallida: " . mysqli_connect_error());
    }
?>