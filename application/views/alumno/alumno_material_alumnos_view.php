<br>
<div class="container-fluid" style="float:center; margin-left: 100px">
    <div class="container-fluid" style="width: 100%; height: 10%">
        <ul class="nav nav-pills">
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/noticias"><span class="glyphicon glyphicon-comment"></span>  Noticias</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/foro"><span class="glyphicon glyphicon-bullhorn"></span> Foro</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/notas"><span class="glyphicon glyphicon-th-list"></span> Notas</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/material_docente"><span class="glyphicon glyphicon-book"></span> Material Docente</a></li>
            <li class="active"><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/material_alumnos"><span class="glyphicon glyphicon-file"></span> Material Alumnos</a></li>
            <li><a href="<?php echo base_url('inicio/salir'); ?>"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
        </ul>
    </div>
    
    <div class="col-md-7">
        <table class="table">
            <thead>
            <th>Documentos</th><th></th>
            </thead>
            <tbody>
                <?php
                echo form_open('documento/download/' . $info['year'] . '/' . $info['semestre'] . '/' . $info['codigo_asignatura'] . '/' . $info['seccion'].'/material_alumnos');
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
                echo '<td><button type="submit" class="btn btn-primary">Descargar</button></td><td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#upload">
            Subir Archivo
        </button></td>';
                echo '</tr>';
                ?>
            </tbody>
        </table>
        <?php echo form_close() ?>
        
        <div class="modal fade" id="upload" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva Noticia</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open_multipart('documento/upload' .'/'. $info['year'] . '/' . $info['semestre'] . '/' . $info['codigo_asignatura'] . '/' . $info['seccion'], ['class' => 'form-horizontal', 'role' => 'form']); ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="titulo">Archivo:</label>
                            <div class="col-md-4">
                                <input type="file" size="40" id="archivo" name="archivo"/>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Subir</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
        
    </div>