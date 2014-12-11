<div class="container-fluid" style="float:center; margin-left: 200px">
    <h1>Portal de Cursos</h1>
    <br>
    <?php echo form_open('inicio/login', ['class' => 'form-horizontal', 'role' => 'form']); ?>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="username">Usuario:</label>
        <div class="col-sm-3">
            <input class="form-control" type="text" size="20" id="username" name="username"/>
        </div>
        <div class="text-danger control-label" style="text-align: left">
            <?php echo form_error('username'); ?>
        </div>
    </div>
    <div class="form-group">
        <label class="col-sm-2 control-label" for="password">Contraseña:</label>
        <div class="col-sm-3">
            <input class="form-control" type="password" size="20" id="password" name="password"/>
        </div>
        <div class="text-danger control-label" style="text-align: left">
            <?php echo form_error('password'); ?>
        </div>
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="col-sm-1 col-sm-offset-1 btn btn-primary">Enviar</button>
        <div class="text-danger col-sm-3 control-label" style="text-align: left">
            <?php if(isset($error)){
                echo "Usuario/Contraseña Incorrecta";
            } ?>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>