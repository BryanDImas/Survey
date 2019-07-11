<div class="bd-example">
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
        <?php for ($i = 0; $i < count($imgs); $i++) { ?>
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="<?= $i ?>" class="<?= $i == 1 ? 'active' : '' ?>"></li>
            <?php } ?>
        </ol>
        <div class="carousel-inner">
            <?php for ($i = 0; $i < count($imgs); $i++) { ?>
                <div class="<?= $i == 1 ? 'carousel-item active' : 'carousel-item' ?>">
                    <img src="<?= base_url($imgs[$i]->Imagen) ?>" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Tenemos lo que buscas</h5>
                        <p>De forma sencilla y ágil para tu negocio.</p>
                    </div>
                </div>
            <?php } ?>
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
<script>
    $('.carousel').carousel({
  interval: 50
})
</script>