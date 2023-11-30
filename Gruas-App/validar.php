<?php
$usuario=$_POST['usuario'];
$contraseña=$_POST['contraseña'];
session_start();

error_reporting(0);

$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","","gruas");

$consulta="SELECT*FROM usuarios where usuario='$usuario' and contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);

if($filas['id_cargo']==1){ //administrador
    header("location:admin.php");
}else

if($filas['id_cargo']==2){ //cliente
    header("location:cliente.php");
}else{
    ?>
    <?php include("index.html"); ?>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);