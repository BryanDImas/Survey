<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Área de publicidad -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- carousel -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<meta name="viewport" content="width=device-width, initial-scale=1">
  <ol class="carousel-indicators">
    <?php for ($i = 0; $i < count($imgs); $i++) { ?>
      <!-- Recorro los indicadores según la cantidad de imagenes se agregen -->
      <li data-target="#carouselExampleIndicators" data-slide-to="<?= base_url($imgs[$i]->IdPub) ?>" class="<?= $i == 1 ? 'active' : '' ?>"></li>
    <?php } ?>
  </ol>
  <div class="carousel-inner">
    <?php for ($i = 0; $i < count($imgs); $i++) { ?>
      <!-- Recorrido de las imagenes -->
      <div class="<?= $i == 1 ? 'carousel-item active' : 'carousel-item' ?>">
        <img class="d-block w-100" src="<?= base_url($imgs[$i]->Imagen) ?>" style="width: 100px; height: 300px;" alt="First slide">
      </div>
    <?php } ?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Fin del área de publicidad -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Área de las empresas para su fácil acceso a sus encuestas enlinea -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<div class="col-xs-12 col-sm-6 col-md-8">
  <div style=" text-align:center; margin:5% auto; width:40rem; heigth:40rem;" class="container-responsive">
    <h1 class="card-title">Encuestas en linea</h1>
    <div style=" text-align:center; margin:1% auto; width:30rem; heigth:30rem;" class="card-columns">
      <div class="card">
        <a href="">
          <img src="<?= base_url('assets/images/empresas1.png') ?>" class="card-img-top" width="30%" heigth="30%" /><br>
        </a>
      </div>
      <br><br>
      <div class="card">
        <a href="">
          <img src="<?= base_url('assets/images/empresas2.png') ?>" class="card-img-top" width="30%" heigth="30%" /><br>
        </a>
      </div>
      <br><br>
      <div class="card">
        <a href="">
          <img src="<?= base_url('assets/images/empresas3.png') ?>" class="card-img-top" width="30%" heigth="30%" /><br>
        </a>
      </div>
      <br><br>
    </div>
  </div>
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Fin de área de las empresas -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->