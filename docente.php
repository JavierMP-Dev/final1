<?php
include ('database.php');

 $message = '';
 $usuarios ="SELECT * FROM users";

 if(isset($_POST['validar'])){/*Valida si el boton validar a enviado la informacion*/ 
  /*Si ya se hizo click para que no se inserto informacion */
  $sql = "INSERT INTO users (nombre, sexo, email, password, curp, rfc, estudios, ingreso,  matutino, vespertino, primero, segundo, tercero, rol, priA, priB, priC, segA, segB, segC, terA, terB, terC, mensaje, doc) VALUES (:nombre, :sexo, :email, :password, :curp, :rfc, :estudios, :ingreso, :matutino, :vespertino, :primero, :segundo, :tercero, :rol, :priA, :priB, :priC, :segA, :segB, :segC, :terA, :terB, :terC, :mensaje, :doc)"; 
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

    $stmt->bindParam(':priA', $_POST['priA']);
    $stmt->bindParam(':priB', $_POST['priB']);
    $stmt->bindParam(':priC', $_POST['priC']);

    $stmt->bindParam(':segA', $_POST['segA']);
    $stmt->bindParam(':segB', $_POST['segB']);
    $stmt->bindParam(':segC', $_POST['segC']);

    $stmt->bindParam(':terA', $_POST['terA']);
    $stmt->bindParam(':terB', $_POST['terB']);
    $stmt->bindParam(':terC', $_POST['terC']);

    $stmt->bindParam(':mensaje', $_POST['mensaje']);

    $stmt->bindParam(':doc', $_POST['doc']);

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
    <!---Logo de la pagina---->
    <link rel="shortcut icon" href="assets/img/edomex-logo.png" type="image/x-icon">
</head>

<body>
    <!----    ---->
    <?phpif(!empty ($message)){
              echo $message;}?>
    <?php require 'partials/header.php' ?>
    <div>
        <h2>Docentes</h2>
    </div>

    <br>
        <button onclick="exportTableToExcel('tabla_nombre_doce')" class="buttonDownload">Exportar a Excel</button>
        <!---Boton expoortar a excel--->
    <br><br><br>
    <table class="tabla_nombre_doce" id="tabla_nombre_doce" >
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

            <td class="separacion"><input type="submit" value="Ver mas" class="btn btn-outline-info btn-sm"
                    onclick="mostrarid<?= $row['id'];?>()"></td>

            <td class="separacion"><input type="submit" value="Eliminar" class="btn btn-outline-danger btn-sm" 
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

 
    <h3>Registrar Nuevo docente</h3>
    <form action="docente.php" method="POST" style="margin: auto; width: 380px;">
        <table>
            
            <tr>
                <td width="50%">Nombre</td>
                <td>
                    <input class="form-control" type="text" placeholder="Nombre: " name="nombre" type="text"
                        aria-label="default input example">
                        <br>
                </td>
               
            </tr>

            <tr>
                <td>
                    Sexo
                </td>

                <td>
                    <select class="form-select" name="sexo" aria-label="Default select example">
                        <option selected>Sexo</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>

                    </select>
                    <br>
                </td>
            </tr>
       
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

                    <input type="checkbox" name="matutino" value="1"> Matutino

                    <input type="checkbox" name="vespertino" value="2">Vespertino
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
                <td>
                    Grupos
                </td>
            </tr>

            <tr>
                <th>1°</th>
                <td>
                    <input type="checkbox" name="priA" value="A">A 
                    <input type="checkbox" name="priB" value="B">B 
                    <input type="checkbox" name="priC" value="C">C
                </td>
            </tr>
            <tr>
                <th>2°</th>
                <td>
                    <input type="checkbox" name="segA" value="1">A 
                    <input type="checkbox" name="segB" value="1">B 
                    <input type="checkbox" name="segC" value="1">C
                </td>
            </tr>
            <tr>
                <th>3°</th>
                <td>
                    <input type="checkbox" name="terA" value="1">A 
                    <input type="checkbox" name="terB" value="1">B 
                    <input type="checkbox" name="terC" value="1">C
                </td>
            </tr>
               

            <tr>
              <th>
              Mensaje
              </th>
              <td>
                <input type="text" name="mensaje" id="">
              </td>
            </tr>

            <tr>
              <th>
              Documento
              </th>
              <td>
                <input type="file" name="doc" id="">
              </td>
            </tr>

        </table>


        <br>
        <br>
        <input type="submit" value="Enviar" class="btn btn-info" name="validar">
    </form>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 



<!--Funcion para exportar la tabla a excel--->
<script>
                function exportTableToExcel(tableID) {
  var wb = XLSX.utils.table_to_book(document.getElementById(tableID));
  var wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

  function s2ab(s) {
    var buf = new ArrayBuffer(s.length);
    var view = new Uint8Array(buf);
    for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
    return buf;
  }

  saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'planta_docente.xlsx');
}

              </script>

<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="FileSaver.js-master/src/FileSaver.js"></script>






</body>






<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Docentes</h6>
            <p class="text-justify">
              <i>Lista de docentes registrados con formulario de registro completo </i>
               Seccion para ver la lista de los usuarios registrados, con botones para ver los 
               datos completos de los docentes junto con un boton para eliminar dicho usuario
                <br>
               El fomrulario que aparece mas abajo es un complemento para registrar nuevos usuarios
               pero con todos los datos personales
<br>
               Boton verde para descargar en formato excel la tabla con los nombres de los docentes
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