<!--
<?php //echo form_open('authentication/admin_login');?>   
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
<?php //echo form_close();?>-->

<div class="dropdown-menu">
    <form style="margin: 0px" accept-charset="UTF-8" action="<?php echo base_url() ?>index.php/authentication/admin_login" method="post"><div style="margin:0;padding:0;display:inline"><input name="utf8" type="hidden" value="&#x2713;" /><input name="authenticity_token" type="hidden" value="4L/A2ZMYkhTD3IiNDMTuB/fhPRvyCNGEsaZocUUpw40=" /></div>
        <fieldset class="textbox" style="padding:10px">
            <input name="email" style="margin-top: 8px" type="text" placeholder="Email" />
            <input name="password" style="margin-top: 8px" type="password" placeholder="Passsword" />
            <input id="remember_me" style="float: left; margin-right: 10px; "
                   type="checkbox" name="user_remember" value="1" />
            <label class="string optional" for="user_remember">Remember me</label>
            <input class="btn btn-primary" style="clear: left; width: 96%; height: 32px; font-size: 13px;"
                   type="submit" name="commit" value="Sign In" />
        </fieldset>
    </form>
</div>
