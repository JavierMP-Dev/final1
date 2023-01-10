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
 $sql = "UPDATE users SET nombre=:nombre, sexo=:sexo, curp=:curp, rfc=:rfc, estudios=:estudios, ingreso=:ingreso,  matutino=:matutino, vespertino=:vespertino, primero=:primero, segundo=:segundo, tercero=:tercero WHERE id = :id " ; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':sexo', $_POST['sexo']);
    // $stmt->bindParam(':email', $_POST['email']);
    //$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    // $stmt->bindParam(':password', $password);
    $stmt->bindParam(':curp', $_POST['curp']);
    $stmt->bindParam(':rfc', $_POST['rfc']);
    $stmt->bindParam(':estudios', $_POST['estudios']);
    $stmt->bindParam(':ingreso', $_POST['ingreso']);
    $stmt->bindParam(':matutino', $_POST['matutino']);
    $stmt->bindParam(':vespertino', $_POST['vespertino']);
    $stmt->bindParam(':primero', $_POST['primero']);
    $stmt->bindParam(':segundo', $_POST['segundo']);
    $stmt->bindParam(':tercero', $_POST['tercero']);
    
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
                <td width="50%">Nombre:</td>
                <td width="50%"> <input name="nombre" class="form-control" value="<?php echo $user['nombre'];?>"
                        type="text" required placeholder="Nombre completo"> </td>
            </tr>

            <tr>

                <td width="50%">Sexo:</td>
                <td width="50%">
                    <select name="sexo" class="form-select mt-3" id="">
                        <?php
              if($user['sexo']=='M'){
              ?>
                        <option value="M" selected>Masculino</option>
                        <option value="F">Femenino</option>
                        <?php
              }else{
              ?>
                        <option value="M">Masculino</option>
                        <option value="F" selected>Femenino</option>
                        <?php
              }
              ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Clave CURP</td>
                <td width="50%"><input name="curp" class="form-control" type="text" value="<?php echo $user['curp'];?>"
                        required placeholder="CURP"></td>
            </tr>
            <tr>
                <td width="50%">Clave RFC</td>
                <td width="50%"><input class="form-control" name="rfc" type="text" value="<?php echo $user['rfc'];?>"
                        required placeholder="RFC"></td>
            </tr>
            <tr>
                <td width="50%">Estudios</td>
                <td width="50%">
                    <select name="estudios" class="form-select mt-3" id="">
                        <?php
                     if($user['estudios']=='Doctorado'){
                     ?>
                        <option value="Doctorado" selected>Doctorado</option>
                        <option value="Maestria">Maestria</option>
                        <option value="Ingenieria">Ingenieria</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Secundaria">Secundaria</option>
                        <?php
                     } else if ($user['estudios']=='Maestria') {
                     ?>
                        <option value="Doctorado">Doctorado</option>
                        <option value="Maestria" selected>Maestria</option>
                        <option value="Ingenieria">Ingenieria</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Secundaria">Secundaria</option>
                        <?php
                     }else if ($user['estudios']=='Ingenieria') {
                     ?>
                        <option value="Doctorado">Doctorado</option>
                        <option value="Maestria">Maestria</option>
                        <option value="Ingenieria" selected>Ingenieria</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Secundaria">Secundaria</option>
                        <?php
                     }else if ($user['estudios']=='Licenciatura') {
                     ?>
                        <option value="Doctorado">Doctorado</option>
                        <option value="Maestria">Maestria</option>
                        <option value="Ingenieria">Ingenieria</option>
                        <option value="Licenciatura" selected>Licenciatura</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Secundaria">Secundaria</option>
                        <?php
                     }else if ($user['estudios']=='Preparatoria') {
                     ?>
                        <option value="Doctorado">Doctorado</option>
                        <option value="Maestria">Maestria</option>
                        <option value="Ingenieria">Ingenieria</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Preparatoria" selected>Preparatoria</option>
                        <option value="Secundaria">Secundaria</option>
                        <?php
                     }else if ($user['estudios']=='Secundaria') {     
                      ?>
                        <option value="Doctorado">Doctorado</option>
                        <option value="Maestria">Maestria</option>
                        <option value="Ingenieria">Ingenieria</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Secundaria" selected>Secundaria</option>
                        <?php
                     }
                     ?>
                    </select>
                </td>
            </tr>
            <!---
              

              <tr>
                     <td width="50%">Materias</td>
                     <td width="50%">
                            <select name="mate1" id="">
                                   <option value="">1° Grado</option> 
                                   <option value="1">Español</option> 
                                   <option value="2">Historia</option>
                                   <option value="3">Ciencias nat</option> 
                                   <option value="4">Matematicas</option>
                                   <option value="5">Algebra</option>
                                   <option value="6">Geometria</option>
                            </select>
                            <select name="mate1" id="">
                                   <option value="">2° Grado</option> 
                                   <option value="1">Español</option> 
                                   <option value="2">Historia</option>
                                   <option value="3">Ciencias nat</option> 
                                   <option value="4">Matematicas</option>
                                   <option value="5">Algebra</option>
                                   <option value="6">Geometria</option>
                            </select>
                            <select name="mate1" id="">
                                   <option value="">3° Grado</option> 
                                   <option value="1">Español</option> 
                                   <option value="2">Historia</option>
                                   <option value="3">Ciencias nat</option> 
                                   <option value="4">Matematicas</option>
                                   <option value="5">Algebra</option>
                                   <option value="6">Geometria</option>
                            </select>
                            
                     </td>

              </tr>
                     --->
            <tr>
                <!--Aqui se pone el año de ingreso--->
                <td width="50%">Año de ingreso</td>
                <td width="50%"><input type="date" class="form-control" value="<?php echo $user['ingreso'];?>"
                        name="ingreso" id=""></td>
            </tr>
            <!--
              <tr>
                     Esta parte es la que quiero en automatico con el dato de arriba
                     <td width="50%">Años en servicio</td>
                     <td width="50%"><input type="number" name="anios" id="" placeholder="Años en servicio"></td>
              </tr>
       -->
            <tr>
                <td width="50%">Turnos</td>
                <?php
              if($user['matutino']==1 && $user['vespertino']==1){
              ?>
                <td width="50%"><input type="checkbox" checked name="matutino" value="1">Matutino

                    <input type="checkbox" checked name="vespertino" value="1">Vespertino
                </td>
                <?php
              }else if($user['matutino']==1){
                            ?>
                <td width="50%"><input type="checkbox" checked name="matutino" value="1">Matutino
                    <input type="checkbox" name="vespertino" value="1">Vespertino
                    <?php
                     }else {
                            ?>

                <td width="50%"><input type="checkbox" name="matutino" value="1">Matutino</td>
                <td width="50%"><input type="checkbox" checked name="vespertino" value="1">Vespertino</td>

                <?php             
              }
             ?>
            </tr>


            <tr>
                <td width="50%">Grados</td>
                <?php
              if($user['primero']==1){
              ?>
                <td width="50%"><input type="checkbox" checked name="primero" value="1">1°</td>
                <?php
              }else {
              ?>
                <td width="50%"><input type="checkbox" name="primero" value="1">1°</td>
                <?php
              }
              ?>
            </tr>
            <tr>
                <td width="50%"></td>
                </td>
                <?php
              if($user['segundo']==2){
              ?>
                <td width="50%"><input type="checkbox" checked name="segundo" value="2">2°</td>
                <?php
              }else {
              ?>
                <td width="50%"><input type="checkbox" name="segundo" value="2">2°</td>
                <?php
              }
              ?>
            </tr>
            <tr>
                <td width="50%"></td>
                <?php
              if($user['tercero']==3){
              ?>
                <td width="50%"><input type="checkbox" checked name="tercero" value="3">3°</td>
                <?php
              }else {
              ?>
                <td width="50%"><input type="checkbox" name="tercero" value="3">3°</td>
                <?php
              }
              ?>
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