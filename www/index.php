<!DOCTYPE html>
<html lang="es">
<?php include("./include/head.php");?>
<body>
<?php include("./include/menu.php");?>
    <div class="container">
        <div class="container p-4">
            <?php include("conexion.php");?>
            <div class="row">
                <aside class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form method="post" name="form" onsubmit="return validarform()" action="create.php">
                            <div class="form-group">
                                <input type="text" name="id" class="form-control" placeholder="Ingresa ID"
                                    autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Ingresa nombre"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="address" class="form-control" placeholder="Ingresa direccion"
                                    autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Ingresa telefono"
                                    autocomplete="off" required>
                            </div>
                            <input type="submit" class="btn btn-success btn-block" name="send" value="Agregar">
                            <input type="reset" class="btn btn-secondary btn-block" value="Limpiar">
                        </form>
                    </div>
                </aside> <!--End col-md-4-->
                <article class="col-md-8 mx-auto">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Dirección</th>
                                <th>Telefono</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                        $query = "SELECT * FROM datos";
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_array($result)){ 
                                        #Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                            ?>
                            <tr>
                                <td><?php echo $row['id'] ?></td>
                                <td><?php echo $row['nombre'] ?></td>
                                <td><?php echo $row['dirrecion'] ?></td>
                                <td><?php echo $row['telefono'] ?></td>
                                <td>
                                    <a href="update.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </article> <!--End col-md-8-->
            </div> <!--End row-->
        </div><!--End container p-4-->
    </div><!--End container-->
    <?php include("./include/pie.php");?>
  
</body>

</html>