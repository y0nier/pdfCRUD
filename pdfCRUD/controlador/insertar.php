<?php 
#capturar los datos
$nombre=$_POST['nombreArchivo'];
$archivo=$_FILES['archivo'];

if(empty($nombreArchivo)) {
    // mostrar mensaje de error o redirigir al usuario a otra página
    #echo '<script>alert("el campo esta vacio")</script>';
    header('location:../index.php?error=invalid_file_type');    
}else{
    exit();
}
    $tipoArchivo = mime_content_type($archivo['tmp_name']);


#verificar si el archivo es un PDF
if($tipoArchivo != 'application/pdf'){
    header('location:../index.php?error=no_es_un_pdf');
    exit();
}


#categoria y tipo
$categoria=explode('.',$archivo['name'])[1];
$fecha=date('Y-m-d H:i:s');
$tmp_name=$archivo['tmp_name'];
$contenido_archivo=file_get_contents($tmp_name);
$archivoBLOB=addslashes($contenido_archivo);

include '../modelo/bd.php';
$conexion=conexion();
$query=insertar($conexion,$nombre,$categoria,$fecha,$tipoArchivo,$archivoBLOB);
if($query){
    header('location:../index.php?insertar=success');
}else{
    header('location:../index.php?insertar=error');
}

?>