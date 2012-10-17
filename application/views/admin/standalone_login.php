<?php echo form_open('authentication/admin_login'); ?>   
<div class="well">
    <div class="clearfix">
        <label class="btn-mini" for="x1Input3">Email</label>
        <input type="text" class="xx-large" size="30" name="email" required/>
    </div>
    <div class="clearfix">
        <label for="x1Input3" class="btn-mini" size="30">Password</label>
        <input type="password" class="xx-large" size="30"  name="password" required/>
    </div>
    <div class="clearfix">
        <input class="btn-primary" type="submit" value="SIGN IN"/>
    </div>
</div>
<?php echo form_close(); ?>