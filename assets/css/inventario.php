<?php
include ('database.php');
 $message = '';
 $inventa ="SELECT * FROM inventario";


if(isset($_POST['AGREGAR_RUBRO'])){
    $sql = "INSERT INTO inventario (rubro, cantidad) VALUES (:rubro, :cantidad)"; 
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':rubro', $_POST['rubro']);
    $stmt->bindParam(':cantidad', $_POST['cantidad']);
    if ($stmt->execute()) {
        echo "Registro exitoso";
        //$message = 'Registro exitoso!!!';
      } else {
        echo "Fail";
        //$message = 'No registrado';
      }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
</head>
<body>
   <div class="container">
       <div class="row">

       <div class="jumbotron">
           <h1 class="display-3">Datos Escuela</h1>
           
           <p class="lead"></p>
           <hr class="my-2">
         
        </p>
       </div>

       </div>
   </div>
   <a href="index.php" class="btn_volver">Volver</a>
<br>
   <a href="inventario.php" class="btn_nav">Inventarios</a>
   <a href="evento.php" class="btn_nav">Eventos</a>
   <a href="gasto.php" class="btn_nav">Gastos</a>


    <h1>Existencias</h1>

    <div id="main_container">
             <!--- <div class="">Inventario</div>
              <div class="">Rubro</div>
              <div class="">Existencia</div>
              --->
              <table class="tabla_dat">
              <thead class="thead_dat">
                      <tr>
                          <th>Rubro</th> <th>Existencia</th><th>Editar</th><th>Eliminar</th>
                      </tr>
                  </thead>
              <?php
              $resultado = mysqli_query($conexion, $inventa);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
              <tr>
                  <td><div class=""><?php echo $row["rubro"]; ?></div></td>
                  <td><div class=""><?php echo $row["cantidad"]; ?></div></td>
              </tr>
        
              <?php
              }
              ?>
              </table>
       </div>

    <h2>Nuevo Rubro</h2>

    <form action="inventario.php" method="POST" class="form">
        <tr>
             <td width="50%">Rubro: </td>   
             <td width="50%"> <input name="rubro" type="text" required placeholder="Rubro"> </td>
         </tr>
         <tr>
             <td width="50%">Cantidad</td>
             <td width="50%"><input type="number" name="cantidad" id=""></td>
         </tr>
              <br>
              <br>
              <br>
         <input name="AGREGAR_RUBRO" type="submit" value="submit" class="btn_form">
    </form>

</body>
</html>