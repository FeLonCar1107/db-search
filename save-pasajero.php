<?php 
   $nombre = $_REQUEST["nombre"];
   $edad = $_REQUEST["edad"];
   $estrato = $_REQUEST["estrato"];
   $genero = $_REQUEST["genero"];

    $host = "localhost";
    $dbname = "aerolinea";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = "INSERT INTO pasajero (id, nombre, edad, estrato) VALUES(NULL, '$nombre', '$edad', '$estrato')";

    $q = $cnx->prepare($sql);

    $result = $q->execute();
    
    if($result){
        echo "Pasajero creado exitosamente";
    }
    else{
        echo "error en el registro";
    }
?>