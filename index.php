<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST'){
  if(isset($_POST['inicio'])){
    header('Location: login.php');
  }else{
    header('Location: registro.php');
  }
}
  

?>
<html>
  <body>
    <form method="POST">
      <input type='submit' name='inicio' value='Iniciar sesión'>
      <input type='submit' name='registro' value='Registrar'>
    </form>
  </body>
</html>