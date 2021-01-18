<?php
    $link = mysqli_connect("localhost","root","","prueba_koupa") or die("<h2>No se encuentra el servido<h2>");
    # $db = mysqli_select_db($link,"prueba_koupa") or die("<h2>Error de conexión<h2>");

    $nombre = $_POST["nombreUsuario"];
    $apellido =$_POST["apellidoUsuario"];

    mysqli_query($link,"INSERT INTO users(nombre,apellido) VALUES('$nombre','$apellido')") or die("<h2>Error de conexión<h2>");
?>