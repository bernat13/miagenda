<?php
    include ("conexion.php");
    if (isset($_GET['id'])){    
        $id = $_GET['id'];
        
        $delete = "DELETE FROM datos WHERE id = $id";

        if (mysqli_query($conn, $delete)){
            header('Location:index.php'); # Redireccionar el archivo
        }else{
            echo "Error al borrar registro: " . mysqli_error($conn);
        }
    }
?>
