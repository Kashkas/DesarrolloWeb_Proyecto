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