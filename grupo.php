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
    <title>Grupos</title></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <div class="container">
       <div class="row">
       <div class="jumbotron">
           <h1 class="display-3">Grupos</h1>
           <a href="index.php" class="btn_volver">Volver</a>
                <br>
           <hr class="my-2">
        </p>
        <br>
       </div>
       </div>

</head>
<body>
    <table class="tabla_act">
    <thead class="thead_act">
            <tr>
            <th>Nombre</th> <th>Grado</th> <th>Grupo</th> 
            </tr>  
    </thead>
<?php
    $sql="SELECT*FROM alumno where grado ='1' ";
?>


    </table>
<!---

<nav class="navbar">
    <a href="#" class="logo">Logo</a>
    <input type="checkbox" id="toggler">
    <label for="toggler"><i class="ri-menu-line"></i></label>
    <div class="menu">
        <ul class="list">
            <li><a href="#">Home</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Contact</a></a></li>
        </ul>

    </div>

---->
</nav>



</body>
</html>