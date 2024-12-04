<?php 
session_start();
require 'usuarios.php';


if(isset($_SESSION['username']) && isset($_SESSION['password'])&& isset($_SESSION['group'])){
    if($_SESSION['group'] == 'admin'){
        $user = new Admin($_SESSION['username'],$_SESSION['password'],$_SESSION['group']);
        setcookie('username',$user->getUsername(),time()+3600);
        setcookie('password',$user->getPassword(),time()+3600);
        setcookie('group',$user->getGroup(),time()+3600);
    }else if($_SESSION['group'] == 'profesor'){
        $user = new Profesor($_SESSION['username'],$_SESSION['password'],$_SESSION['group']);
        setcookie('username',$user->getUsername(),time()+3600);
        setcookie('password',$user->getPassword(),time()+3600);
        setcookie('group',$user->getGroup(),time()+3600);
    }else{
        $user = new Usuario($_SESSION['username'],$_SESSION['password'],$_SESSION['group']);
        setcookie('username',$user->getUsername(),time()+3600);
        setcookie('password',$user->getPassword(),time()+3600);
        setcookie('group',$user->getGroup(),time()+3600);
    }
    echo "Bienvenido! ".$user->getGroup()." ".$user->getUsername()."\n";

}
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['logout'])){
        $user->cerrarSesion();
    }
    if(isset($_POST['organizar']) && $user instanceof Profesor){
        $user->organizar($_POST['equipo']);
    }
}
?>

<html>
    <body>
        <?php if($user->getGroup() == 'admin'){
            
        }else if($user->getGroup() == 'profesor'){
            echo "<form method='POST'>
                    <label for='equipo'>Equipo: </label>
                    <select id='equipo' name='equipo'>
                        <option value='volley'>Volley</option>
                        <option value='futbol'>Futbol</option>
                        <option value='carrera obstaculizada'>Carrera obstaculizada</option>
                    </select>
                    <input type='submit' name='organizar' value='Organizar'>
                </form>";
        }else{
            echo "";
        } ?>
        <form method="POST">
            <input type="text">
        </form>
        <form method="POST">
            <input type="submit" name="logout" value="Cerrar sesion">
        </form>
    </body>
</html>

