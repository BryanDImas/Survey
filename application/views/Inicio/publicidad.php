<<<<<<< HEAD
<div class="btn-github text-center" style="background:dark">
    <h4 style="color:white">Tenemos lo que buscas. De forma sencilla y ágil para tu negocio.</h4>
=======
<div class="bd-example">
<div class="btn-github text-center col-xs-1" style="background:dark; ">
    <h2 style="color:gold; font-size:2em">Tenemos lo que buscas. De forma sencilla y ágil para tu negocio.</h2>
</div>
>>>>>>> 273af1b87b8af9e31f875c47711086623b78aeaa
</div>

<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel" data-ride="carousel">
        <ol class="carousel-indicators">
            <?php for ($i = 0; $i < count($imgs); $i++) { ?>
                <li data-target="#carouselExampleCaptions" data-slide-to="<?= base_url($imgs[$i]->IdPub) ?>" class="<?= $i == 1 ? 'active' : '' ?>"></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner">
            <?php for ($i = 0; $i < count($imgs); $i++) { ?>
                <div class="<?= $i == 1 ? 'carousel-item active' : 'carousel-item' ?>">
                    <img src="<?= base_url($imgs[$i]->Imagen) ?>" class="d-block w-100 " alt="...">
                </div>
            <?php } ?>
            <br><br>

        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>
<!-- ================================================================================================================= -->
<!-- Fin del carousel -->
