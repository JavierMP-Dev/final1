<?php
include ('database.php');
session_start();
 $message = '';
 $docente_id;
if(isset($_SESSION['ID'])){
       $docente_id = $_SESSION['ID'];
}else{
       $docente_id = $_SESSION['user_id'];
}
//echo $docente_id;
 $message = '';
 $usuarios ="SELECT * FROM users";
 
if(isset($_POST['validar'])){/*Valida si el boton validar a enviado la informacion*/ 
              /*Si ya se hizo click para que no se inserto informacion */
 $sql = "UPDATE users SET mensaje=:mensaje WHERE id = :id " ; 
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':mensaje', $_POST['mensaje']);
    
    $stmt->bindParam(':id', $docente_id);

   if ($stmt->execute()) {
      $message = 'Registro exitoso!!!';
    } else {
      $message = 'No registrado';
    }
       }


       
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <?php require 'partials/header.php' ?>
    <a href="index.php" class="btn_volver">Volver</a>

    <?php
       if(!empty ($message)){
              echo $message;
       }
       ?>
    <h3></h3>
    <form action="subir_datos_docente.php" method="POST" style="margin: auto; width: 300px;">
        <table border="0">
            <!--Inicio de la tabla del formulario-->
            <?php
              $stmt = $conn->prepare("SELECT * FROM users WHERE id=:id");
              $stmt->execute(['id' => $docente_id]); 
              $user = $stmt->fetch();
              ?>
            

            <tr>
                <td width="50%">Notificaciones</td>
                <td width="50%"><input class="form-control" name="mensaje" type="text" value="<?php echo $user['mensaje'];?>"
                      </td>
            </tr>


            <!----
              <tr>
              <td width="50%">Rol:</td>
              <td width="50%">
                     <select name="rol" id="" >
                            <option value="1">Director</option> 
                            <option value="2">Administrativo</option> 
                            <option value="3">Orientador</option> 
                            <option value="4">Docente</option> 
                     </select>
              </td>
              </tr>
              --->
        </table>

        <!---
   <b>Horas por materia</b>       
            <h5>Español
            <input type="number" name="horas_espa" id="" placeholder="Horas">
            </h5>
            <h5>Ingles
            <input type="number" name="horas_espa" id="" placeholder="Horas">
            </h5>
            <h5>Matematicas
            <input type="number" name="horas_espa" id="" placeholder="Horas">
            </h5>
            <h5>Ciencias Naturales
            <input type="number" name="horas_espa" id="" placeholder="Horas">
            </h5>
--->
        <br>
        <br>
        <input type="submit" value="Enviar" class="btn_form" name="validar">
    </form>
    </div>
</body>

</html>