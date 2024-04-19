<?php
 require 'database.php';
 $message = '';

    $sql = "INSERT INTO alumno (nombre, sexo, email, curp, grado, grupo, procede, ciudad_origen, situacion, estatus,regularizacion, repetidor, hermanos, jornada) VALUES (:nombre, :sexo, :email, :curp, :grado, :grupo, :procede, :ciudad_origen, :situacion, :estatus, :regularizacion, :repetidor, :hermanos, :jornada)"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
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
      $message = 'Registro exitoso!!!';
    } else {
      $message = 'No registrado';
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Alumno</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!---Logo para mostrarse en la pestaña de la pagina-->
    <link rel="shortcut icon" href="assets/img/logo_favi.png" type="image/x-icon">
</head>
<?php require 'partials/header.php' ?>

<br><br>

<body>

    <h1>Registar alumno</h1>

    <form action="registro_alumno.php" method="POST" class="form_alumnoo sombraa" style="margin: auto; width: 380px;">
        <table border="0">
            <tr>
                <td width="50%">Nombre:</td>
                <td width="50%">
                    <input class="form-control" name="nombre" type="text" required placeholder="Nombre completo">
                </td>
            </tr>

            <tr>
                <td width="50%">Sexo:</td>
                <td width="50%">
                    <select name="sexo" id="" class="form-select">
                        <option selected>Sexo</option>
                        <option value="1">Masculino</option>
                        <option value="2">Femenino</option>
                    </select>
                </td>
            </tr>

            <tr>
                <td width="50%">Correo</td>
                <td width="50%"><input class="form-control" type="email" name="email" placeholder="Correo"></td>
            </tr>

            <tr>
                <td width="50%">Clave CURP</td>
                <td width="50%">
                    <input class="form-control" name="curp" type="text" required placeholder="CURP">
                </td>
            </tr>
            <tr>
                <td width="50%">Grado</td>
                <td width="50%">
                    <select class="form-select" name="grado" id="">
                        <option value="">Grado</option>
                        <option value="1">1°</option>
                        <option value="2">2°</option>
                        <option value="3">3°</option>

                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Grupo</td>
                <td width="50%">
                    <select class="form-select" name="grupo" id="">
                        <option value="">Grupo</option>
                        <option value="1">A</option>
                        <option value="2">B</option>
                        <option value="3">C</option>
                        <option value="4">D</option>
                        <option value="5">E</option>
                        <option value="6">F</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Escuela de procedencia</td>
                <td width="50%"><input class="form-control" name="procede" type="text" required
                        placeholder="Escuela Procedencia">
                </td>
            </tr>
            <tr>
                <td width="50%">Ciudad de Origen</td>
                <td width="50%"><input class="form-control" name="ciudad_origen" type="text" required
                        placeholder="Ciudad"></td>
            </tr>
            <tr>
                <td width="50%">Situacion</td>
                <td width="50%">
                    <select class="form-select" name="situacion" id="">
                        <option value="1">Regular</option>
                        <option value="2">Irregular</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Estatus</td>
                <td width="50%">
                    <select class="form-select" name="estatus" id="">
                        <option value="1">Alta</option>
                        <option value="2">Baja</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Regularizacion</td>
                <td width="50%"><input class="form-select" name="regularizacion" type="date"></td>
            </tr>
            <tr>
                <td width="50%">Repetidor de curso</td>
                <td width="50%">
                    <select class="form-select" name="repetidor" id="">
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Hermanos en la escuela</td>
                <td width="50%">
                    <select class="form-select" name="hermanos" id="">
                        <option value="1">Si</option>
                        <option value="2">No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td width="50%">Jornadas de limpieza</td>
                <td width="50%"><input class="form-control" type="number" name="jornada" id=""></td>
            </tr>


        </table>
<br>
        <input type="submit" value="Enviar" class="btn btn-info btn-lg">
    </form>
    </div>
</body>

<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Registro alumno</h6>
            <p class="text-justify">

               En esta seccion se encuentra un formulario para registrar 
               a los alumnos, en este se recaban los datos personales de cada uno de los alumnos.
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