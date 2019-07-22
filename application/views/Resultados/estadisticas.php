<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Bread crumb and right sidebar toggle -->
    <!-- ============================================================== -->
    <div class="row page-titles">
        <div class="col-md-5 align-self-center">
            <h1 class="text-themecolor">Estadisticas</h1>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Resultados</a></li>
                <li class="breadcrumb-item active">Estadisticas</li>
            </ol>
        </div>
        <div class="">
            <button class="right-side-toggle waves-effect waves-light  btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Bread crumb and right sidebar toggle -->

    <!-- Info box -->
    <!-- ============================================================== -->
    <div class="card">
        <div class="col-12">
            <div class="row m-t-30">
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="box bg-info text-center">
                            <h1 class="font-light text-white"><?= $encuesta->Contador?></h1>
                            <h6 class="text-white">Encuestas respondidas</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="box bg-primary text-center">
                            <h1 class="font-light text-white">1,738</h1>
                            <h6 class="text-white">Preguntas Respondidas</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="box bg-success text-center">
                            <h1 class="font-light text-white">1100</h1>
                            <h6 class="text-white">Resolve</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-6 col-lg-3 col-xlg-3">
                    <div class="card">
                        <div class="box bg-dark text-center">
                            <h1 class="font-light text-white">964</h1>
                            <h6 class="text-white">Pending</h6>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
    </div>
    <div class="card-group">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3>86%</h3>
                        <h6 class="card-subtitle">Encuestas</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 85%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3>40%</h3>
                        <h6 class="card-subtitle"></h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 40%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3>56%</h3>
                        <h6 class="card-subtitle">Alcance</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-danger" role="progressbar" style="width: 56%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12">
                        <h3>26%</h3>
                        <h6 class="card-subtitle">Visitas esta semana</h6>
                    </div>
                    <div class="col-12">
                        <div class="progress">
                            <div class="progress-bar bg-inverse" role="progressbar" style="width: 26%; height: 6px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End Info box -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Over Visitor, Our income , slaes different and  sales prediction -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-lg-8 col-md-12">
            <div class="card income-o-year">
                <div class="card-body">
                    <div class="d-flex m-b-30 no-block">
                        <h5 class="card-title m-b-0 align-self-center">Income of the Year</h5>
                        <div class="ml-auto">
                            <ul class="list-inline font-12">
                                <li><i class="fa fa-circle text-info"></i> Growth</li>
                                <li><i class="fa fa-circle text-success"></i> Net</li>
                            </ul>
                        </div>
                    </div>
                    <div id="income-year" style="height:460px; width:100%;"></div>
                </div>
            </div>
        </div>
        <!-- Column -->
        <!-- Column -->
        <div class="col-lg-4 col-md-12">
            <div class="row">
                <!-- Column -->
                <div class="col-md-12">
                    <div class="card bg-primary band">
                        <div class="card-body">
                            <h4 class="card-title text-white"></h4>
                            <h6 class="card-subtitle text-white op-5">March 2018</h6>
                            <div class="d-flex no-block">
                                <div class="align-self-end no-shrink">
                                    <h2 class="m-b-0 text-white">68 TB</h2>
                                </div>
                                <div class="ml-auto">
                                    <div id="sales" style="width:150px; height:130px;"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
                <div class="col-md-12">
                    <div class="card bg-info">
                        <div class="card-body">
                            <h4 class="card-title text-white">Datos demograficos</h4>
                            <h6 class="card-subtitle text-white op-5">Genero</h6>
                            <div class="d-flex no-block">
                                <div class="align-self-end no-shrink">
                                    <h2 class="m-b-0 text-white">Hombre: 0</h2>
                                    <h2 class="m-b-0 text-white">Mujeres: 0</h2>
                                </div>
                                <div class="ml-auto">
                                    <div class="spark-count" style="height:120px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Column -->
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Sales Chart and browser state-->
    <!-- ============================================================== -->