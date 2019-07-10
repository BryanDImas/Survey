<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Área de publicidad -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- carousel -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<div style=" text-align:center; margin:5% auto; width:40rem; heigth:40rem;">
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