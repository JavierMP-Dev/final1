<?php
include ('database.php');

 $message = '';
 $usuarios ="SELECT * FROM users";
 $materias ="SELECT * FROM materias";

 if(isset($_POST['agregar_materias'])){/*Valida si el boton validar a enviado la informacion*/ 
   /*Si ya se hizo click para que no se inserto informacion */
   $sql = "INSERT INTO materias (id_docente, materia, materia2, materia3) VALUES (:id_docente, :materia, :materia2, :materia3)"; 
   

   $materia = '';  
   $materia2 = '';
   $materia3 = '';

   $id_docente = '';
   //primer año
   if(isset($_POST['espa'])){
      $materia .= 'Español <br>';
      $id_docente = $_POST['espa'];
   }
   //espáñol segundo año
   if(isset($_POST['espa2'])){
      $materia2 .= 'Español <br>';
      $id_docente = $_POST['espa2'];
   }
   if(isset($_POST['espa3'])){
      $materia3 .= 'Español 3<br>';
      $id_docente = $_POST['espa3'];
   }

//materia ingles
   if(isset($_POST['segundaL'])){
      $materia .= 'Segunda Lengua <br> ';
      $id_docente = $_POST['segundaL'];
   }
   if(isset($_POST['segundaL2'])){
      $materia2 .= 'Segunda Lengua <br> ';
      $id_docente = $_POST['segundaL2'];
   }
   if(isset($_POST['segundaL3'])){
      $materia3 .= 'Segunda Lengua <br> ';
      $id_docente = $_POST['segundaL3'];
   }


//materia matematicas
   if(isset($_POST['matematicas_1'])){
      $materia .= 'Matematicas 1 <br>';
      $id_docente = $_POST['matematicas_1'];
   }
   if(isset($_POST['matematicas_2'])){
      $materia2 .= 'Matematicas 2 <br>';
      $id_docente = $_POST['matematicas_2'];
   }
   if(isset($_POST['matematicas_3'])){
      $materia3 .= 'Matematicas 3 <br>';
      $id_docente = $_POST['matematicas_3'];
   }

 
     $stmt = $conn->prepare($sql);

     $stmt->bindParam(':id_docente', $id_docente);
     $stmt->bindParam(':materia', $materia);
     $stmt->bindParam(':materia2', $materia2);
     $stmt->bindParam(':materia3', $materia3);

    if ($stmt->execute()) {
       echo "Registro exitoso !!!";
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
    <title>Asignar Materias</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!---Logo de la pagina---->
    <link rel="shortcut icon" href="assets/img/edomex-logo.png" type="image/x-icon">
</head>
<body>                                                                                                                     
        <?php require 'partials/header.php' ?>
        <div>   
        
        <button onclick="exportTableToExcel('materias')" class="buttonDownload">Exportar a Excel</button>
<br>

<form action="#" method="POST">
 <div class="centrar">
        <table class="tabla  " id="materias" >                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
              <thead class="thead_do">
                   <tr>
                     <th>ID</th> <th>Docentes</th><th>1°</th><th>2°</th><th>3°</th>
                   </tr>  
              </thead>
       <?php
              $resultado = mysqli_query($conexion, $usuarios);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
              <tr>
                     <td > <div ><?php echo $row["id"]; ?></div> </td>

                     <td ><strong> <div ><?php echo $row["nombre"]; ?></div> </strong></td>

                     <td class="pos_materias">
                        <input type="checkbox" name="espa" value=<?php echo $row["id"]; ?>>Español 1
                        <br>
                       <input type="checkbox" name="segundaL" value=<?php echo $row["id"]; ?>>Segunda lengua
                        <br>
                        <input type="checkbox" name="matematicas_1" value=<?php echo $row["id"]; ?>>Matematicas 1
                        <br>
                        
                     </td>
                    
                     <!----Materias segundo---->
                     <td class="pos_materias">
                        <input type="checkbox" name="espa2" value=<?php echo $row["id"]; ?>>Español 2
                        <br>
                       <input type="checkbox" name="segundaL2" value=<?php echo $row["id"]; ?>>Ingles 2
                        <br>
                        <input type="checkbox" name="matematicas_2" value=<?php echo $row["id"]; ?>>Matematicas 2
                        <br>
                     </td>


                     <!----Materias segundo---->
                     <td class="pos_materias">
                        <input type="checkbox" name="espa3" value=<?php echo $row["id"]; ?>>Español 3
                        <br>
                       <input type="checkbox" name="segundaL3" value=<?php echo $row["id"]; ?>>Ingles 3
                        <br>
                        <input type="checkbox" name="matematicas_3" value=<?php echo $row["id"]; ?>>Matematicas 3
                        <br>
                     </td>
                  
               </tr>
             
              <?php
              }
              ?>
       </table> 
       </div>
     
              
       <input type="submit" value="Enviar"  class="btn btn-info" name="agregar_materias">
    </form>



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

  saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'materias.xlsx');
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
            <h6>Asignar materias</h6>
            <p class="text-justify">
              
               Se muestra un formulario para enviar mensajes a los docentes
               personalizados para poder tener mejor comunicacion.
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