<div class="div2" style="float:center">
    <h1>Login</h1>
    <?php //echo validation_errors();  ?>
    <?php echo form_open('inicio', 'class="form-horizontal'); ?>
    <?php echo form_error('username'); ?>
    <label class="control-label" for="username">Usuario:</label>
    <div class="controls">
        <input type="text" size="20" id="username" name="username"/>
    </div>
    <?php echo form_error('password'); ?>
    <label class="control-label" for="password">Contraseña:</label>
    <div class="controls">
        <input type="password" size="20" id="password" name="password"/>
    </div>
    <br>
    <input class="btn" type="submit" value="Entrar"/>
    <?php echo form_close(); ?>
</div>