<?php
//   funcion para iniciar login o actualizar buffer
 ob_start();
?>

<?php
// // utilizar el archivo conexion.php
// include_once 'admin/conexion.php';

// // sincronizar la base de datos con una funcion

// $conn = mysqli_connect($host,$user,$pw,$db);

// // control para confirmar el cliente
// if(isset($_SESSION['idcliente'])==false){
//     header(location:'index.php');
// }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante Tapitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;700;900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/logorestaurantetapitas.ico" type="image/x-icon">   
    
    
</head>
<body>
    <!-- menú -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark menu">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html"><img src="images/logorestaurantetapitas.png" alt="logo Restaurante tapitas" class="logo"></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto me-2">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="consultaproductos.php">Nuestro Menú</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#servicios">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contacto">Contacto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-danger" href="https://wa.me/3105188168?text=Solicita%20tu%20pedido!!" tabindex="-1" target="_blank">¡Haz tu pedido!</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- slider -->
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/pexels-dana-tentis-262959.jpg" class="d-block w-100 alto" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>First slide label</h5>
              <p>Some representative placeholder content for the first slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/pexels-cottonbro-studio-6554697.jpg" class="d-block w-100 alto" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Second slide label</h5>
              <p>Some representative placeholder content for the second slide.</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/pexels-chan-walrus-941861.jpg" class="d-block w-100 alto" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Third slide label</h5>
              <p>Some representative placeholder content for the third slide.</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
     
      <!-- la carta -->
      <div class="row row-cols-1 row-cols-md-3 g-4 p-5" id="carta">
        <h2 class="titulo">La carta</h2>
        <div class="col">          
        <?php
                include_once "admin/conexion.php";
                // crear la conexion a la bd
                $conn = mysqli_connect($host,$user,$pw,$db);
                //crear una consulta a la base de datos
                $sql = "SELECT * FROM productos;";
                //preparar el array de resultados
                $result =mysqli_query($conn,$sql);
                //estructura de loop para imprimir n datos while
                while ($row = mysqli_fetch_assoc($result)){

                ?>
            <div class="card">
              <?php echo "<img src='images/".$row['imagen']."' width='100%' height='250'>";""?>
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['nombre']?></h5>
                <p class="card-text"><?php echo $row['descripcion']?>
                </p>
                <p class="card-text"><span>$<?php echo $row['precio']?>
                </p></span>
                <a href="https://wa.me/3105188168?text=Solicita%20tu%20pedido!!" class="btn btn-primary" target="_blank">Pedir</a>
              </div>
            </div>
          </div>
          <?php
                }
         ?>

          
      </div>

      <!-- servicios -->
      <div class="row row-cols-1 row-cols-md-2 g-4 p-5" id="servicios">
        <h2 class="tituloSer">Servicios</h2>
        <div class="col">
          <div class="card">
            <img src="images/recetas.jpg" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Recetas</h5>
              <p class="card-text">Ensalada con pollo y verduras en salsa de soya.</p>
              <a href="https://wa.me/3105188168?text=Solicita%20tu%20pedido!!" class="btn btn-primary" target="_blank">Solicitar</a>
            </div>
          </div>
        </div>

          <div class="col">
            <div class="card">
              <img src="images/domicilios.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title">Domicilio</h5>
                <p class="card-text">Domicilios en horarios de 8:00 am a 10:00pm.</p>
                <a href="https://wa.me/3105188168?text=Solicita%20tu%20pedido!!" class="btn btn-primary" target="_blank">Solicitar</a>
              </div>
            </div>
          </div>                            
      </div>

      <!-- contacto -->
      <section  id="contacto">
        <h2 class="tituloC">Contacto</h2>
          <form action="mailto:aprendesoftware@poliandino.edu.co" method="post">
            <div>
              <input type="text" placeholder="Escribir nombre" required name="nombre">
            </div>

            <div>
              <input type="text" placeholder="Escribir apellido" required name="apellido">
            </div>

            <div>
              <input type="email" placeholder="Escribir email" required name="email">
            </div>

            <div>
              <textarea name="mensaje" id="" cols="30" rows="10" placeholder="Mensaje"></textarea>
            </div>

            <div>
              <button type="submit" class="btn btn-warning">Enviar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>

          </form>
          
          <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSe8s_36Oc1Ap8BMDQIsby3GECmPQMthR7ni1rh-uP6E-40OOA/viewform?embedded=true" width="640" height="550" frameborder="0" marginheight="0" marginwidth="0">Cargando…</iframe>
      </section>

     


      <!-- footer -->
      <footer class="cover">
        &copy;2023. Todos los derechos reservados Restaurante Tapitas. Creado por:<a href="#" target="_blank">Jorge Grajales</a>
      </footer>



    


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
</body>
</html>
<?php
ob_end_flush();
?>