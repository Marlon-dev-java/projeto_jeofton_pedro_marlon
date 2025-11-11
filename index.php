<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu primeiro commit: pedro</title>
</head>
<body>
    <?php
        $bebida = $_GET['marca'];
        //teste
   
        switch (strtolower($marca)) {
         case ("toyota"):
            echo "<p>A marca escolhida foi: $marca</p>";
            break;
         case ( "fiat"): 
            echo "<p>A marca escolhida foi: $marca</p>";
            break;
         case ( "volvo"): 
            echo "<p>A marca escolhida foi: $marca</p>";
            break;
         case ( "honda"): 
            echo "<p>A marca escolhida foi: $marca</p>";
            break;
         default :
            echo "<p.O cliente não escolheu nenhuma marca.</p>";
        }
    ?>
    </body>
</html>