<?php

$servername = "localhost"; 
$username = "root";  
$password = "";      
$database = "myshop";

$connection = new mysqli($servername, $username, $password, $database);


$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";


if($_SERVER['REQUEST_METHOD']=='POST'){
    $name = $_POST["name"];   #Verificar datos
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "Todos los campos son necesarios";
            break;
        }

        $sql = "INSERT INTO clients (name, email, phone, address)".  #Ingresa los datos ingresados a la tabla
                "VALUES('$name', '$email', '$phone', '$address')";
        $result = $connection->query($sql);
        if(!$result){
            $errorMessage = "Query invalida: " . $connection->error;  #Mensaje de error
            break;
        }
        //agregar a nuevos usuarios a la base de datos
        $name = "";
        $email = "";
        $phone = "";
        $address = "";

        $successMessage = "Cliente agregado correctamente";
        header("location: /PHP/index.php");
        exit;
    } while (false);
}




?>
<?php

$servername = "localhost"; 
$username = "root";  
$password = "";      
$database = "myshop";

$connection = new mysqli($servername, $username, $password, $database);


$id = "";
$name = "";
$email = "";
$phone = "";
$address = "";

$errorMessage = "";
$successMessage = "";

if($_SERVER['REQUEST_METHOD']=='GET'){
    //Metodo GET:Muestra la informacion de el cliente
    if (!isset($_GET["id"])) {
        header("location: /PHP/index.php");
        exit;
    }
    $id = $_GET["id"];
    //Lee la columna del cliente seleccionado de la base de datos
    $sql = "SELECT * FROM clients WHERE id=$id";
    $result = $connection->query($sql);  #realiza la consulta
    $row = $result->fetch_assoc();       #Lee los datos

    if(!$row){
        header("location: /PHP/index.php");
        exit;
    }
    $name = $row["name"];
    $email = $row["email"];
    $phone = $row["phone"];
    $address = $row["address"];
}else{
    //Metodo POST: Actualiza la informacion de el cliente
    $id = $_POST["id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];

    do {
        if (empty($id) || empty($name) || empty($email) || empty($phone) || empty($address)) {
            $errorMessage = "Todos los campos son requeridos";
            break;
        }
        $sql = "UPDATE clients" .
            "SET name='$name',email='$email', phone='$phone', address='$address'";
        "WHERE id=$id";

        $result = $connection->query($sql);
        if (!$result) {
            $errorMessage = "Query Invalida" . $connection->error;
            break;
        }
        $successMessage = "Cliente actualizado correctamente";
        header("location: /PHP/index.php");
        exit;
    } while (false);
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>My Shop</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container my-5">
        <h2>Nuevo Cliente</h2>

        <?php
        if(!empty($errorMessage)){
            echo "
            <div class='alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
            ";
        }
        ?>

        <form method="POST">
            <input type="hidden" value="<?php echo $id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" value="<?php echo $name; ?>">  
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">  
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">N° Telefono</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">  
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Direccion</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" value="<?php echo $address; ?>">  
                </div>
            </div>

            <?php 
            if(!empty($successMessage)){
                echo "
                <div class='offset-sm-3 col-sm-6'>
                    <div class='alert alert-success alert-dismissible fade show' roles='alert'>
                        <strong>$successMessage</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    
                    </div>
                
                </div>";
            }
            ?>

            <div class="row mb-3">
                <div class="offset-sm3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Aceptar</button>
                </div>
            </div>
            <div class="row mb-3 d-grid">
                <a class="btn btn-outline-primary" href="/PHP/index.php" role="button">Cancelar</a>
            </div>
        </form>
    </div>
</body>
</html>