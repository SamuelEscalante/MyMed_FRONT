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
    if ($us == "") {
        header("Location: index.html");
    }
    ?>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">YOU MED</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle
navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="user-compras.php">Comprar Medicamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user-medic.php">Mis Compras</a>
                    </li>
                </ul>
                <span class="navbar-text">
                    Bienvenido, <?php echo $us; ?>
                </span>
            </div>
        </div>
    </nav>
    <div class="container mt-4">
        <h1>Bienvenido a YOU MED</h1>
        <p>Seleccione una opción en la barra de navegación para
            comenzar.</p>
        <img src="https://i0.wp.com/pymesenlaweb.com/wp-content/uploads/2019/12/consulta-gratis-scaled.jpg?resize=1024%2C443&ssl=1" style="width: 300px; height: 300px;">
    </div>
</body>
