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
        <div class="row justify-content-center">
            <div class="col-md-8">
                <img src="https://i0.wp.com/pymesenlaweb.com/wp-content/uploads/2019/12/consulta-gratis-scaled.jpg?resize=1024%2C443&ssl=1" class="img-fluid" alt="Consulta Gratis">
            </div>
        </div>
        <h1>Bienvenido a YOU MED</h1>
        <p>Seleccione una opción en la barra de navegación para comenzar.</p>
    </div>
</body>

