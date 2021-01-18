<?php
    $link = mysqli_connect("localhost","root","","prueba_koupa") or die("<h2>No se encuentra el servidor<h2>");
    
    $id = $_POST["user_id"];
    $amount =$_POST["amount"];
    
    mysqli_query($link,"INSERT INTO recargas(user_id,amount) VALUES($id,$amount)") or die("<h2>Error de conexión 1<h2>");
    settype($amount,"integer");
    mysqli_query($link,"UPDATE users SET saldo=saldo+$amount WHERE user_id=$id") or die("<h2>Error de conexión 2<h2>");
?>