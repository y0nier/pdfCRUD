 <!DOCTYPE html>
 <html lang= "en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
</head>
<body> 

    <div class="container">
    <form class="m-auto w-50 mt-2 mb-2" method="POST" enctype="multipart/form-data" action="controlador/insertar.php">
        <div class="mb-2">
        <label class="form-label">Nombre del archivo</label>
                <input class='form-control form-control-sm' type="text" name="nombreArchivo">
            </label>
        </div>
        <div class="mb-2">
                <label class="form-label">Selecciona un archivo</label>
                <input class='form-control form-control-sm' type="file" name="archivo">
                
            </div>
            <button class="btn btn-primary btn-sm">Subir archivo</button>
            </form>
        <table class="table table-sm table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Numero</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Archivo</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            
            <?php 
                /* incluir la clase que controla la base de datos y listar los registros de la bd a traves del while  */
                include 'modelo/bd.php';
                $conexion=conexion();
                $query=listar($conexion);
                $contador=0;
                while($datos=mysqli_fetch_assoc($query)){
                    $contador++;
                    $id=$datos['id'];
                    $nombre=$datos['nombre'];
                    $categoria=$datos['categoria'];
                    $fecha=$datos['fecha'];
                    $archivo=$datos['archivo'];
                    $tipo=$datos['tipo'];
                
                    $valor="";
                   
                    if($categoria=='pdf'){
                        $valor="<img  width='50' src='img/pdf.png'>";
                    }else{
                        echo '<script>alert("no es un archivo pdf");</script>';
                    }

                    
                ?>
                <tr>
                    <td><?php echo $contador;?></td>
                    <td><?php echo $nombre ;?></td>
                    <td><?php echo $categoria;?></td>
                    <td><a href="cargar.php?id=<?php echo $id; ?>"><?php echo $valor ;?> descargar</a></td>
                    <td><?php echo $fecha ;?></td>
                    <td><a class='btn btn-secondary' href="editar.php?id=<?php echo $id?>">Editar</a> <a class='btn btn-danger' href="controlador/eliminar.php?id=<?php echo $id?>">Eliminar</a></td>
                </tr>
                <?php 
                } 
                ?>
            </tbody>
        </table>


    </div>
            </tbody>
        </table>
    </div>


<script src="bootstrap/bootstrap.bundle.min.js"></script>
</body>

</html>