<?php
  session_start();
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset($_POST['username']) && isset($_POST['password']) && isset($_SESSION['usuarios'])) {
        // Buscar el array de usuario que coincida con el username en $_SESSION['usuarios']
        $usuarioEncontrado = array_filter($_SESSION['usuarios'], function($usuario) {
            return $usuario['username'] === $_POST['username'];
        });

        // Si se encuentra el usuario, se compara la contraseña
        if (!empty($usuarioEncontrado)) {
            $usuarioEncontrado = array_values($usuarioEncontrado)[0]; // Obtener el primer resultado encontrado
            if ($_POST['password'] == $usuarioEncontrado['password']) {
                $_SESSION['login'] = true;
                setcookie('username', $_POST['username'], time() + 3600);
                setcookie('password', $_POST['password'], time() + 3600);
                setcookie('group', $usuarioEncontrado['group'], time() + 3600);

                header('Location: perfil.php');
                exit;
            }
        }

        // Si no se encuentra el usuario o la contraseña es incorrecta
        echo "Contraseña o usuario incorrectos";
    }
    
  }
    if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['group'])){
      header('Location: perfil.php');
      exit;
    }
    
?>
<html>
  <head>
    <title>Iniciar sesión</title>
  </head>
  <body>
    <form method="POST">
      <label for="username">Nombre de usuario:</label>
      <input type="text" id="username" name="username">
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password">
      <input type="submit" value="Iniciar sesión">
    </form>
</html>