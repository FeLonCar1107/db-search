<?php
     $pasajero = $_REQUEST["pasajero"];
     $vuelo = $_REQUEST["vuelo"];
     $shift = $_REQUEST["shift"];
  
      $host = "localhost";
      $dbname = "aerolinea";
      $username = "root";
      $password = "";
  
      $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
      $sql = "INSERT INTO enrollment (id, pasajero_id, vuelo_id, shift) VALUES(NULL, '$pasajero', '$vuelo', '$shift')";

    $q = $cnx->prepare($sql);

    $result = $q->execute();
    
    if($result){
        echo "enrollment created";
    }
    else{
        echo "error in the enrollment";
    }
?>