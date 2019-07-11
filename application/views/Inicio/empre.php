<!-- Área de las empresas para su fácil acceso a sus encuestas enlinea -->
<!-------------------------------------------------------------------------------------------------------------------------------------------->
<!-- <div class="container-fluid">
	<div class="col-xs-12 col-sm-6 col-md-8">
		<div style=" text-align:center; margin:5% auto; width:15rem; heigth:15rem;">
			<div class="card card-success" style="background-color:#2d4d49; border-color: #333;">
				<div class="card-header">
					<h4 class="m-b-0 text-white">Encuestas en linea</h4>
				</div>
				<div class="card-body">
					<div class="card-columns" style=" text-align:center; margin:1% auto; width:30rem; heigth:30rem;">

						<a href="">
							<img src=">" class="card-img-top img-fluid" width="5%" heigth="5%" /><br>
						</a>

					</div>
				</div>
			</div>
		</div>
	</div>
</div> -->
<ul id="flexiselDemo" style="display: inline-flex"> 
<li><img src="<?= base_url('assets/images/empresas1.png') ?>"/></li>
    <li><img src="<?= base_url('assets/images/empresas1.png') ?>" /></li>
    <li><img src="<?= base_url('assets/images/empresas1.png') ?>" /></li>
    <li><img src="<?= base_url('assets/images/empresas1.png') ?>" /></li>                                                         
</ul>
 
<div class="clearout"></div> 
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
                changePoint:480,
                visibleItems: 1,
                itemsToScroll: 1
            }, 
            landscape: { 
                changePoint:640,
                visibleItems: 2,
                itemsToScroll: 2
            },
            tablet: { 
                changePoint:768,
                visibleItems: 3,
                itemsToScroll: 3
            }
        },
        loaded: function(object) {
            console.log('Slider loaded...');
        },
        before: function(object){
            console.log('Before transition...');
        },
        after: function(object) {
            console.log('After transition...');
        },
        resize: function(object){
            console.log('After resize...');
        }
    });
});
</script>
