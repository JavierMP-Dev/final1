<?php
include ('database.php');

 $message = '';
 $usuarios ="SELECT * FROM users";

 if(isset($_POST['validar'])){/*Valida si el boton validar a enviado la informacion*/ 
  /*Si ya se hizo click para que no se inserto informacion */
  $sql = "INSERT INTO users (nombre, sexo, email, password, curp, rfc, estudios, ingreso,  matutino, vespertino, primero, segundo, tercero, rol) VALUES (:nombre, :sexo, :email, :password, :curp, :rfc, :estudios, :ingreso, :matutino, :vespertino, :primero, :segundo, :tercero, :rol)"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':sexo', $_POST['sexo']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':curp', $_POST['curp']);
    $stmt->bindParam(':rfc', $_POST['rfc']);
    $stmt->bindParam(':estudios', $_POST['estudios']);
    $stmt->bindParam(':ingreso', $_POST['ingreso']);
   /*  $stmt->bindParam(':turno', $_POST['leng']); */
    $stmt->bindParam(':matutino', $_POST['matutino']);
    $stmt->bindParam(':vespertino', $_POST['vespertino']);
    $stmt->bindParam(':primero', $_POST['primero']);
    $stmt->bindParam(':segundo', $_POST['segundo']);
    $stmt->bindParam(':tercero', $_POST['tercero']);
    $stmt->bindParam(':rol', $_POST['rol']);
  
   if ($stmt->execute()) {
      $message = 'Registro exitoso!!!';
    } else {
      $message = 'No registrado';
    } }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Docentes</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!---Logo para mostrarse en la pestaña de la pagina-->
    <link rel="shortcut icon" href="assets/img/logo_favi.png" type="image/x-icon">
</head>

<body>
    <!----    ---->
    <?phpif(!empty ($message)){
              echo $message;}?>
    <?php require 'partials/header.php' ?>
    <div>
        <h2>Docentes</h2>
    </div>

    </div>
    <br>
    <table class="tabla_nombre_doce">
        <thead class="thead_do">
            <tr>
                <th>Docentes</th>
                <th>Informacion</th>
                <th>Eliminar</th>
            </tr>
        </thead>

        <?php
              $resultado = mysqli_query($conexion, $usuarios);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
        <tr>
            <td class="separacion"><strong>
                    <div><?php echo $row["nombre"]; ?></div>
                </strong></td>
            <td class="separacion"><input type="submit" value="Ver mas" class="btn_tabla"
                    onclick="mostrarid<?= $row['id'];?>()"></td>
            <td class="separacion"><input type="submit" value="Eliminar" class="btn_tabla_eliminar_docente"
                    onclick="eliminarid<?= $row['id'];?>()"></td>
            <!---  <?php
                    $admin= "jmontoyap001@alumno.uaemex.mx";
                     if($row["nombre"] == $admin){
                     ?>
                            <h1>Director</h1>
                            <?php   
                    }else{
                     ?>
                     
                     <?php 
                    }
                     ?>
                     ---->
            <!---  <td><input type="button" onclick="alerta()" value="presiona"></td>   --->
        </tr>
        <script>
        function mostrarid<?= $row['id'];?>() {
            top.location.href = "datos_maestro.php?ID=" + <?= $row['id'];?>;
        }

        function eliminarid<?= $row['id'];?>() {
            var confirmar = confirm("Seguro que quieres borrar el registro?");
            if (confirmar) {
                top.location.href = "eliminar.php?ID=" + <?= $row['id'];?>;
            } else {
                alert("No se realizaron cambios");
            }
        }

        document.getElementbyId('downloadexcel').addEventListener('click', function() {
            var table2excel = new Table2excel();
            table2excel.export(document.querySelectorAll("example-table"));
        });
        </script>

        <?php
              }
              ?>
    </table>

    </div>

    <hr />

    <h3>Registrar Nuevo docente</h3>
    <form action="docente.php" method="POST" style="margin: auto; width: 380px;">
        <table>
            <!--Inicio de la tabla del formulario
            <tr>
                <td width=" 50%">Nombre:</td>
        <td width="50%"> <input name="nombre" type="text" required placeholder="Nombre completo"> </td>
        </tr>
        -->
            <tr>
                <td width="50%">Nombre</td>
                <td>
                    <input class="form-control" type="text" placeholder="Nombre: " name="nombre" type="text"
                        aria-label="default input example">
                </td>
            </tr>


            <tr>
                <td>
                    Sexo
                </td>

                <td>
                    <select class="form-select" name="sexo" aria-label="Default select example">
                        <option selected>Sexo</option>
                        <option value="M">Maculino</option>
                        <option value="F">Femenino</option>

                    </select>
                </td>
            </tr>
            <br>
            <tr>
                <td width="50%">Correo:</td>
                <td>
                    <input type="email" class="form-control" name="email" placeholder="nombre@ejemplo.com">
                </td>
            </tr>

            <tr>
                <td width="50%">Password:</td>

                <td>
                    <input type="password" class="form-control" placeholder="Contraseña" name="password">
                </td>
            </tr>

            <tr>
                <td width="50%">Clave CURP</td>
                <td>
                    <input class="form-control" name="curp" type="text" placeholder="CURP">
                </td>
            </tr>
            <tr>
                <td width="50%">Clave RFC</td>
                <td>
                    <input class="form-control" type="text" name="rfc" placeholder="RFC">

                </td>
            </tr>


            <tr>
                <td>Estudios</td>
                <td>
                    <select class="form-select" name="estudios" aria-label="Default select example">
                        <option value="Doctorado">Doctorado</option>
                        <option value="Maestria">Maestria</option>
                        <option value="Ingenieria">Ingenieria</option>
                        <option value="Licenciatura">Licenciatura</option>
                        <option value="Preparatoria">Preparatoria</option>
                        <option value="Secundaria">Secundaria</option>
                    </select>
                </td>
            </tr>


            <tr>
                <!--Aqui se pone el año de ingreso--->
                <td width="50%">Año de ingreso</td>
                <td width="50%"><input type="date" name="ingreso" class="form-control" id=""></td>
            </tr>

            </tr>

            <tr>
                <td width="50%">Turnos</td>
                <td width="50%">

                    <input class="form-check-input" type="checkbox" name="matutino" value="1"> Matutino

                    <input class="form-check-input" type="checkbox" name="vespertino" value="2">Vespertino
                </td>
            </tr>

            <tr>
                <td>Grados</td>

                <td>
                    <input type="checkbox" name="primero" value="1">1°
                    <input type="checkbox" name="segundo" value="2">2°
                    <input type="checkbox" name="tercero" value="3">3°
                </td>
            </tr>

            <tr>
                <td>Rol</td>
                <td>
                    <select class="form-select" name="rol">
                        <option selected>Director</option>
                        <option value="1">Administrativo</option>
                        <option value="2">Orientador</option>
                        <option value="3">Docente</option>
                    </select>
                </td>

            </tr>

            <tr>

        </table>


        <br>
        <br>
        <input type="submit" value="Enviar" class="btn_form" name="validar">
    </form>
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <a href="materias.php">Asignar materias</a>
</body>

</html>