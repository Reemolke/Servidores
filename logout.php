<?php
  session_start();
  foreach ($_COOKIE as $key => $value) {
    setcookie($key, '', time() - 3600, '/');
  }
  $_SESSION = [];
  session_destroy();
  echo "Sesión cerrada";
?>
<html>
  <body>
    <form action='index.php'>
      <input type="submit" value="Volver a inicio">
    </form>
  </body>
</html>