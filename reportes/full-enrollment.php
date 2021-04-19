<?php 

 $where = '';
 if(isset($_REQUEST['shift'])){
     $shift = $_REQUEST['shift'];
     $where = "WHERE e.shift = '$shift'";
 }
 if(isset($_REQUEST['edad'])){
    $edad = $_REQUEST['edad'];
    $where = "WHERE p.edad = '$edad'";
}
 
    $host = "localhost";
    $dbname = "aerolinea";
    $username = "root";
    $password = "";

    $cnx = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $sql = "SELECT p.nombre, p.edad, p.estrato, v.destino, v.pasajeros, e.shift FROM pasajero as p JOIN enrollment e ON p.id = e.pasajero_id JOIN vuelo v ON e.vuelo_id = v.id $where ORDER BY p.nombre ASC";

    $q = $cnx->prepare($sql);

    $result = $q->execute();

    $enrrollments = $q->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Enrrollment</title>
</head>
<body>

<form acttion="">

Horario
     <select name="shift">
        <option value="0">Dia</option>
        <option value="1">Noche</option>
     </select>
     <br/><br/>
     
Edad  <input type = "number" name="edad">   
     <br/><br/>
     <input type="submit" value="Buscar"/>
     <hr/>
</form>

<h1>Lista enrollment</h1>
    <table border="1">
         <tr>
            <td>
                Nombre Pasajero
            </td>
            <td>
                Edad Pasajero
            </td>
            <td>
                Estrato Pasajero
            </td>
            <td>
                Destino Pasajero
            </td>
            <td>
                Horario Vuelo
            </td>
            <td>
                Pasajeros Vuelo
            </td>
         </tr>

         <?php
         for ($i=0; $i<count($enrrollments); $i++) {
         ?>
           <tr>
            <td>
                <?php echo $enrrollments[$i]["nombre"] ?>
            </td>
            <td>
            <?php echo $enrrollments[$i]["edad"] ?>
            </td>
            <td>
            <?php echo $enrrollments[$i]["estrato"] ?>
            </td>
            <td>
            <?php echo $enrrollments[$i]["destino"] ?>
            </td>
            <td>
            <?php 
               $shift = $enrrollments[$i]["shift"]; 
               if($shift == "0"){
                   echo "Dia";
               }
               else{
                   echo "Noche";
               }
               ?>
            </td>
            <td>
            <?php echo $enrrollments[$i]["pasajeros"] ?>
            </td>
           </tr>
           <?php
           }
        ?>
    </table>
</body>
</html>