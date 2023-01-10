<?php
include ('database.php');
 $message = '';
 $usuarios ="SELECT * FROM users";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Actividades</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <!---  <link rel="stylesheet" href="./css/bootstrap.min.css"> -->
</head>

<body>
    <?php require 'partials/header.php' ?>
    <div>
        <h2>Actividades internas</h2>


        <form action="#" method="post">
            <tr>
                <td width="50%">Filtro</td>
                <td width="50%">
                    <select name="filtro_docente" id="">
                        <option value="1">Mostrar todos</option>
                        <option value="2">Mujeres</option>
                        <option value="3">Hombres</option>
                        <option value="4">Turno Matutino</option>
                        <option value="5">Turno Vespertino</option>
                        <option value="6">1° Grado</option>
                        <option value="7">2° Grado</option>
                        <option value="8">3° Grado</option>
                        <option value="9">Orientador</option>
                    </select>
                </td>
            </tr>
            <br>
            <br>
            <input type="submit" value="Buscar" class="btn_form" name="validar">
            <!----filtro--->

            <!------->

        </form>
        <!-----Inicio del form para historial---->
        <br>
        <br>
        <table class="tabla_act">

            <thead class="thead_act">
                <tr>
                    <th>Selecciona</th>
                    <th>Docentes</th>
                    <th>Grado</th>
                </tr>
            </thead>
            <?php
                if(isset($_POST['validar'])){
                  $sql = "";
                  if($_POST['filtro_docente'] == '1'){
                    echo "Buscar por todos";
                    $sql="SELECT*FROM users ";
                  }else if ($_POST['filtro_docente'] == '2'){
                    echo "buscar mujer";
                    $sql="SELECT*FROM users where sexo = 'F' ";
                  }else if ($_POST['filtro_docente'] == '3'){
                    echo "Busca hombre";
                    $sql="SELECT*FROM users where sexo = 'M' ";
                  }else if ($_POST['filtro_docente'] == '4'){
                    echo "Busca matutino";
                    $sql="SELECT*FROM users where matutino = '1' ";
                  }else if ($_POST['filtro_docente'] == '5'){
                    echo "Busca vespertino";
                    $sql="SELECT*FROM users where vespertino = '1' ";
                  }else if ($_POST['filtro_docente'] == '6'){
                    echo "Busca primer grado";
                    $sql="SELECT*FROM users where primero = '1' ";
                  }else if ($_POST['filtro_docente'] == '7'){
                    echo "Busca segundo grado";
                    $sql="SELECT*FROM users where segundo = '2' ";
                  }else if ($_POST['filtro_docente'] == '8'){
                    echo "Busca tercer grado";
                    $sql="SELECT*FROM users where tercero = '3' ";
                  }else if ($_POST['filtro_docente'] == '9'){
                    echo "Busca orientador";
                    $sql="SELECT*FROM users where rol = '3' ";
                  }
                
                  $resultado = mysqli_query($conexion, $sql);
                  $contador =0;
                  while($row=mysqli_fetch_assoc($resultado)){
                    $contador++;
                    ?>

            <form action="https://formspree.io/f/mpznlyao" method="POST">z
                <!---form historial---->
                <tr>
                    <!---Check box de filtro de maestros--->
                    <td> <input type="checkbox" value=<?php echo $row["nombre"]; ?> name="Nombre" id="tema1"
                            class="valores"></td>
                    <td class="separacion"><strong>
                            <div><?php echo $row["nombre"]; ?></div>
                        </strong></td>
                    <td class="separacion"><strong>
                            <div><?php 
                   if ($row["rol"]=='1'){
                      echo "Director";
                    }else if ($row["rol"]=='2'){
                      echo "Administrativo";
                    }else if ($row["rol"]=='3'){
                      echo "Orientador";
                    }else if ($row["rol"]=='4'){
                      echo "Docente";
                    }
                     ?></div>
                        </strong></td>
                </tr>
                <?php
                  }
                  echo "Total seleccionados--->".$contador;
                }
              ?>
                <input type="text" name="Motivo" id="" Placeholder="Motivo" class="form-control">

                <input type="submit" value="Enviar" class="btn_form" name="validar">
            </form>
            <?php

              $resultado = mysqli_query($conexion, $usuarios);
              while($row=mysqli_fetch_assoc($resultado)){   
              ?>
            <!------->
            <?php
              }
              ?>
        </table>

        --->
        <br><br><br>

        <p>
            <br>
            <button type="button" id="boton"> Mostrar seleccionados </button>
        </p>
        <form action="">
            <h2>Valores seleccionados</h2>
            <ul id="lista" class="list-group"> </ul>

            <script>
            var boton = document.getElementById('boton');
            var lista = document.getElementById('lista');
            var checks = document.querySelectorAll('.valores');

            boton.addEventListener('click', function() {
                lista.innerHTML = '';
                checks.forEach((e) => {
                    console.log(e.value)
                    if (e.checked == true) {
                        var elemento = document.createElement('li');
                        elemento.className = 'list-group-item';
                        elemento.innerHTML = e.value;
                        lista.appendChild(elemento);
                    }
                });
            });
            </script>
        </form>

</body>

</html>