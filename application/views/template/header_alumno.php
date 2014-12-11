<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Curso</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css"/>
        <script src="<?php echo base_url(); ?>jQuery/jquery-2.1.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> 
    </head>
    <?php //print_r($cursos); ?>
    <body>
        <div class="container-fluid" style="width: 100%">
            <div class="div0" style="clear: all; width: 100%" >
                <img src="<?php echo base_url('img/banner.png'); ?>" style="width:100%"> 
            </div>
            
            
            <div class="div1" style="float:left; width:20%">
                <br>
                <ul id="sidebar" class="nav nav-pills nav-stacked" style="max-width: 200px;">
                    <li class="active">
                        <a href="<?php echo base_url('alumno'); ?>"><span class="glyphicon glyphicon-user"></span>  Perfil</a>
                    </li>
                    
                    <li class="collapse navbar-collapse"><a href="#"><span class="glyphicon glyphicon-lock"></span>  Cursos<b class="caret"></b></a>
                        <ul class="nav navbar-nav collapsed">
                            <?php foreach ($cursos as $row) { ?>
                                <li class='nav navbar-nav navbar-collapsed'>
                                    <a href="<?php echo base_url('alumno'); ?>/curso/<?php echo $row['year']; ?>/<?php echo $row['semestre']; ?>/<?php echo $row['codigo']; ?>/<?php echo $row['seccion']; ?>/"/><?php echo $row['nombre']; ?></a>
                                </li>

                            <?php } ?>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><span class="glyphicon glyphicon-list"></span>  Horario</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>"><span class="glyphicon glyphicon-link"></span>Enlaces</a>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-earphone"></span>  Contacts</a></li>
                </ul>
            </div>