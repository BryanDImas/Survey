<?php $numeracion = 0;
foreach ($respuestas as $Res) { $numeracion++; ?>
    <tr>
        <td>  <?= $numeracion ?></td>
        <td> <?= $Res->Respuestas ?></td>
        <td><button class="btn btn-block btn-outline-danger i fas fa-trash-alt btnelim" value="<?= $Res->IdRespuestas ?>"><br>Borrar</button></td>
        <td>
        <button class="btn btn-block btn-outline-success i fas fa-pencil-alt btneditar" value="<?= $Res->IdRespuestas ?>"><br>Editar</button></td>
    </tr>
<?php  } ?>
