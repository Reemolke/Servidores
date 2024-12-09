<?php
  session_start();
  function validarUser($input){
    return preg_match('/^(?=.*[a-z])(?=.*[A-Z])[a-zA-Z]{6,}$/
', $input);
  }
function validarPass($input){
  return preg_match('/^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z\d]{6}$/
', $input);
}
  function sanear($input){
    return htmlspecialchars(trim($input));
  }
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    
    if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['group'])){
      $username = sanear($_POST['username']);
      $password = sanear($_POST['password']);
      $group = sanear($_POST['group']);
      if (validarUser($username) && validarPass($password)){
        $_SESSION['usernameR'] = $username;
        $_SESSION['passwordR'] = $password;
        $_SESSION['groupR'] = $group;
        $_SESSION['usuarios'][] = ["username" => $username,"password" => $password, "group" =>$group];
        header('Location: login.php');
        exit;
      }else{
        echo "El usuario o la contraseña no son válidos. Revise combinar mayusculas y minusculas en el usuario y al menos un numero y una letra en la contraseña, mínimo 6 caracteres en ambos.";
      }
    }else{
      echo "Error: Faltan datos";
    }
  }
?> 
<html>
  <head>
    <title>Registro</title>
  </head>
  <body>
    <form method="POST">
      <label for="username">Nombre de usuario:</label>
      <input type="text" id="username" name="username">
      <label for="password">Contraseña:</label>
      <input type="password" id="password" name="password">
      <select id="group" name="group">
        <option value="admin">Administrador</option>
        <option value="user">Usuario</option>
        <option value="profesor">Profesor</option>
      </select>
      <input type="submit" value="Registrarse">
    </form>
</html>