<?php

abstract class Clase {
    protected $nombre;
    protected $profesor;
    protected $hora;

    public function __construct($nombre, $profesor, $hora) {
        $this->nombre = $nombre;
        $this->profesor = $profesor;
        $this->hora = $hora;
    }

    abstract public function agregar($nombre, $profesor, $hora);
    abstract public function mostrar();
}

// Clase Yoga
class Yoga extends Clase {
    protected static $yoga = [];

    public function __construct($nombre, $profesor, $hora) {
        parent::__construct($nombre, $profesor, $hora);
        self::$yoga[] = [$nombre, $profesor, $hora];
    }

    public function agregar($nombre, $profesor, $hora) {
        self::$yoga[] = [$nombre, $profesor, $hora];
    }

    public function mostrar() {
        $clases = "";
        foreach (self::$yoga as $clase) {
            $clases .= "<p>Nombre de clase: " . htmlspecialchars($clase[0]) . "</p>";
            $clases .= "<p>Nombre del profesor: " . htmlspecialchars($clase[1]) . "</p>";
            $clases .= "<p>Hora: " . htmlspecialchars($clase[2]) . "</p>";
        }
        echo $clases;
    }
}

// Clase Pilates
class Pilates extends Clase {
    protected static $pilates = [];

    public function __construct($nombre, $profesor, $hora) {
        parent::__construct($nombre, $profesor, $hora);
        self::$pilates[] = [$nombre, $profesor, $hora];
    }

    public function agregar($nombre, $profesor, $hora) {
        self::$pilates[] = [$nombre, $profesor, $hora];
    }

    public function mostrar() {
        $clases = "";
        foreach (self::$pilates as $clase) {
            $clases .= "<p>Nombre de clase: " . htmlspecialchars($clase[0]) . "</p>";
            $clases .= "<p>Nombre del profesor: " . htmlspecialchars($clase[1]) . "</p>";
            $clases .= "<p>Hora: " . htmlspecialchars($clase[2]) . "</p>";
        }
        echo $clases;
    }
}

// Clase Spinning
class Spinning extends Clase {
    protected static $spinning = [];

    public function __construct($nombre, $profesor, $hora) {
        parent::__construct($nombre, $profesor, $hora);
        self::$spinning[] = [$nombre, $profesor, $hora];
    }

    public function agregar($nombre, $profesor, $hora) {
        self::$spinning[] = [$nombre, $profesor, $hora];
    }

    public function mostrar() {
        $clases = "";
        foreach (self::$spinning as $clase) {
            $clases .= "<p>Nombre de clase: " . htmlspecialchars($clase[0]) . "</p>";
            $clases .= "<p>Nombre del profesor: " . htmlspecialchars($clase[1]) . "</p>";
            $clases .= "<p>Hora: " . htmlspecialchars($clase[2]) . "</p>";
        }
        echo $clases;
    }
}
// Crear instancias de las clases de Yoga
$yoga1 = new Yoga("Clase de Yoga Matutina", "Profesor A", "7:00 AM");
$yoga2 = new Yoga("Clase de Yoga de Tarde", "Profesor B", "5:00 PM");
$yoga3 = new Yoga("Clase de Yoga Nocturna", "Profesor C", "8:00 PM");

// Crear instancias de las clases de Pilates
$pilates1 = new Pilates("Clase de Pilates 1", "Profesor D", "9:00 AM");
$pilates2 = new Pilates("Clase de Pilates 2", "Profesor E", "12:00 PM");
$pilates3 = new Pilates("Clase de Pilates 3", "Profesor F", "6:00 PM");

// Crear instancias de las clases de Spinning
$spinning1 = new Spinning("Clase de Spinning 1", "Profesor G", "10:00 AM");
$spinning2 = new Spinning("Clase de Spinning 2", "Profesor H", "2:00 PM");
$spinning3 = new Spinning("Clase de Spinning 3", "Profesor I", "7:00 PM");

// Agregar más clases a cada tipo
$yoga1->agregar("Clase de Yoga Avanzada", "Profesor J", "9:00 AM");
$pilates2->agregar("Clase de Pilates para Principiantes", "Profesor K", "4:00 PM");
$spinning3->agregar("Clase de Spinning Intensiva", "Profesor L", "5:00 PM");

// Mostrar todas las clases de cada tipo
echo "<h2>Clases de Yoga</h2>";
$yoga1->mostrar();

echo "<h2>Clases de Pilates</h2>";
$pilates1->mostrar();

echo "<h2>Clases de Spinning</h2>";
$spinning1->mostrar();

?>