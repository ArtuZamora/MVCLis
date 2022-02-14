<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lista De Usuarios</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <style>
        input {
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .right {
            float: right;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-default" role="navigation">
        <span class="navbar-brand mb-0 h1">
            Implementación MVC - LIS 03T
        </span>
    </nav>
    <form action="?controller=Usuario&action=Add" method="post" class="col-lg-5">
        <h3>Agregar usuario</h3>
        <hr />
        <div class="form-group col-lg-7">
            Nombre: <input type="text" name="usuario[nombre]" class="form-control" value="<?= isset($_POST['usuario']['nombre']) ? $_POST['usuario']['nombre'] : '' ?>" />
            <p class="text-danger"><?= isset($this->error_log['name_error']) ? $this->error_log['name_error'] : '' ?></p>
            Apellido: <input type="text" name="usuario[apellido]" class="form-control" value="<?= isset($_POST['usuario']['apellido']) ? $_POST['usuario']['apellido'] : '' ?>" />
            <p class="text-danger"><?= isset($this->error_log['lastName_error']) ? $this->error_log['lastName_error'] : '' ?></p>
            Email: <input type="text" name="usuario[email]" class="form-control" value="<?= isset($_POST['usuario']['email']) ? $_POST['usuario']['email'] : '' ?>" />
            <p class="text-danger"><?= isset($this->error_log['email_error']) ? $this->error_log['email_error'] : '' ?></p>
            Telefono: <input type="text" name="usuario[telefono]" class="form-control" value="<?= isset($_POST['usuario']['telefono']) ? $_POST['usuario']['telefono'] : '' ?>" />
            <p class="text-danger"><?= isset($this->error_log['telephone_error']) ? $this->error_log['telephone_error'] : '' ?></p>
            Edad: <input type="number" min="0" name="usuario[edad]" class="form-control" value="<?= isset($_POST['usuario']['edad']) ? $_POST['usuario']['edad'] : '' ?>" />
            <p class="text-danger"><?= isset($this->error_log['age_error']) ? $this->error_log['age_error'] : '' ?></p>
            Carnet: <input type="text" name="usuario[carnet]" class="form-control" value="<?= isset($_POST['usuario']['carnet']) ? $_POST['usuario']['carnet'] : '' ?>" />
            <p class="text-danger"><?= isset($this->error_log['license_error']) ? $this->error_log['license_error'] : '' ?></p>
            <input type="submit" name="add" value="Agregar" class="btn btn-success" />
        </div>
    </form>

    <div class="col-lg-7">
        <h3>Usuarios</h3>
        <hr />
    </div>
    <section class="col-lg-7 table-responsive" style="height:400px;overflow-y:scroll;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Edad</th>
                    <th>Carnet</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($datos as $user) { ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['nombre'] ?></td>
                        <td><?= $user['apellido'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td><?= $user['telefono'] ?></td>
                        <td><?= $user['edad'] ?></td>
                        <td><?= $user['carnet'] ?></td>
                        <td><button class="btn btn-danger deleteOpt" data-id="<?= $user['id'] ?>">Eliminar</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
    <script>
        var getUrl = window.location;
        $('.deleteOpt').on('click', function() {
            let redirect = getUrl.href + '?controller=Usuario&action=Delete&id=' + $(this).attr('data-id');
            console.log(redirect);
            window.location = redirect;
        });
    </script>

</body>

</html>