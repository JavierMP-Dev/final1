 <?php
$message = '';
include ('database.php');
$usuarios ="SELECT * FROM alumnos";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libros</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <!---Logo para mostrarse en la pestaña de la pagina-->
    <link rel="shortcut icon" href="assets/img/logo_favi.png" type="image/x-icon">
</head>
<body>
<?php require 'partials/header.php' ?>
<div>   
<h2>Libros</h2>    
<a href="index.php" class="btn_volver">Volver</a></div>  
   
   <form action="#" method="post">
            <tr>
                <td width="50%">Filtro</td>
                 <td width="50%">
                    <select name="filtro_grado" id="">
                        <option value="1">Mostrar todos</option>
                        <option value="2">Primero</option> 
                        <option value="3">Segundo</option>
                        <option value="4">Tercero</option>
                    </select>
                    <select name="filtro_grupo" id="">
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
         <br>
         <br>
        <input type="submit" value="submit"  class="btn_form"    name="validar">
    </form>

    <table class="tabla_act">
             
             <thead class="thead_act">
                  <tr>
                  <th>Ver</th><th>Alumnos</th> <th>Grado</th> <th>Grupo</th> 
                  </tr>  
             </thead>

        <?php
        if(isset($_POST['validar'])){
            $sql = ""; 
        if($_POST['filtro_grado'] == '1'){
            echo "Buscar por todos";
            $sql="SELECT*FROM alumno ";
        }else if($_POST['filtro_grado'] == '2'){//filtro por grado
            echo "Buscar primero";
            $sql="SELECT*FROM alumno where grado ='1' ";
            //filtro por grupós una ves seleccionado un grado
            //si solo se selecciona un grado, la opcion por default del select
            //equival a 0 por lo tanto no hace nada en tal caso
            if($_POST['filtro_grupo'] == '1'){
            $sql="SELECT*FROM alumno where grupo ='1' ";//filtro por grupo
                echo "grupo A";
            }else if($_POST['filtro_grupo'] == '2'){//if de grupo B 
                $sql="SELECT*FROM alumno where grupo = '2' ";
                echo "grupo B";
            }else if($_POST['filtro_grupo'] == '3'){//if de grupo c
                $sql="SELECT*FROM alumno where grupo = '3' ";
                echo "grupo C";
            }else if($_POST['filtro_grupo'] == '4'){//if de grupo D
                $sql="SELECT*FROM alumno where grupo = '4' ";
                echo "grupo D";
            }else if($_POST['filtro_grupo'] == '5'){//if de grupo D
                $sql="SELECT*FROM alumno where grupo = '5' ";
                echo "grupo E";
            }else if($_POST['filtro_grupo'] == '6'){//if de grupo D
                $sql="SELECT*FROM alumno where grupo = '6' ";
                echo "grupo F";
            }
        }else if($_POST['filtro_grado'] == '3'){//if de grupo B
            echo "Buscar segundo";
            $sql="SELECT*FROM alumno where grado='2' ";
            //Inicio del filtro por grados para segundo
            if($_POST['filtro_grupo'] == '1'){
                $sql="SELECT*FROM alumno where grupo ='1' ";//filtro por grupo
                    echo "grupo A";
                }else if($_POST['filtro_grupo'] == '2'){//if de grupo B 
                    $sql="SELECT*FROM alumno where grupo = '2' ";
                    echo "grupo B";
                }else if($_POST['filtro_grupo'] == '3'){//if de grupo c
                    $sql="SELECT*FROM alumno where grupo = '3' ";
                    echo "grupo C";
                }else if($_POST['filtro_grupo'] == '4'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '4' ";
                    echo "grupo D";
                }else if($_POST['filtro_grupo'] == '5'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '5' ";
                    echo "grupo E";
                }else if($_POST['filtro_grupo'] == '6'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '6' ";
                    echo "grupo F";
                }

            //fin de filtros para segundo
        }else if($_POST['filtro_grado'] == '4'){
            echo "Buscar tercero";
            $sql="SELECT*FROM alumno where grado='3' ";
            //Inicio del filtro por grados para tercero
            if($_POST['filtro_grupo'] == '1'){
                $sql="SELECT*FROM alumno where grupo ='1' ";//filtro por grupo
                    echo "grupo A";
                }else if($_POST['filtro_grupo'] == '2'){//if de grupo B 
                    $sql="SELECT*FROM alumno where grupo = '2' ";
                    echo "grupo B";
                }else if($_POST['filtro_grupo'] == '3'){//if de grupo c
                    $sql="SELECT*FROM alumno where grupo = '3' ";
                    echo "grupo C";
                }else if($_POST['filtro_grupo'] == '4'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '4' ";
                    echo "grupo D";
                }else if($_POST['filtro_grupo'] == '5'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '5' ";
                    echo "grupo E";
                }else if($_POST['filtro_grupo'] == '6'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '6' ";
                    echo "grupo F";
                }


            //fin de filtros para tercero
        }
        
         $resultado = mysqli_query($conexion, $sql);
                  $contador =0;
                  while($row=mysqli_fetch_assoc($resultado)){
                    ?>     
  <form action="https://formspree.io/f/xvoyqybz" method="POST">
        <tr><!---Form historial--->
             <!---Check box de filtro de maestros--->
             <td> <input type="checkbox" value=<?php echo $row["nombre"]; ?> name="tema1" name="Alumno" id="tema1" class="valores"></td>
                    <td class="separacion"><strong> <div ><?php echo $row["nombre"]; ?></div> </strong></td>
                    <td class="separacion"><strong> <div ><?php echo $row["grado"]; ?></div> </strong></td>
                    <td class="separacion"><strong> <div ><?php 
                     if ($row["grupo"]=='1'){
                        echo "A";
                      }else if ($row["grupo"]=='2'){
                        echo "B";
                      }else if ($row["grupo"]=='3'){
                        echo "C";
                      }else if ($row["grupo"]=='4'){
                        echo "D";
                      }else if ($row["grupo"]=='5'){
                        echo "E";
                      }else if ($row["grupo"]=='6'){
                        echo "F";
                      }
                    ?></div> </strong></td>
       
                </tr>   
        <?php
                }
                echo "Total seleccionados--->".$contador;
            }
            ?>
 <input type="text" name="Motivo" id="" Placeholder="Motivo">

<input type="submit" value="Enviar"  class="btn_form" name="validar">
  </form>

  <?php

$resultado = mysqli_query($conexion, $usuarios);
while($row=mysqli_fetch_assoc($resultado)){   
?>
<!-----
<?php
}
?>
-->

    </table>   

    <p>
          <button type="button" id="boton"> Mostar seleccionados </button>
        </p>
       <form action="">
              <h2>Valores seleccionados</h2>
              <ul id="lista" class="list-group">  </ul>

              <script>
                var boton = document.getElementById('boton');
                var lista = document.getElementById('lista');
                var checks= document.querySelectorAll('.valores');

                boton.addEventListener('click', function(){
            lista.innerHTML ='';
            checks.forEach((e)=>{
              console.log(e.value)
              if (e.checked ==true){
                var elemento = document.createElement('li');
                elemento.className ='list-group-item';
                elemento.innerHTML = e.value;
                lista.appendChild(elemento);
              }
                  });
                });
              </script> 

       </form>
</body>
</html>