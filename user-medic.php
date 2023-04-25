<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    $us = $_SESSION["usuario"];
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="usuario.php">YOU MED</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle
navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="user-compras.php">Comprar Medicamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-medic.php">Mis Compras</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    <?php echo "<a class='nav-link' href='logout.php'>Logout $us</a>"; ?>
                </span>
            </div>
        </div>
    </nav>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">Usuario</th>
                <th scope="col">ID Medicamento</th>
                <th scope="col">Medicamento</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Precio Total</th>
                <th scope="col">Total de Compra</th>
                <th scope="col">Fecha de Compra</th>

            </tr>
        </thead>
        <tbody>
            <?php
            $servurl = "http://192.168.100.2:3003/compras/$us";
            $curl = curl_init($servurl);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($curl);
            if ($response === false) {
                curl_close($curl);
                die("Error en la conexion");
            }
            curl_close($curl);
            $resp = json_decode($response);
            echo "<script>console.log('$servurl');</script>";
            print_r($resp);

            if (is_object($resp)) {
                $long = count($resp);   
                echo $long;             
                for ($i = 0; $i < $long; $i++) {
                    $dec = $resp[$i];
                    $id = $dec->id;
                    $usuario = $dec->usuario;
                    $medicamento_nombre = $dec->medicamentoNombre;
                    $cantidad = $dec->cantidad;
                    $precio_total = $dec->precioTotal;
                    $medicamento_id = $dec->medicamentoId;
                    $compra_id = $dec->comprasId;
                    $totalCuenta = $dec->totalCuenta;
                    $fechaCompra = $dec->FechaCompra;

                ?>
                    <tr>
                        <td><?php echo $usuario; ?></td>
                        <td><?php echo $medicamento_id; ?></td>
                        <td><?php echo $medicamento_nombre; ?></td>
                        <td>#<?php echo $cantidad; ?></td>
                        <td>$<?php echo $precio_total; ?></td>
                        <td>$<?php echo $totalCuenta; ?></td>
                        <td><?php echo $fechaCompra; ?></td>
                    </tr>
                <?php
            }}
            ?>
        </tbody>
    </table>
</body>
