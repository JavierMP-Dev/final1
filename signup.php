    <?php
  require 'database.php';
  $message = '';

  if (!empty($_POST['email']) && !empty($_POST['clave1'])) {
    $sql = "INSERT INTO users (rol, email,password) VALUES (:rol, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':rol', $_POST['rol']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['clave1'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success' role='alert'>Usuario creado con exito</div>";
      //$message = 'Verifique sus datos!!!';
      //$message = 'Usuario creado con exito!!!!';
    } else {
        echo "<div class='alert alert-danger' role='alert'>Verifique sus datos</div>";
      $message = 'Verifique los datos';
    }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Agregar docente</title>
    <!---Logo de la pagina---->
<link rel="shortcut icon" href="assets/img/edomex-logo.png" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body> 

    <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
    <?php endif; ?>
    <?php require 'partials/header.php' ?>

    <div>

        <!---- <h1>SignUp</h1>  ---->
        <!---<span>or <a href="login.php">Login</a></span>--->
        <h3 style="margin: auto; width: 250px;">Registrar docente</h3>
        <a href="index.php" class="btn btn-primary">Volver</a>
        <br>
        <main class="form-signin">

            <form class="form" action="signup.php" method="POST">
              
                <div class="form-floating">

                    <input name="email" type="email" id="floatingInput" class="form-control">
                    <label for="floatingInput">Correo</label>



                    <select class="form-select mt-3" name="rol">
                        <option selected>Seleccione un rol</option>
                        <option value="1">Pedagogo</option>
                        <option value="2">Docente</option>

                    </select>

                    
                    <div class="datosMateria">
                        <input ID="Password" type="password" onkeyup="validarClaves()" name="clave1"
                            placeholder="Contraseña" class="col-sm-2 col-form-label form-control">
                    </div>

                    <div class="datosMateria">
                        <input ID="Contraseña" type="password" onkeyup="validarClaves()" name="clave2"
                            placeholder="Confirma contraseña" class="col-sm-2 col-form-label form-control">
                        <img class="imgB" id="img_Pass" src="" alt="">

                    </div>
                </div>
                <div>
                    <abbr title="Mostrar contraseña">
                        <img id="btnImagen" class="ojo" src="assets/img/ver.png" class="btn-Imagen"
                            onclick="mostrarContrasenia()">
                    </abbr>
                </div>
                <input type="submit" value="Enviar"  class="btn btn-info">
    </div>
    <!----->

    </form>
    </main>
    <script>
    function mostrarContrasenia() {
        var image = document.getElementById("btnImagen");
        if (image.src.match("ver")) {
            image.src = "assets/img/ocultar.png";
        } else {
            image.src = "assets/img/ver.png";
        }
        var tipo = document.getElementById("Password");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
        tipo = document.getElementById("Contraseña");
        if (tipo.type == "password") {
            tipo.type = "text";
        } else {
            tipo.type = "password";
        }
    }

    function validarClaves() {
        var clave1 = document.getElementById('Password');
        var clave2 = document.getElementById('Contraseña');
        if (clave2.value != "") {
            if (clave1.value == clave2.value) {
                var image = document.getElementById('img_Pass');
                image.src = "assets/img/Tick_Mark_Dark_icon-icons.com_69147.png";
                document.getElementById('BtnSig').disabled = false;
            } else {
                var image = document.getElementById('img_Pass');
                image.src = "assets/img/mal.png";
                document.getElementById('BtnSig').disabled = true;
            }
        }
    }
    </script>

</body>


<br><br><br><br><br>

<!-- Site footer -->
<footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>Registrar nuevo docente</h6>
            <p class="text-justify">
              <i>Crear cuenta </i>
               En esta seccion se encuentra un formulario para dar de alta una nueva cuenta
               para ingresar al sistema, dependiendo del rol con el que se cuente el usuario
               tendra acceso a diferentes funciones, si el usuario se da de alta desde este formulario
               solo se registrar su correo, rol y contraseña para que en los dias siguientes sea el usuario
               mismo quien se encargue de rellenar sus propios datos. 
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