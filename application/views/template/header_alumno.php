<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Curso</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
            <script src="<?php echo base_url(); ?>jQuery/jquery-2.1.1.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script> 
    </head>
    <body>
        <div class="container">
            <div class="div0" style="clear: all" >
                <img src="<?php echo base_url('img/banner.jpg'); ?>"> 
            </div>
            <div class="div1" style="float:left; width:20%">
                <ul id="sidebar" class="nav nav-pills nav-stacked" style="max-width: 200px;">
                    <li class="active">
                        <a href="#">Home</a>
                    </li>
                    <li>
                        <a href="#">Library</a>
                    </li>
                </ul>

                <ul id="sidebar" class="nav nav-pills nav-stacked" style="max-width: 200px;">
                    <li class="active"><a href="#"><span class="glyphicon glyphicon-user"></span>  Perfil</a></li>
                    <li class="collapse navbar-collapse"><a href="#"><span class="glyphicon glyphicon-lock"></span>  Cursos<b class="caret"></b></a>
                        <ul class="nav navbar-nav collapsed">
                            <li></li>
                            <?php
                            echo "<li class='collapse navbar-collapse'>";
                                echo "prueba";
                            echo "</li>";
                            ?>
                        </ul>
                    </li>
                    <li><a href="#"><span class="glyphicon glyphicon-envelope"></span>  Mensajes</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-list"></span>  Horario</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-earphone"></span>  Contacts</a></li>
                </ul>
            </div>