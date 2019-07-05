<style>
  .contenedor:hover .img {
    -webkit-transform: scale(1.0);
    transform: scale(3.0);
  }

  .contenedor {
    overflow: hidden;
  }
</style>
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
  <!-- ============================================================== -->
  <!-- Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <p></p>
  <div class="row page-titles">
    <div class="col-md-5 align-self-center">
      <h1 class="text-themecolor">Inicio</h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)">Administrar</a></li>
        <li class="breadcrumb-item active">Página Inicial</li>
      </ol>
    </div>
    <div class="col-md-7 align-self-center text-right d-none d-md-block">
      <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-rounded btn-outline-info"><i class="fas fa-paint-brush"> Crear Contenido</i></button>
    </div>
    <div class="">
      <button class="right-side-toggle waves-effect waves-light  btn-themecolor btn btn-circle btn-sm pull-right m-l-10"><i class="ti-settings text-white"></i></button>
    </div>
  </div>
  <!-- ============================================================== -->
  <!-- End Bread crumb and right sidebar toggle -->
  <!-- ============================================================== -->
  <!-- ============================================================== -->
  <!-- Start Page Content -->
  <!-- ============================================================== -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <table class=" table table-hover table-bordered table-sm" align="center">
            <thead class="text-center">
              <tr>
                <th>Id</th>
                <th>Imagen publicitaria</th>
                <th>Ruta</th>
                <th>Publicada por:</th>
                <th colspan="2">Opciones</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($img as $i) { ?>
                <tr>
                  <td><?= $i->IdPub ?></td>
                  <td>
                    <div class="contenedor">
                      <center class="img"><img src="<?= base_url() ?><?= $i->Imagen ?>" width="80px" height="50px"></center>
                    </div>
                  </td>
                  <td><?= $i->Imagen ?></td>
                  <td><?= $i->Usuario ?></td>
                  <td><button type="button" data-toggle="modal" data-target="#myModal<?= $i->IdPub ?>" class="btn btn-block btn-outline-new fa fa-edit" title="Editar"></button></td>
                  <td><a href="<?= base_url() ?>inicioC/eliminar/<?= $i->IdPub ?>" class="btn btn-block btn-outline-danger fa fa-trash-alt" title="Eliminar"></a></td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- ========================================================================================================================== -->
  <!-- End PAge Content -->
  <!-- ========================================================================================================================== -->
  <!-- ========================================================================================================================== -->
  <!-- The Modal -->
  <!-- ========================================================================================================================== -->
  <?php foreach ($img as $i) { ?>
    <div class="modal" id="myModal<?= $i->IdPub ?>">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Cambia tu imagen publicitaria</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body">
            <div class="input-group mb-3">
              <form action="<?= base_url() ?>inicioC/Editar" method="post" enctype="multipart/form-data">
                <div class="custom-file">

                  <input name="publicidad" type="file" class="custom-file-input" required>
                  <label class="custom-file-label form-control">Seleccionar Archivo</label>
                  <input type="hidden" name="id" value="<?= $i->IdPub ?>">
                  <input type="hidden" name="ruta" value="<?= $i->Imagen ?>">
                </div>
            </div>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer">
            <input type="submit" class="btn btn-rounded btn-outline-success" value="Crear">
          </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
  <!-- ========================================================================================================================== -->
  <!-- Fin del primer modal -->
  <!-- ========================================================================================================================== -->
  <!-- ========================================================================================================================== -->
  <!-- Inicio segundo modal -->
  <!-- ========================================================================================================================== -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Ingresa tu imagen publicitaria</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <div class="input-group mb-3">
            <form action="<?= base_url() ?>inicioC/Guardar" method="post" enctype="multipart/form-data">
              <div class="custom-file">
                <input name="publicidad" type="file" class="custom-file-input" required>
                <label class="custom-file-label form-control">Seleccionar Archivo</label>
              </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <input type="submit" class="btn btn-rounded btn-outline-success" value="Crear">
        </div>
        </form>
      </div>
    </div>
  </div>

  <!-- ========================================================================================================================== -->
  <!-- Fin segundo modal -->
  <!-- ========================================================================================================================== -->