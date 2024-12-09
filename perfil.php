<?php 
session_start();

$clases = "";



if(isset($_COOKIE['username']) && isset($_COOKIE['password']) && isset($_COOKIE['group'])){
    echo "Bienvenido! ".$_COOKIE['group']." ".$_COOKIE['username']."\n";
    if($_COOKIE['group'] == 'admin'){
        
        echo "<p>Membresía Pro</p>";
        echo "<form action='clases.php'>
        <input type='submit' value='clases'>
        </form>";
        echo recargarUsuarios();
    }else if($_COOKIE['group'] == 'profesor'){
        
        echo "<form action='clases.php'>
        <input type='submit' value='clases'>
        </form>";
        echo recargarUsuarios();
    }else{
        echo "<p>Membresía básica</p>";
        echo "<form action='clases.php'>
        <input type='submit' value='Clases'>
        </form>";
    }
    

}
function recargarUsuarios(){
    $usuarios ="";
    echo "<h2>Usuarios</h2>";
    foreach($_SESSION['usuarios'] as $value){
        $usuarios .= "<p>Nombre de usuario: ".$value['username']." Grupo; ".$value['group']."</p>";
    }
    return $usuarios;
}    
?>

<html>
    <body>
        
        <form method="POST" action="logout.php">
            <input type="submit" name="logout" value="Cerrar sesion">
        </form>
    </body>
</html>

