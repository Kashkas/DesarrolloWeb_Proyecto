<?php
/**
 * Created by PhpStorm.
 * User: Pablo
 * Date: 15-11-14
 * Time: 14:02
 */

?>
   <h1>Login</h1>
   <?php echo validation_errors(); ?>
   <?php echo form_open('verifylogin'); ?>
     <label for="username">Usuario:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Contraseña:</label>
     <input type="password" size="20" id="password" name="password"/>
     <br/>
     <input type="submit" value="login"/>
   </form>
