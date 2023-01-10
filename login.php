<?php
  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /php-login');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (is_countable($results) && count($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /php-login");
    } else {
      $message = 'Verifique sus datos!!!';
    }
  }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>


    <?php if(!empty($message)): ?>
    <p> <?= $message ?></p>
    <?php endif; ?>


    <!---  <h1>Login</h1><span>or <a href="signup.php">SignUp</a></span> ---->
    <div class="form-signin">
        <form class="login" action="login.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Iniciar sesion</h1>

            <div class="form-floating">
                <input name="email" class="form-control" type="email" id="floatingInput"
                    placeholder="Ingresa tu correo">
                <label for="floatingInput">Correo</label>
            </div>

            <div class="form-floating">
                <input type="password" class="form-control" name="password" id="floatingPassword"
                    placeholder="Password">
                <label for="floatingInput">Contraseña</label>
            </div>

            <input type="submit" value="Enviar" class="w-100 btn btn-lg btn-primary" value="Iniciar sesion">
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </div>


</body>

</html>