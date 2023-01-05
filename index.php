<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container my-5">
        <h2>Lista de clientes</h2>
        <a class="btn btn-primary" href="/php/create.php" role="botton">Nuevo Cliente</a>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Direccion</th>
                    <th>Donde fue creado</th>
                    <th>Editar/Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                use LDAP\Result;
                $servername = "localhost";  #nombre del servidor en el cual vamos a conectar y visualizar php
                $username = "root";  #usuario
                $password = "";      #contraseña
                $database = "myshop";  #nombre del servidor

                //Crear conexion
                $connection = new mysqli($servername, $username, $password, $database);  #conectar y colocar donde estan las credenciales
                
                //Probar conexion
                if($connection->connect_error){
                    die("Conexion Fallida: ".$connection->connect_error);   #Si se presenta algun error en la conexion mostrara un Mensaje
                }

                //Lee todas las columnas de la tabla de base de datos
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);  #Muestra si se ejecuto correctamente o no
                
                if(!$result){
                    die("Query invalida: ".$connection->error);  #al producirse un error en al query mencionara un mensaje de error
                }
                
                //Leera informacion de cada columna
                while($row=$result->fetch_assoc()){   #Obtiene la informacion de la columna, y como esta en un While se repite el proceso en toda la tabla
                    
                    //el echo es para que muestre y se pueda visualizar toda la info de las tablas
                    echo "
                    <tr>
                        <th>$row[id]</th>             
                        <th>$row[name]</th>
                        <th>$row[email]</th>
                        <th>$row[phone]</th>
                        <th>$row[address]</th>
                        <th>$row[create_at]</th>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/PHP/edit.php?id=$row[id]'>Editar</a>  
                            <a class='btn btn-danger btn-sm' href='/PHP/delete.php?id=$row[id]'>Eliminar</a>
                        </td>
                    </tr>
                    ";  #para colocar la URL de otro index se debe colocar la direccion con '/nombre_carpeta/archivo.php?id=$row[identificador]'
                }

                ?>

                
            </tbody> 
                
        </table>
    </div>
</body>
</html>