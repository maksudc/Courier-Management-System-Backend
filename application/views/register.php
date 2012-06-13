
<?php echo form_open('authentication/register'); ?>
<div class="post-comment">
    <label for="x1Input3">Name: </label>
    <div id="clearfix">
        <input type="text" name="name" class="xx-large" size="30" required/>
    </div>
    <label for="x1Input3">Password: </label>
    <div id="clearfix">
        <input type="password" name="password" class="xx-large" size="30" required />
    </div>
    <label for="x1Input3">Phone: </label>
    <div id="clearfix">
        <input type="phone" name="phone" class="xx-large" size="30" />
    </div>
    <label for="x1Input3">Photo: </label>
    <div id="clearfix">
        <input type="file" name="photo" class="xx-large" size="30" />
    </div>
    <label for="x1Input3">Email: </label>
    <div id="clearfix">
        <input type="text" name="email" class="xx-large" size="30" />
    </div>
    <label for="x1Input3">Credit Card Number: </label>
    <div id="clearfix">
        <input type="text" name="credit_card_number" class="xx-large" size="30" />
    </div>
    <input type="submit" value="Register"/>
</div>
<?php echo form_close(); ?>
