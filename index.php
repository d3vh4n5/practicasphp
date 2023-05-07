<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Microactividad Modulo3</title>
    </head>
    <body>
        
        
        
        <?php
        // put your code here
        
       try{
           $gbd = new PDO("mysql:dbname=escuela;host=127.0.0.1","root","");
           echo 'La conexión  con el servidor fue exitosa....<br>';
       } catch (PDOException $e){
           echo 'Falló la conexión: '.$e->getMessage();
       }
       
       //xxxxxxxxx             Clases          xxxxxxxxxxxxxxxxxxxxxx
       
        abstract class Personas {
            public $nombre;
            public $apellido;
            public $email;
            public $direccion;

            public function imprimirDatos(){
                echo "<br>Nombre:    ".$this->nombre;
                echo "<br>Apellido:  ".$this->apellido;
                echo "<br>email:     ".$this->email;
                echo "<br>direccion: ".$this->direccion;
            }

            function constructor ($nombre, $apellido, $email, $direccion){
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->email = $email;
                $this->direccion = $direccion;
            }
        }

        final class Alumno extends Personas{
            public $legajo;

            function set ($nombre, $apellido, $email, $direccion,$legajo){
                parent::constructor ($nombre, $apellido, $email, $direccion);
                $this->legajo = $legajo;
            }

            public function imprimirDatos() {
                echo "<br><br>";
                echo"---------------------------------";
                parent::imprimirDatos();
                echo "<br>Legajo:    ".$this->legajo;
            }
        }
     
       //Insertando algo en la DB
       
       $resource = $gbd->prepare("INSERT INTO alumnos (nombre, apellido, email, direccion, legajo)"
               ."VALUES (?,?,?,?,?)");
       
       $arr_prepare = array('Pedro','Picapiedras','pedro@picapiedras.com','Rocallosas 50','21211/5');
       
       if ($resource->execute($arr_prepare)){
           echo "<br>Registro realizado correctamente";
       }else {
           echo "<br>No se pudo insertar el valor";
           echo $resource->errorCode();
           echo $resource->errorInfo();
       }
       
       // Actualizando algo en al DB
      
       $resource = $gbd->prepare("UPDATE alumnos SET direccion = ? WHERE id = ?");
       
       $arr_prepare = array("Miracca 1873", 1);
       
       if ($resource->execute($arr_prepare)){
           echo "<br>Registro actualizado correctamente";
       }else {
           echo "<br>Error al actualizar el Registro";
       }
     
       //Recuperando algo en la DB
       
       $resource = $gbd->prepare("SELECT * FROM alumnos");
       $resource->execute();
       $registrados = $resource->fetchAll(PDO::FETCH_ASSOC);
       echo "<pre>";
       print_r($registrados);
       echo"</pre>";
       
       
       
       //$a1=new Alumno();
       //$a1->set('Pedro','Picapiedras','pedro@picapiedras.com','Rocallosas 50','21211/5');
       //$a1->imprimirDatos();
       
       
        
       // hcaer clases dentro de clases del proyecto y ver lo dle archivo autoload (autocarga)
      // function app_autoloader($class){
        // require_once $class . '.php';
        //}

        //spl_autoload_register('app_autoloader');
       
        ?>
    </body>
</html>
