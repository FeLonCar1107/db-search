<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registarse</title>
</head>
<body>
    <form action="save-pasajero.php" method="POST">
    Nombre <input type="text" name = "nombre">  <br/>
     Edad <input type="text" name = "edad">  <br/>
     Estrato <input type="text" name = "estrato">  <br/>
     Genero
     <input type="radio" name="genero" value="0"> Femenino
     <input type="radio" name="genero" value="1"> Masculino
     <br/>
     <input type="submit" value="Registrarse"/> <input type="reset" value="Restablecer"/>
    </form>
</body>
</html>