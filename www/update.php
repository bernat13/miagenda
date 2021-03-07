<!DOCTYPE html>
<html lang="en">

<html lang="es">
<?php include("./include/head.php");?>
<body>
<?php include("./include/menu.php");?>
    <div class="container">
  
        <?php
            include("conexion.php");
            if(isset($_GET['id'])){ #Determina si una variable está definida y no es NULL / isset
                $id = $_GET['id'];

                $query = "SELECT * FROM datos WHERE id = $id";
                $result = mysqli_query($conn, $query);
                #Obtiene el número de filas de un conjunto de resultados / mysqli_num_rows
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result);
                    #Obtiene una fila de resultados como un array asociativo, numérico, o ambos
                    $id = $row['id'];
                    $name = $row['nombre'];
                    $address = $row['dirrecion'];
                    $phone = $row['telefono'];
                }
            }
            if(isset($_POST['update'])){
                $id = $_GET['id'];
                $name = $_POST['name'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];

                $update = "UPDATE datos set nombre = '$name', dirrecion ='$address', telefono = '$phone' WHERE id = $id";
                mysqli_query($conn, $update);
              echo "<p>Registro actualizado exitosamente!</p>";
            }
        ?>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-4 mx-auto">
                    <div class="card card-body">
                        <form name="form" action="update.php?id=<?php echo $_GET['id'];?>"
                            onsubmit="return validarform()" method="POST">
                            <div class="form-group">
                                ID <input type="text" name="id" value="<?php echo $id; ?>" class="form-control"
                                    placeholder="Actualiza ID" autocomplete="off" autofocus>
                            </div>
                            <div class="form-group">
                                Nombre<input type="text" name="name" value="<?php echo $name; ?>" class="form-control"
                                    placeholder="Actualiza Nombre" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                Direccion<input type="text" name="address" value="<?php echo $address; ?>"
                                    class="form-control" placeholder="Uptate ID" autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                Telefono<input type="text" name="phone" value="<?php echo $phone; ?>"
                                    class="form-control" placeholder="Uptate ID" autocomplete="off" required>
                            </div>
                            <button class="btn btn-success btn-block" name="update">
                                Actualizar
                            </button>
                        </form>
                    </div> <!--End card-->
                </div> <!--End col-md-4-->
            </div> <!--End row-->
        </div> <!--End container -4-->
    </div><!--div class container-->
    <?php include("./include/pie.php");?>
</body>

</html>