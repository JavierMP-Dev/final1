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
      $message = 'Usuario creado con exito!!!!';
    } else {
      $message = 'Verifique los datos';
    }
  }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Agregar docente</title>
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
        <br><br>
        <main class="form-signin">

            <form class="nuevo_docentee" action="signup.php" method="POST">
                <!---    
                     <tr>
                    <td width="50%">Rol:</td>
                    <td width="50%">
                        <select name="rol" id="">
                            <option value="1">Orientador</option>
                            <option value="2">Docente</option>
                        </select>
                    </td>
                  </tr>
                --->
                <div class="form-floating">

                    <input name="email" type="email" id="floatingInput" class="form-control">
                    <label for="floatingInput">Correo</label>



                    <select class="form-select mt-3" name="rol">
                        <option selected>Seleccione un rol</option>
                        <option value="1">Pedagogo</option>
                        <option value="2">Docente</option>

                    </select>

                    <!------
                    <div class="mb-3">
                        <label for="formFile" class="form-label"></label>
                        <input class="form-control" type="file" id="col-sm-2 col-form-label  formFile">
                    </div>
            ----->
                    <div class="datosMateria">
                        <input ID="Password" type="password" onkeyup="validarClaves()" name="clave1"
                            placeholder="Contraseña" class="col-sm-2 col-form-label form-control">
                        <!----
                        
                        --->
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
                <input type="submit" value="Enviar" class="btn_form_signup">
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

</html>