<?php
   
    $host = "localhost";
    $dbname = "aerolinea";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    
    $sql = "SELECT id, nombre FROM pasajero";
    $q = $cnx->prepare($sql);
    $result = $q->execute();
    $pasajeros = $q->fetchAll();

    $sql = "SELECT id, destino FROM vuelo";
    $q = $cnx->prepare($sql);
    $result = $q->execute();
    $vuelos = $q->fetchAll();

 ?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create enrollment</title>
</head>
<body>
    <form action="save-enrollment.php" method="POST">

     Pasajero 
     <select name="pasajero" id="">
<?php
     for($i=0; $i<count($pasajeros); $i++){
?>
         <option value="<?php echo $pasajeros[$i]["id"] ?>">
         <?php echo $pasajeros[$i]["nombre"] ?>
         </option>
<?php
     }
?>
     </select>
      <br/><br/>
      Vuelo 
     <select name="vuelo" id="">
<?php
     for($i=0; $i<count($vuelos); $i++){
?>
         <option value="<?php echo $vuelos[$i]["id"] ?>">
         <?php echo $vuelos[$i]["destino"] ?>
         </option>
<?php
     }
?>
     </select>
      <br/><br/>

     Shift 
     <input type="radio" name = "shift" value = "0"/> Dia 
     <input type="radio" name = "shift" value = "1"/> Noche
     <br/>
     <input type="submit" value="Registrarse"/> <input type="reset" value="Restablecer"/>

     </form>
</body>
</html>