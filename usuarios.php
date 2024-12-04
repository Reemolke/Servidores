<?php
class Usuario{
      private $username;
      private $password;
      private $group;
      public function __construct($username, $password, $group){
        $this->username = $username;
        $this->password = $password;
        $this->group = $group;
      }
      public function cerrarSesion(){
        $_SESSION =[];
        session_destroy();
        header('Location: index.php');
        foreach ($_COOKIE as $key => $value) {
          // Establecer la cookie con un valor vacío y una fecha de expiración pasada
          setcookie($key, '', time() - 3600, '/');
        }
        exit;
      }
      public function getGroup(){
        return $this->group;
      }
      public function getUsername(){
        return $this->username;
      }
      public function getPassword(){
        return $this->password;
      }
    }
    class Admin extends Usuario{
      public $username;
      public $password;
      public $group;
      public function __construct($username,$password,$group){
        parent::__construct($username,$password,$group);
      }

    }
    class Profesor extends Usuario{
      public $username;
      public $password;
      public $group;
      public function __construct($username,$password,$group){
        parent::__construct($username,$password,$group);
      }
      public function organizar($equipo){
        echo "Organizando $equipo";
      }
    }
    ?>
    