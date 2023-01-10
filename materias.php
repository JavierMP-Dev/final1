<?php
include ('database.php');

 $message = '';
 $usuarios ="SELECT * FROM users";
 $materias ="SELECT * FROM materias";

 if(isset($_POST['agregar_materias'])){/*Valida si el boton validar a enviado la informacion*/ 
   /*Si ya se hizo click para que no se inserto informacion */
   $sql = "INSERT INTO materias (id_docente, materia) VALUES (:id_docente, :materia )"; 
   
   $materia ='';  
   $id_docente = '';
   if(isset($_POST['espa'])){
      $materia .= 'Español <br>';
      $id_docente = $_POST['espa'];
   }
   if(isset($_POST['segundaL'])){
      $materia .= 'Segunda Lengua <br> ';
      $id_docente = $_POST['segundaL'];
   }
   if(isset($_POST['matematicas_1'])){
      $materia .= 'Matematicas 1 <br>';
      $id_docente = $_POST['matematicas_1'];
   }
   if(isset($_POST['ciencias_1'])){
      $materia .= 'Ciencias 1 <br>';
      $id_docente = $_POST['ciencias_1'];
   }
   if(isset($_POST['tecnologia'])){
      $materia .='Tecnologia';
      $id_docente = $_POST['tecnologia'];
   }
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':id_docente', $id_docente);
     $stmt->bindParam(':materia', $materia);
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
    <title>Asignar Materias</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>                                                                                                                     
        <?php require 'partials/header.php' ?>
        <div>   
        <h2>Asignar materias</h2>   
        <a href="nada.php">Prueba</a> 
        <a href="docente.php" class="btn_volver">Volver</a></div>   
<form action="#" method="POST">
        <table class="posicion tabla dat" >                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    
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
                        <input type="checkbox" name="ciencias_1" value=<?php echo $row["id"]; ?>>Ciencias 1(Bio)
                        <br>
                        <input type="checkbox" name="tecnologia" value=<?php echo $row["id"]; ?>>Tecnologia
                        <br>
                     </td>
                    
                     <!----Materias segundo
                     <td class="pos_materias">
                     <input type="checkbox" name="" id="">Matematicas 2
                        <br>
                        <input type="checkbox" name="" id="">Español
                        <br>
                        <input type="checkbox" name="" id="">Ingles
                        <br>
                        <input type="checkbox" name="" id="">Geografia
                        <br>
                        <input type="checkbox" name="" id="">Historia
                        <br>
                     </td>
                     <!----Materias segundo
                     <td class="pos_materias">
                     <input type="checkbox" name="" id="">Matematicas 3
                        <br>
                        <input type="checkbox" name="" id="">Español
                        <br>
                        <input type="checkbox" name="" id="">Ingles
                        <br>
                        <input type="checkbox" name="" id="">Geografia
                        <br>
                        <input type="checkbox" name="" id="">Historia
                        <br>
                     </td>
                  ---->
               </tr>
             
              <?php
              }
              ?>
       </table> 
       <br><br>
       <br><br>
       <input type="submit" value="Enviar"  class="btn_form" name="agregar_materias">
    </form>
</body>
</html>