<?php echo form_open('inicio/login', ['class' => 'form-signin', 'role' => 'form', 'style' => 'float:center']); ?>
<?php //echo validation_errors();  ?>
<h1>Login</h1>
<div class="form-group">
    <label class="control-label" for="username">Usuario:</label>
    <input class="form-controls" type="text" size="20" id="username" name="username"/>
    <div class="text-danger">
        <?php echo form_error('username'); ?>
    </div>
</div>
<div class="form-group">
    <label class="control-label" for="password">Contraseña:</label>
    <input class="form-controls" type="password" size="20" id="password" name="password"/>
    <div class="text-danger">
        <?php echo form_error('password'); ?>
    </div>
</div>
<br>
<input class="btn btn-primary" type="submit" value="Entrar"/>
<?php echo form_close(); ?>

<div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" id="exampleInputFile">
        <p class="help-block">Example block-level help text here.</p>
    </div>


