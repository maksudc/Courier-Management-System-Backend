<?php $this->load->view('admin/toolbar'); ?>

<div class="span15">
    <div class="span4">
        <a class="btn" href="<?php echo base_url();?>index.php/task/create">
            Create A New Task
        </a>
    </div>

    <div class="span4">
        <a class="btn" href="<?php echo base_url(); ?>index.php/task/create">
            Assign tasks
        </a>
    </div>
    &nbsp;&nbsp;
    <!--
    <div class="span4">
        <a class="btn">
            Update task
        </a>
    </div>
    <br><br>
    <div class="span4">
        <a class="btn">
            Trac Tasks
        </a>
    </div>-->
    &nbsp;&nbsp;
    <div class="span4">
        <a class="btn" href="<?php echo base_url(); ?>index.php/admin/users">
            Agents
        </a>
    </div>
    <!--
    <br><br>
    <div class="span4">
        <a class="btn">
            Create Field Worker
        </a>
    </div>
    <br>-->
</div>

