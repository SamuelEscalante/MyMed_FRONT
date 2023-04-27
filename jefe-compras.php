<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <title>Compras</title>
</head>

<body>
    <?php
    session_start();
    $us = $_SESSION["usuario"];
    if ($us == "") {
        header("Location: index.html");
    }
    ?>
    <?php include("navbar.php") ?>
    <div class="container">
        <div class="row">
            <table class="table table-striped table-hover">
    <thead>
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Nombre Cliente</th>
        <th scope="col">Total Cuenta</th>
        <th scope="col">Fecha de Compra</th>
        </tr>
    </thead>
    <tbody>
    <?php
        $servurl="http://192.168.100.2:3003/compras";
        $curl=curl_init($servurl);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response=curl_exec($curl);
       
        if ($response===false){
            curl_close($curl);
            die("Error en la conexion");
        }

        curl_close($curl);
        $resp=json_decode($response);
        $long=count($resp);
        for ($i=0; $i<$long; $i++){
            $dec=$resp[$i];
            $id=$dec ->id;
            $nombreCliente=$dec->nombreCliente;
            $totalCuenta=$dec->totalCuenta;
            $FechaCompra=$dec->FechaCompra;
     ?>
    
        <tr>
        <td><?php echo $id; ?></td>
        <td><?php echo $nombreCliente; ?></td>
        <td><?php echo $totalCuenta; ?></td>
        <td><?php echo $FechaCompra; ?></td>
        </tr>
     <?php 
        }
     ?>   
    </tbody>
    </table>
        </div>
    </div>

</body>
