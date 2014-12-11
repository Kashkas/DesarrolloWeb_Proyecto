<br>
<div class="col-md-6 container-fluid" style="float:left">
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title"><?php echo $usuario['nombre']." ".$usuario['apellido']; ?></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3" align="center"> <img alt="User Pic" src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100" class="img-circle"> </div>
                <div class=" col-md-9 col-lg-9 "> 
                    <table class="table table-user-information">
                        <tbody>
                            <tr>
                                <td>Rut: </td>
                                <td><?php echo $usuario['rut']."-".$usuario['dv']; ?></td>
                            </tr>
                            <tr>
                                <td>Carrera:</td>
                                <td><?php echo $usuario['carrera']; ?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><a href="mailto:<?php echo $usuario['correo_institucional']; ?>"><?php echo $usuario['correo_institucional']; ?></a></td>
                            </tr>
                            <?php if($usuario['correo_alternativo']!=null){ 
                                echo '<tr>';
                                echo '<td>Email Personal</td>';
                                echo '<td><a href="mailto:'.$usuario["correo_alternativo"].'">'.$usuario["correo_alternativo"].'</a></td>';
                                echo '</tr>';
                             }  ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
