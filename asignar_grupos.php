<?php
include ('database.php');

 $message = '';
 $usuarios ="SELECT * FROM users";
 $grupos ="SELECT * FROM grupos";

 if(isset($_POST['agregar_grupos'])){/*Valida si el boton validar a enviado la informacion*/ 
   /*Si ya se hizo click para que no se inserto informacion */
   $sql = "INSERT INTO grupos (id_docente, grupo) VALUES (:id_docente, :grupo)"; 
   
   $grupo ='';
   $id_docente = '';
echo"No entro al if";
   if(isset($_POST['priA'])){
      $grupo .= '1A <br>';
      $id_docente = $_POST['priA'];
      echo "Entro al if";
   }
   
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':id_docente', $id_docente);
     $stmt->bindParam(':grupo', $grupo);

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
    <title>Asignar Grupos</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!---Logo de la pagina---->
    <link rel="shortcut icon" href="assets/img/edomex-logo.png" type="image/x-icon">
</head>
<body>                                                                                                                     
        <?php require 'partials/header.php' ?>
        <div>   
        <h2>Asignar Grupos</h2>   



        <br>
        <button onclick="exportTableToExcel('grupos')" class="buttonDownload">Exportar a Excel</button>
<br>



<form action="#" method="POST">
<div class="centrar">



        <table class=" tabla " id="grupos" >                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
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

                     <td class="pos_grupos">
                        <input type="checkbox" name="priA" value=<?php echo $row["id"]; ?>>1A
                        <br>
                        <input type="checkbox" name="1B" value=<?php echo $row["id"]; ?>>1B
                        <br>
                        <input type="checkbox" name="1C" value=<?php echo $row["id"]; ?>>1C
                        
                        
                        
                     </td>
                    
                     <!----Materias segundo---->
                     <td class="pos_materias2">
                     <input type="checkbox" name="" value=<?php echo $row["id"]; ?>>A   
                        <br>
                        <input type="checkbox" name="" value=<?php echo $row["id"]; ?>>B
                        <br>
                        <input type="checkbox" name="" value=<?php echo $row["id"]; ?>>C
                        <br>
                        
                       
                     </td>
                     <!----Materias segundo                  ---->
                     <td class="pos_materias">
                     <input type="checkbox" name="" id="">A
                        <br>
                        <input type="checkbox" name="" id="">B
                        <br>
                        <input type="checkbox" name="" id="">C
                        <br>
                        
                     </td>

               </tr>
             
              <?php
              }
              ?>
       </table> 
            </div>

       <br>
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

  saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'asignar_grupos.xlsx');
}

              </script>

<script src="https://cdn.jsdelivr.net/npm/xlsx/dist/xlsx.full.min.js"></script>
<script src="FileSaver.js-master/src/FileSaver.js"></script>

</body>







<br>

<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Asignar grupos</h6>
            <p class="text-justify">
              
               En esta seccion se encuentran una tabla con los nombre de los docentes a los que se les asignaran
               los grupos correspondientes para el ciclo escolar.
                <br>
                La tabla se puede exportar a excel con el boton descargar
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