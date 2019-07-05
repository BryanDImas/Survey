<?php $numeracion = 0; $f = $this->session->formato;
foreach ($preguntas as $p) { $numeracion++;?>
    <tr>
        <td> <?= $numeracion ?></td>
        <td> <?= $p->Pregunta ?></td>
        <td><button class="btn btn-block btn-outline-danger i fas fa-trash-alt btnelim" value="<?= $p->idPregunta ?>"><br>Borrar</button></td>
        <td>
        <button class="btn btn-block btn-outline-success i fas fa-pencil-alt btneditar" value="<?= $p->idPregunta ?>"><br>Editar</button></td>
    </tr>
<?php  } ?>
<!-- ======================================================================================================================================== -->
<!-- Fin tabla de preguntas para las que son de tipo texto -->
<!-- ======================================================================================================================================== -->
