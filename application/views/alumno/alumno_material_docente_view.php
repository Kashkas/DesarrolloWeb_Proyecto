<br>
<div class="container-fluid" style="float:center; margin-left: 100px">
    <div class="container-fluid" style="width: 100%; height: 10%">
        <ul class="nav nav-pills">
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/noticias"><span class="glyphicon glyphicon-comment"></span>  Noticias</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/foro"><span class="glyphicon glyphicon-bullhorn"></span> Foro</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/notas"><span class="glyphicon glyphicon-th-list"></span> Notas</a></li>
            <li class="active"><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/material_docente"><span class="glyphicon glyphicon-book"></span> Material Docente</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/material_alumnos"><span class="glyphicon glyphicon-file"></span> Material Alumnos</a></li>
            <li><a href="<?php echo base_url('inicio/salir'); ?>"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
        </ul>
    </div>

    <div class="col-md-7">
        <table class="table">
            <thead>
            <th>Documentos</th>
            <th></th>
            </thead>
            <tbody>
                <?php
                echo form_open('documento/download/' . $info['year'] . '/' . $info['semestre'] . '/' . $info['codigo_asignatura'] . '/' . $info['seccion'].'/material_docente');
                if (is_array($results)) {
                    foreach ($results as $data) {
                        ?>
                        <tr>
                            <td class="col-md-1">
                                <?php echo form_checkbox('files[]', $data['nombre_documento']); ?>
                            </td>
                            <td class="col-md-7">
                                <?php echo $data['nombre_documento']; ?>
                            </td>
                        </tr>
                        <?php
                    }
                }
                echo '<tr>';
                echo '<td><button type="submit" class="btn btn-primary">Descargar</button></td><td></td>';
                echo '</tr>';
                ?>
            </tbody>
        </table>
        <?php echo form_close() ?>
    </div>