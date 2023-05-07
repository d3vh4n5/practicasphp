<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Microactividad M3 Act4 </title>
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
           public $nombre;
           public $apellido;
           public $email;
           public $direccion;
           public $legajo;
           
           public function mostrar() {
               echo "<br><br>";
               echo"---------------------------------";
               echo "<br>Nombre:    ".$this->nombre;
               echo "<br>Apellido:  ".$this->apellido;
               echo "<br>email:     ".$this->email;
               echo "<br>direccion: ".$this->direccion;
               echo "<br>Legajo:    ".$this->legajo;
           }
           
           static function constructor ($nombre, $apellido, $email, $direccion, $legajo){
                $gbd=serverConect("escuela","127.0.0.1","root","");
               
                $resource = $gbd->prepare("INSERT INTO alumnos (nombre, apellido, email, direccion, legajo)"
               ."VALUES (?,?,?,?,?)");
       
                $arr_prepare = array($nombre,$apellido,$email,$direccion,$legajo);
       
                if ($resource->execute($arr_prepare)){
                     echo "<br>Registro realizado correctamente";
                }else {
                    echo "<br>No se pudo insertar el valor";
                    echo $resource->errorCode();
                    echo $resource->errorInfo();
                } 
           }
           static function actualizar (){
               // Actualizando algo en al DB
               $gbd=serverConect("escuela","127.0.0.1","root","");
      
                $resource = $gbd->prepare("UPDATE alumnos SET direccion = ? WHERE id = ?");

                $arr_prepare = array("Miracca 1873", 1);

                if ($resource->execute($arr_prepare)){
                    echo "<br>Registro actualizado correctamente";
                }else {
                    echo "<br>Error al actualizar el Registro";
                }
     
           }
           
           static function listar() {//static es una funcion que es de la clase, no del objeto
                $gbd=serverConect("escuela","127.0.0.1","root","");
                
                $resource = $gbd->prepare("SELECT * FROM alumnos");
                $resource->execute();
                $registrados = $resource->fetchAll(PDO::FETCH_ASSOC);
                echo "<pre>";
                print_r($registrados);
                echo"</pre>"; 
                
           }
           
           public function guardar(){
               
           }

           
           
       }
       
       $listar = Alumno::listar(); // :: es funcion de clases (no de objetos)
       
       die('Termino aca para probar');
       $a1=new Alumno();
       #$a1->insertar('Aquiles','Aquiles','aquiles@picapiedras.com','Rocallosas 57','21211/7');
       $a1->listar();
      

       // hcaer clases dentro de clases del proyecto y ver lo dle archivo autoload (autocarga)
      // function app_autoloader($class){
        // require_once $class . '.php';
        //}

        //spl_autoload_register('app_autoloader');
       
        ?>
    </body>
</html>
