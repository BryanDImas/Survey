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
  <div style=" text-align:center; margin:5% auto; width:40rem; height:40rem;" class="container-responsive">
  <div class="col-md-6">
                        <div class="card card-dark" style="background-color:2d4d49; border-color: #333;">
                            <div class="card-header">
                                <h4 class="m-b-0 text-white">Encuestas en linea</h4></div>
                            <div class="card-body">
                              <div class="card-columns" style=" text-align:center; margin:1% auto; width:30rem; height:30rem;" >
                                <a href="">
                                <img src="<?= base_url('assets/images/empresas1.png') ?>" class="card-img-top" width="5%" heigth="5%" /><br>
                                </a>   
                              </div>    
                            </div>
                        </div>
                    </div>

   
    
      <div class="card">
        
      </div>
   
      <div class="card">
        <a href="">
          <img src="<?= base_url('assets/images/empresas2.png') ?>" class="card-img-top" width="10%" heigth="10%" /><br>
        </a>
      </div>
      <br><br>
      <div class="card">
        <a href="">
          <img src="<?= base_url('assets/images/empresas3.png') ?>" class="card-img-top" width="10%" heigth="10%" /><br>
        </a>
      </div>
      <br><br>
    </div>
  </div>
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Fin de área de las empresas -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->