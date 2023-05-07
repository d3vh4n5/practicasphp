<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Microactividad M3 Corregida/final </title>
    </head>
    <body>
        
        
        
        <?php
        // put your code here
        
       // hacer esto en el archivo d las clases de la api
       function serverConect($dbname,$host,$user,$pass){
           try{
                $gbd = new PDO("mysql:dbname=$dbname;host=$host",$user,$pass);
                echo '<br>La conexión  con el servidor fue exitosa....<br>';
            } catch (PDOException $e){
                echo '<br>Falló la conexión: '.$e->getMessage();
            }
            return $gbd;
       }
        
        
        class Alumno {
           protected $id;
           public $nombre;
           public $apellido;
           public $email;
           public $direccion;
           public $legajo;
           protected $_exists = false;
           
           public function mostrar() {
               echo "<br><br>";
               echo"---------------------------------";
               echo "<br>Nombre:    ".$this->nombre;
               echo "<br>Apellido:  ".$this->apellido;
               echo "<br>email:     ".$this->email;
               echo "<br>direccion: ".$this->direccion;
               echo "<br>Legajo:    ".$this->legajo;
           }
           
           function __construct ($id){
                $gbd=serverConect("escuela","127.0.0.1","root","");
                if (!$gbd){
                    throw new Exception ("No se ha podido realizar la conexión");
                }
               
                $resource = $gbd->prepare("SELECT * FROM alumnos WHERE id = ?");
                $resource->execute(array($id));
       
                if ($resource){
                     $resp = $resource->fetchAll(PDO::FETCH_ASSOC);
                     $this->id = $resp[0]['id'];
                     $this->nombre = $resp[0]['nombre']; 
                     $this->apellido = $resp[0]['apellido']; 
                     $this->email = $resp[0]['email']; 
                     $this->direccion = $resp[0]['direccion']; 
                     $this->legajo = $resp[0]['legajo']; 
                     $this->_exists = true; 
                }else {
                    throw new Exception("No se pudo realizar la consulta de selección");
                } 
           }

           
           
       }
       
      
       
      
       die();
            
       $a1=new Alumno(8);
       #$a1-> __construct('Aquiles','Aquiles','aquiles@picapiedras.com','Rocallosas 57','21211/7');
       $a1->mostrar();
      

       // hcaer clases dentro de clases del proyecto y ver lo dle archivo autoload (autocarga)
      // function app_autoloader($class){
        // require_once $class . '.php';
        //}

        //spl_autoload_register('app_autoloader');
       
        ?>
    </body>
</html>
