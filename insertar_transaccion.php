<?php
    $link = mysqli_connect("localhost","root","","prueba_koupa") or die("<h2>No se encuentra el servido<h2>");
    
    $id = $_POST["user_id"];
    $precio =$_POST["precio"];

    $consulta = "SELECT saldo FROM users WHERE user_id=$id";

    if ($resultado = mysqli_query($link, $consulta)) {

        /* obtener el array asociativo */
        while ($fila = mysqli_fetch_row($resultado)) {
            $var=$fila[0];
            #echo $var;
        }
    
        /* liberar el conjunto de resultados */
        mysqli_free_result($resultado);
    }


    $precio_int=settype($precio,"integer");

    if($var-$precio_int<0):
        echo "Usuario no tiene saldo para completar la compra";
        echo "<br>";
        echo "Saldo actual: ".$var;
        echo "Faltante: ".$precio-$var;

    else:
        mysqli_query($link,"INSERT INTO transactions(user_id,precio) VALUES($id,$precio)") or die("<h2>Error de conexión<h2>");
        settype($precio,"integer");
        mysqli_query($link,"UPDATE users SET saldo=saldo-$precio WHERE user_id=$id");
    endif;    
?>