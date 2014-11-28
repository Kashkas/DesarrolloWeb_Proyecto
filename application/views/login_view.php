<div class="div2" style="float:center">
    <h1>Login</h1>
    <div class="form-horizontal">
        <?php //echo validation_errors();  ?>
        <?php echo form_open('inicio/login'); ?>
        
        <label class="control-label" for="username">Usuario:</label>
        <div class="controls">
            <input type="text" size="20" id="username" name="username"/>
        </div>
        <div class="text-danger">
            <?php echo form_error('username'); ?>
        </div>
        
        <label class="control-label" for="password">Contraseña:</label>
        <div class="controls">
            <input type="password" size="20" id="password" name="password"/>
        </div>
        <div class="text-danger">
            <?php echo form_error('password'); ?>
        </div>
        <br>
        <input class="btn" type="submit" value="Entrar"/>
        <?php echo form_close(); ?>
    </div>
</div>