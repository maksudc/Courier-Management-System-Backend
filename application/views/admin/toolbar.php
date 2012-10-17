<?php if (isset($flash_message)): ?>
    <a class ="btn btn-success block-message btn-large">
        <?php echo $flash_message; ?>
    </a>
<?php endif; ?>

<a href="<?php echo base_url(); ?>index.php/authentication/logout" class="badge badge-important pull-right"> Logout </a>
<a href="<?php echo base_url(); ?>index.php/admin/dashboard">
    <strong class="badge badge-important pull-right"><?php echo $this->session->userdata('email'); ?></strong>
</a>
<br>
<br>