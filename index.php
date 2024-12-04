<?php
  session_start();
  if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['group'])){
    header('Location: SesionIniciada.php');
        exit;
  }
  function validar($input){
    return preg_match('/^[a-zA-Z0-9]+$/', $input);
  }
  function sanear($input){
    return htmlspecialchars(trim($input));
  }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['group'])){
      $username = sanear($_POST['username']);
      $password = sanear($_POST['password']);
      $group = sanear($_POST['group']);
      if (validar($username) && validar($password) && validar($group)){
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['group'] = $group;
        header('Location: SesionIniciada.php');
        exit;
      }
    }else{
      echo "Error: Faltan datos";
    }
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
      <select id="group" name="group">
        <option value="admin">Administrador</option>
        <option value="user">Usuario</option>
        <option value="profesor">Profesor</option>
      </select>
    </form>
</html>