<br>
<div class="container-fluid" style="float:center; margin-left: 100px">
    <div class="container-fluid" style="width: 100%; height: 10%">
        <ul class="nav nav-pills">
            <li class="active"><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/noticias"><span class="glyphicon glyphicon-comment"></span>  Noticias</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/foro"><span class="glyphicon glyphicon-bullhorn"></span> Foro</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/notas"><span class="glyphicon glyphicon-th-list"></span> Notas</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/material_docente"><span class="glyphicon glyphicon-book"></span> Material Docente</a></li>
            <li><a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $info['year']; ?>/<?php echo $info['semestre']; ?>/<?php echo $info['codigo_asignatura']; ?>/<?php echo $info['seccion']; ?>/material_alumnos"><span class="glyphicon glyphicon-file"></span> Material Alumnos</a></li>
            <li><a href="<?php echo base_url('inicio/salir'); ?>"><span class="glyphicon glyphicon-off"></span> Salir</a></li>
        </ul>
    </div>

    <div class="col-md-10 col-sm-9">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#nueva_noticia">
            Nueva Noticia
        </button>

        <?php if(is_array($results)){
            foreach ($results as $data) {
                echo '<h3>';
                echo $data->titulo;
                echo '</h3>';
                ?>
            
            <div class="row">
                <div class="col-xs-9">
                    <p><?php echo $data->texto ?></p>
                </div>
                <div class="col-xs-3"></div>
            </div>
        <br><br><?php } }?>
        <p><?php echo $links; ?></p>
        <ul class="pager">  
            <li class="previous">  
                <a href="#">Older</a>  
            </li>  
            <li class="next">  
                <a href="#">Newer</a>  
            </li>  
        </ul> 

        <div class="modal fade" id="nueva_noticia" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva Noticia</h4>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('curso/agregar_noticia' .'/'. $info['year'] . '/' . $info['semestre'] . '/' . $info['codigo_asignatura'] . '/' . $info['seccion'], ['class' => 'form-horizontal', 'role' => 'form']); ?>
                        <div class="form-group">
                            <label class="col-md-2 control-label" for="titulo">Titulo:</label>
                            <div class="col-md-4">
                                <input class="form-control" type="text" size="20" id="titulo" name="titulo"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="texto">Texto:</label>
                            <div class="col-sm-4">
                                <textarea class="form-control" rows="4" id="texto" name="texto"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>

    </div>
</div>