<div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container-fluid">

            <a class="brand" href="#"><img src="<?php echo base_url() ?>/img/codeigniter_logo.gif" width="111" height="30" alt="w3resource logo" /></a>
            <div class="nav-collapse">
                <ul class="nav">
                    <li class="active"><a href="<?php echo base_url();?>index.php/admin/dashboard">Home</a></li>
                    <li class="divider-vertical"></li>
                    <?php $sessId = $this->session->userdata('admin_id');?>
                    <?php if(!empty($sessId)):?>
                    <li><a href="<?php echo base_url();?>index.php/task/tasks">Tasks</a></li>
                    <li class="divider-vertical"></li>
                    <li><a href="<?php echo base_url();?>index.php/admin/users">Agents</a></li>
                    <li class="divider-vertical"></li>
                    <?php endif;?>

                </ul>

                <ul class="nav pull-right">
                    <?php
                    $logged_in = $this->session->userdata('admin_id');
                    if (!($logged_in)):
                        ?>
                        <li class="dropdown" id="menu1">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#menu1">
                                Log In
                                <b class="caret"></b>
                            </a>

                            <?php
                            $this->load->view('admin/login');
                            ?>

                        </li>

<?php else: ?>
                        <ul class="nav">
                            <li class="">
                                <a class="active" href="<?php echo base_url(); ?>index.php/authentication/logout"> Logout </a>
                            </li>
                        </ul>                       

<?php endif; ?>

                </ul>

            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

