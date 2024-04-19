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
    <title>Materiales</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
<<<<<<< HEAD
    <!---Logo de la pagina---->
    <link rel="shortcut icon" href="assets/img/edomex-logo.png" type="image/x-icon">
=======
    <!---Logo para mostrarse en la pestaña de la pagina-->
    <link rel="shortcut icon" href="assets/img/logo_favi.png" type="image/x-icon">
>>>>>>> rama1
</head>
<body>
<?php require 'partials/header.php' ?>
<div>   
<h2>Materiales</h2>    
 
   
   <form action="#" method="post" class="ancho" style="margin: auto; width: 380px;">
            <tr>
                <td width="50%"></td>
                 <td width="50%">
                    <select name="filtro_grado" id="" class="form-select mt-3">
                        <option value="1">Mostrar todos</option>
                        <option value="2">Primero</option> 
                        <option value="3">Segundo</option>
                        <option value="4">Tercero</option>
                    </select>
                    <select name="filtro_grupo" id="" class="form-select mt-3">
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
        <input type="submit" value="Buscar"  class="btn btn-success"   name="validar">
    </form>




    <br><br>
        <button onclick="exportTableToExcel('materiales')" class="buttonDownload">Exportar a Excel</button>



    <table class=" " id="materiales" style="margin: auto; width: 250px;" >
             
             <thead class="thead_act">
                  <tr>
                  <th>Ver</th><th>Alumnos</th> <th>Grado</th> <th>Grupo</th> 
                  </tr>  
             </thead>

        <?php
        if(isset($_POST['validar'])){
            $sql = ""; 
        if($_POST['filtro_grado'] == '1'){
            //echo "Buscar por todos";
            $sql="SELECT*FROM alumno ";
        }else if($_POST['filtro_grado'] == '2'){//filtro por grado
           // echo "Buscar primero";
            $sql="SELECT*FROM alumno where grado ='1' ";
            //filtro por grupós una ves seleccionado un grado
            //si solo se selecciona un grado, la opcion por default del select
            //equival a 0 por lo tanto no hace nada en tal caso
            if($_POST['filtro_grupo'] == '1'){
            $sql="SELECT*FROM alumno where grupo ='1' ";//filtro por grupo
                //echo "grupo A";
            }else if($_POST['filtro_grupo'] == '2'){//if de grupo B 
                $sql="SELECT*FROM alumno where grupo = '2' ";
                //echo "grupo B";
            }else if($_POST['filtro_grupo'] == '3'){//if de grupo c
                $sql="SELECT*FROM alumno where grupo = '3' ";
                //echo "grupo C";
            }else if($_POST['filtro_grupo'] == '4'){//if de grupo D
                $sql="SELECT*FROM alumno where grupo = '4' ";
                //echo "grupo D";
            }else if($_POST['filtro_grupo'] == '5'){//if de grupo D
                $sql="SELECT*FROM alumno where grupo = '5' ";
                //echo "grupo E";
            }else if($_POST['filtro_grupo'] == '6'){//if de grupo D
                $sql="SELECT*FROM alumno where grupo = '6' ";
                //echo "grupo F";
            }
        }else if($_POST['filtro_grado'] == '3'){//if de grupo B
            //echo "Buscar segundo";
            $sql="SELECT*FROM alumno where grado='2' ";
            //Inicio del filtro por grados para segundo
            if($_POST['filtro_grupo'] == '1'){
                $sql="SELECT*FROM alumno where grupo ='1' ";//filtro por grupo
                  //  echo "grupo A";
                }else if($_POST['filtro_grupo'] == '2'){//if de grupo B 
                    $sql="SELECT*FROM alumno where grupo = '2' ";
                  //  echo "grupo B";
                }else if($_POST['filtro_grupo'] == '3'){//if de grupo c
                    $sql="SELECT*FROM alumno where grupo = '3' ";
                  //  echo "grupo C";
                }else if($_POST['filtro_grupo'] == '4'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '4' ";
                   // echo "grupo D";
                }else if($_POST['filtro_grupo'] == '5'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '5' ";
                    //echo "grupo E";
                }else if($_POST['filtro_grupo'] == '6'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '6' ";
                    //echo "grupo F";
                }

            //fin de filtros para segundo
        }else if($_POST['filtro_grado'] == '4'){
            //echo "Buscar tercero";
            $sql="SELECT*FROM alumno where grado='3' ";
            //Inicio del filtro por grados para tercero
            if($_POST['filtro_grupo'] == '1'){
                $sql="SELECT*FROM alumno where grupo ='1' ";//filtro por grupo
                   // echo "grupo A";
                }else if($_POST['filtro_grupo'] == '2'){//if de grupo B 
                    $sql="SELECT*FROM alumno where grupo = '2' ";
                   // echo "grupo B";
                }else if($_POST['filtro_grupo'] == '3'){//if de grupo c
                    $sql="SELECT*FROM alumno where grupo = '3' ";
                   // echo "grupo C";
                }else if($_POST['filtro_grupo'] == '4'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '4' ";
                   // echo "grupo D";
                }else if($_POST['filtro_grupo'] == '5'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '5' ";
                   // echo "grupo E";
                }else if($_POST['filtro_grupo'] == '6'){//if de grupo D
                    $sql="SELECT*FROM alumno where grupo = '6' ";
                   // echo "grupo F";
                }


            //fin de filtros para tercero
        }
        
         $resultado = mysqli_query($conexion, $sql);
                  $contador =0;
                  while($row=mysqli_fetch_assoc($resultado)){
                    ?>
 <div class="">     
  <form action="https://formspree.io/f/xvoyqybz"  method="POST" style="margin: auto; width: 250px;">
        <tr><!---Form historial--->

             <!---Check box de filtro de maestros--->
             <td> <input type="checkbox" value=<?php echo $row["nombre"]; ?>  name="Alumno" id="tema1" class="valores"></td>
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
                //echo "Total seleccionados--->".$contador;
            }
            ?>
 
 <select name="Motivo" class="form-select mt-3" style="margin: auto; width: 250px;">
                    <option value="">Motivo</option>
                    <option value="utiles">Utiles</option>
                    <option value="libros">Libros</option>
                </select>
<br>
</table> 




  
  <input type="submit" value="Enviar"  class="btn btn-info" name="validar">
  </form>
  </div>
<!----
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
       --->



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

  saveAs(new Blob([s2ab(wbout)], {type:"application/octet-stream"}), 'materiales.xlsx');
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
            <h6>Materiales (Utiles)</h6>
            <p class="text-justify">
              
               En esta seccion se encuentra un filtro de busqueda, la opcion inicial
               mostrara todos los alumnos, de ahi se puede elegir que grado desea mostrar.
               <br>
               En el segundo filtro se podra elegir el grado.
                <br>
                Una vez los filtros sean aplicados aparecera una tabla con los resultados de la busqueda.
                <br>
                Para guardar los resultados obtenidos es necesario palomear la opcion con los nombres
                a querer guardar y por ultimo enviar el formulario, este sera enviado al correo del administrador 
                junto con la lista de nombres seleccionados.
               <br>
               De igual forma la tabla se puede exportar en formato excel con el boton descargar
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