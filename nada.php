<?php
include ('database.php');

 $message = '';
 $usuarios ="SELECT * FROM users";
 $materias ="SELECT * FROM materias";

 if(isset($_POST['agregar_materias'])){/*Valida si el boton validar a enviado la informacion*/ 
   /*Si ya se hizo click para que no se inserto informacion */
   $sql = "INSERT INTO materias (materia) VALUES (:materia)"; 
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':materia', $_POST['materia']);
 
    if ($stmt->execute()) {
       echo "Registro exitoso!!!";
     } else {
       echo "No registrado";
     } 
   }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba</title>
</head>
<body>
    
<form action="#">

<input type="checkbox" name="materia" value="1">Español 1
                        

<input type="submit" value="Enviar"  class="btn_form" name="agregar_materias">
</form>

</body>
</html>