<!-- Área de las empresas para su fácil acceso a sus encuestas enlinea -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<div class="row">
	<div class="container-fluid">
    <div class="col-xs-4 col-sm-4 col-md-5">
        <div style=" text-align:center; margin:auto; width:15rem; heigth:15rem;">
            <ul id="flexiselDemo" style="display: inline-flex">
                <img src="<?= base_url('assets/images/empresas1.png') ?>" class="img-responsive" />
                <img src="<?= base_url('assets/images/empresas1.png') ?>"  class="img-responsive"/>
                <img src="<?= base_url('assets/images/empresas1.png') ?>"  class="img-responsive"/>
                <img src="<?= base_url('assets/images/empresas1.png') ?>"  class="img-responsive"/>
            </ul>
        </div>
    </div>
</div>
</div>
</div>
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- Fin de área de las empresas -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<script>
    $(window).load(function() {


        $("#flexiselDemo").flexisel({
            visibleItems: 4,
            itemsToScroll: 3,
            animationSpeed: 200,
            infinite: true,
            navigationTargetSelector: null,
            autoPlay: {
                enable: false,
                interval: 5000,
                pauseOnHover: true
            },
            responsiveBreakpoints: {
                portrait: {
                    changePoint: 480,
                    visibleItems: 1,
                    itemsToScroll: 1
                },
                landscape: {
                    changePoint: 640,
                    visibleItems: 2,
                    itemsToScroll: 2
                },
                tablet: {
                    changePoint: 768,
                    visibleItems: 3,
                    itemsToScroll: 3
                }
            },
            loaded: function(object) {
                console.log('Slider loaded...');
            },
            before: function(object) {
                console.log('Before transition...');
            },
            after: function(object) {
                console.log('After transition...');
            },
            resize: function(object) {
                console.log('After resize...');
            }
        });
    });
</script>
