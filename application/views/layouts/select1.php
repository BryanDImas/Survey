<!-- ====================================================================================== -->
<!-- Selección del departamento según el id que venga. -->
<!-- ====================================================================================== -->
<option value="">--Seleccionar departamento--</option>
<?php foreach ($departamentos as $departamento) { ?>
    <option value="<?= $departamento->IdDepartamento?>"><?= $departamento->Departamento?></option>
<?php } ?>
<!-- ====================================================================================== -->
<!-- Fin de la selección -->
<!-- ====================================================================================== -->

