<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container my-5">
        <h2>List of Clients</h2>
            <a class="btn btn-primary" href="/PHP/create.php" role="button">New Client</a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>10</td>
                        <td>Felipe vargas</td>
                        <td>felipe@wom.cl</td>
                        <td>+56938181</td>
                        <td>Santiago,USa</td>
                        <td>18/05/1987</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="/PHP/edit.php">Edit</a>
                            <a class="btn btn-danger btn-sm" href="/PHP/delete.php">Delete</a>
                        </td>
                    </tr>
                </tbody>
            </table>
    </div>
</body>
</html>