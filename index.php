<?php
include_once 'crud.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Ejemplo CRUD</title>
    <!-- Se enlace a style.css-->
    <link rel="stylesheet" type="text/css" href="css/estyle.css">
</head>
<body>
<center>
    <br>
    <br>
    <div id="form"> 
        <form method="post">
            <table width="100%" border="1" cellpadding="15">
                <tr>
                    <td>
                        <input type="text" name="fn" placeholder="Nombre" value="<?php if(isset($_GET['edit'])){ echo $getRow['fn'];}?>">           
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="text" name="ln" placeholder="Apellido" value="<?php if(isset($_GET['edit'])){ echo $getRow['ln'];}?>">              
                    </td>
                </tr>
                <tr>
                    <td>
                       <?php
                            if(isset($_GET['edit'])){
                                ?><!-- Se fraccionó el codigo-->
                                <button type="submit" name="update">Editar</button>
                                <?php
                            }else{
                                ?>
                                <button type="submit" name="save">Registrar</button>
                                <?php
                            }
                       ?>
                    </td>
                </tr>
            </table>
        </form>
        <br><br>
        <table width="100%" border="1" cellpadding="15" align="center">
            <?php
            $res=$MySQLiconn->query("SELECT * FROM data");
            while($row=$res->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['fn']; ?></td>
                    <td><?php echo $row['ln']; ?></td>
                    <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar edicion')">Editar</a></td>
                    <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('Confirmar eliminacion')">Eliminar</a></td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</center>    
</body>
</html>