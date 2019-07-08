<!-- ======================================================================================================================================== -->
<!-- Tabla de preguntas para las que son de tipo texto -->
<!-- ======================================================================================================================================== -->
<?php $numeracion = 0; $f = $this->session->formato;
foreach ($preguntas as $p) { $numeracion++;?>
    <tr>
        <td> <?= $numeracion ?></td>
        <td> <?= $p->Pregunta ?></td>
        <?php if($p->PorDefecto != 1){ ?>
        <td><button class="btn btn-block btn-outline-danger i fas fa-trash-alt btnelim" value="<?= $p->idPregunta ?>"><br>Borrar</button></td>
        <td>
        <button class="btn btn-block btn-outline-success i fas fa-pencil-alt btneditar" value="<?= $p->idPregunta ?>"><br>Editar</button></td>
        <td style="width:2rem; height:2rem;">
            <a href="<?= base_url('RespuestasC/')?>?id=<?= $p->idPregunta ?>&f=<?= $f?>" class=" btn btn-block btn-outline-info i fas fa-plus"><br> Respuesta </a>
        </td>
        <?php }?>
    </tr>
<?php  } ?>
<!-- ======================================================================================================================================== -->
<!-- Fin tabla de preguntas para las que son de tipo texto -->
<!-- ======================================================================================================================================== -->
