<?php 
$id=$_GET['id'];
include '../modelo/bd.php';
$conexion=conexion();
$query=eliminar($conexion,$id);
if($query){
 header('location:../index.php?eliminar=success');
}else{
    header('location:../index.php?eliminar=error');
}
?>