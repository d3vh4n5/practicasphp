<!doctype html>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        ✏✏✏✏️✏️✏️✏️️✏️✏️✏️️✏️✏️️✏️️✏️️✏️️✏️✏✏✏️✏️✏️✏ ️✏
    </body>
</html>



<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */













/*
function decodeChar($char){
    echo '<br>Caracter introducido: '.$char;
    $ord = ord($char);
    echo '<br>Caracter ASCII Number: '.$ord;
    echo '<br>Caracter ASCII a binario: '.decbin($ord); 
    echo '<br>Caracter ord a UTF: '."&#$ord";
    echo '<br>Caracter UTF decode: '. utf8_decode($char);
    echo '<br>Caracter UTF encode: '. utf8_encode($char);
    echo '<br> Char detect: '.mb_detect_encoding($char);
    echo '<br> mime: '.($char);
    var_dump($char);
}

decodeChar("✅");
echo"<br>";
echo "&#9998";
decodeChar("✏");

die();

for ($i=9900; $i< 99999; $i++){
    echo "Emogi:<p style='font-size:20px;'> &#$i </p> Código: $i <br>";
}


die();

die();

echo ord("✅");
$char = ord("✅");
echo "&#$char";






try{
           $gbd = new PDO("mysql:dbname=pruebas;host=127.0.0.1","root","");
           $resource = $gbd->prepare("CREATE TABLE IF NOT EXISTS `prueba` (
                            `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
                            `nombre` varchar(50) NOT NULL,
                            `apellido` varchar(50) NOT NULL,
                            `fecha_nacimiento` date NOT NULL,
                            `email` varchar(200) NOT NULL,
                            `domicilio` varchar(200) NOT NULL,
                            PRIMARY KEY (`id`)
                           ) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8");
           echo 'La conexión  con el servidor fue exitosa....<br>';
            if ($resource->execute()){
                echo "<br>Tabla creada correctamente";
            }else {
                echo "<br>No se pudo crear la tabla";
                echo $resource->errorCode();
                print_r($resource->errorInfo());
            }
       } catch (PDOException $e){
           echo 'Falló: '.$e->getMessage();
       }