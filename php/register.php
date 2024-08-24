<?php
//Se incluye el archivo db.php para acceder a la sesion y a la conexion
include("./db.php");


//Validacion si se registra una peticion POST 'register-student' que es eñ input sumbit del form
if(isset($_POST['register-student'])){
// Se almacena en variables cada parametro enviado desde el formulario
   $name = $_POST['name'];
   $dni = $_POST['dni'];
   $genre = $_POST['rbtn-genre'];
   $birth_date = $_POST['birth-date'];
   $email = $_POST['email'];

   //Se crea la variable query que almacena la sentencia MySQL de insercion
    $query = "INSERT INTO person(name,dni,genre,birth_date,email) VALUES ('$name','$dni','$genre','$birth_date','$email')";
    //Se realiza la peticion teniendo en cuenta la conexion de db.php y la sentencia MySQL anteior
    $result = mysqli_query($conn, $query);

    //Aca se valida que la peticion haya sido exitosa y en caso de que no, devolvera el mensaje 
    if(!$result){
        die("Query failed!");
    }


    //Se almacena en la sesion del server, el parametro message y message_type para se usado en el index.html
    $_SESSION['message'] = "Student saved succesfully";
    $_SESSION['message_type'] = "success";


    //Al finalizar la peticion y el almacenamiento de los mensaje en sesion se redirecciona al index.html
    header("Location: ../index.php");

    //Por ultimo y por seguridad se cierra la conexion a la base de datos
    mysqli_close($conn);
}


?>