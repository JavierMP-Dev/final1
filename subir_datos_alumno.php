<?php
include ('database.php');
session_start();
 $message = '';
 $alumno_id;
if(isset($_SESSION['ID'])){
       $alumno_id = $_SESSION['ID'];
}else{
       $alumno_id = $_SESSION['user_id'];
}

echo $alumno_id;
$message = '';
$usuarios ="SELECT * FROM alumno";

if(isset($_POST['validar'])){/*Valida si el boton validar a enviado la informacion*/ 
    /*Si ya se hizo click para que no se inserto informacion */
$sql = "UPDATE alumno SET nombre=:nombre, sexo=:sexo, email=:email, curp=:curp, grado=:grado, grupo=:grupo, procede=:procede, ciudad_origen=:ciudad_origen, situacion=:situacion, estatus=:estatus, regularizacion=:regularizacion, repetidor=:repetidor, hermanos=:hermanos, jornada=:jornada WHERE id_alumno = :id";  
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':id', $alumno_id);
    $stmt->bindParam(':sexo', $_POST['sexo']);
    $stmt->bindParam(':email', $_POST['email']);
    $stmt->bindParam(':curp', $_POST['curp']);
    $stmt->bindParam(':grado', $_POST['grado']);
    $stmt->bindParam(':grupo', $_POST['grupo']);
    $stmt->bindParam(':procede', $_POST['procede']);
    $stmt->bindParam(':ciudad_origen', $_POST['ciudad_origen']);
    $stmt->bindParam(':situacion', $_POST['situacion']);
    $stmt->bindParam(':estatus', $_POST['estatus']);
    $stmt->bindParam(':regularizacion', $_POST['regularizacion']);
    $stmt->bindParam(':repetidor', $_POST['repetidor']);
    $stmt->bindParam(':hermanos', $_POST['hermanos']);
    $stmt->bindParam(':jornada', $_POST['jornada']);
    
       if ($stmt->execute()) {
              $message = 'Actualizacion exitosa!!!';
       } else {
              $message = 'No enviada';
       }
          }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar alumno</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <?php require 'partials/header.php' ?>
   
    <h1>Actualizar datos Alumnos</h1>
    <?php
       if(!empty ($message)){
              echo $message;
       }
       ?>


    <form action="subir_datos_alumno.php" method="POST" style="margin: auto; width: 380px;">
        <table border="0">
            <?php
              $stmt = $conn->prepare("SELECT * FROM alumno WHERE id_alumno=:id");
              $stmt->execute(['id' => $alumno_id]); 
              $user = $stmt->fetch();
              ?>
            <tr>
                <td width="50%">Nombre:</td>
                <td width="50%"> <input name="nombre" value="<?php echo $user['nombre'];?>" type="text" required
                        placeholder="Nombre completo" class="form-control"> </td>

            </tr>

            <tr>
                <td width="50%">Sexo:</td>
                <td width="50%">
                    <select name="sexo" class="form-select mt-3" id="">
                        <?php
              if($user['sexo']==1){
              ?>
                        <option value="1" selected>Masculino</option>
                        <option value="2">Femenino</option>
                        <?php
              }elseif($user['sexo']==2){
              ?>
                        <option value="1">Masculino</option>
                        <option value="2" selected>Femenino</option>
                        <?php
              }
              ?>
                    </select>
                </td>
            </tr>

            <tr>
                <td width="50%">Correo</td>
                <td width="50%"><input class="form-control" type="email" name="email"
                        value="<?php echo $user['email'];?>" placeholder="Correo"></td>
            </tr>

            <tr>
                <td width="50%">Clave CURP</td>
                <td width="50%"><input name="curp" type="text" class="form-control" value="<?php echo $user['curp'];?>"
                        required placeholder="CURP"></td>
            </tr>
            <tr>
                <td width="50%">Grado</td>
                <td width="50%">
                    <select name="grado" class="form-select mt-3" id="">
                        <?php
              if($user['grado']==1){
              ?>
                        <option value="1" selected>1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>
                        <?php
              }else if($user['grado']==2){
              ?>
                        <option value="1">1°</option>
                        <option value="2" selected>2°</option>
                        <option value="3">3°</option>
                        <?php
              }else if($user['grado']==1){
              ?>
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3" selected>3°</option>
                        <?php
              }
              ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Grupo</td>
                <td width="50%">
                    <select name="grupo" class="form-select mt-3" id="">
                        <?php
              if($user['grupo']==1){
              ?>
                        <option value="1" selected>A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                        <option value="4">D</option>
                        <option value="5">E</option>
                        <option value="6">F</option>
                        <?php
              }if($user['grupo']==2){
              ?>
                        <option value="1">A</option>
                        <option value="2" selected>B</option>
                        <option value="3">C</option>
                        <option value="4">D</option>
                        <option value="5">E</option>
                        <option value="6">F</option>

                        <?php
              }if($user['grupo']==3){
              ?>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3" selected>C</option>
                        <option value="4">D</option>
                        <option value="5">E</option>
                        <option value="6">F</option>

                        <?php
              }if($user['grupo']==4){
              ?>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                        <option value="4" selected>D</option>
                        <option value="5">E</option>
                        <option value="6">F</option>
                        <?php
              }if($user['grupo']==5){
              ?>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                        <option value="4">D</option>
                        <option value="5" selected>E</option>
                        <option value="6">F</option>

                        <?php
              }if($user['grupo']==6){
              ?>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                        <option value="4">D</option>
                        <option value="5">E</option>
                        <option value="6" selected>F</option>
                        <?php
              }
              ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Escuela de procedencia</td>
                <td width="50%"><input name="procede" class="form-control" type="text"
                        value="<?php echo $user['procede'];?>" required placeholder="Escuela Procedencia"></td>
            </tr>
            <tr>
                <td width="50%">Ciudad de Origen</td>
                <td width="50%"><input name="ciudad_origen" class="form-control" type="text"
                        value="<?php echo $user['ciudad_origen'];?>" required placeholder="Ciudad"></td>
            </tr>
            <tr>
                <td width="50%">Situacion</td>
                <td width="50%">
                    <select name="situacion" class="form-select mt-3" id="">
                        <?php
              if($user['situacion']==1){
              ?>
                        <option value="1" selected>Regular</option>
                        <option value="0">Irregular</option>
                        <?php
              }else if($user['situacion']==0){
              ?>
                        <option value="1">Regular</option>
                        <option value="0" selected>Irregular</option>
                        <?php
              }
              ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Estatus</td>
                <td width="50%">
                    <select name="estatus" class="form-select mt-3" id="">
                        <?php
              if($user['estatus']==1){
              ?>
                        <option value="1" selected>Alta</option>
                        <option value="0">Baja</option>
                        <?php
              }else if($user['situacion']==0){
              ?>
                        <option value="1">Alta</option>
                        <option value="0" selected>Baja</option>
                        <?php
              }
              ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Regularizacion</td>
                <td width="50%"><input name="regularizacion" class="form-control" type="date"></td>
            </tr>
            <tr>
                <td width="50%">Repetidor de curso</td>
                <td width="50%">
                    <select name="repetidor" class="form-select mt-3" class="form-select mt-3" id="">
                        <?php
              if($user['repetidor']==1){
              ?>
                        <option value="1" selected>Si</option>
                        <option value="0">No</option>
                        <?php
              }else if($user['repetidor']==0){
              ?>
                        <option value="1">Si</option>
                        <option value="0" selected>No</option>
                        <?php
              }
              ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Hermanos en la escuela</td>
                <td width="50%">
                    <select name="hermanos" class="form-select mt-3" id="">
                        <?php
              if($user['hermanos']==1){
              ?>
                        <option value="1" selected>Si</option>
                        <option value="0">No</option>
                        <?php
              }else if($user['hermanos']==0){
              ?>
                        <option value="1">Si</option>
                        <option value="0" selected>No</option>
                        <?php
              }
              ?> elect>
                </td>
            </tr>
            <tr>
                <td width="50%">Jornadas de limpieza</td>
                <td width="50%"><input class="form-control" type="number" name="jornada"
                        value="<?php echo $user['jornada'];?>" id=""></td>
            </tr>


        </table>

        <input type="submit" value="Enviar" class="btn_form" name="validar" class="btn_form">


    </form>


</body>

<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Actualizar datos de alumno</h6>
            <p class="text-justify">
         
               En esta seccion se encuentra un formulario para actualizar 
               los datos de un alumno en especifico, en los campos se precargan los datos 
               ya existentes dentro de la base de datos para actualizar. 
            </p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Categorias</h6>
            <ul class="footer-links">
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
              <li><a href=""></a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="">Asignar materias</a></li>
              <li><a href="">Mensaje</a></li>
              <li><a href="">Asignar Grupos</a></li>
              
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by 
       
            </p>
          </div>

          
        </div>
      </div>
</footer>



</html>