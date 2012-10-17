<?php $this->load->view('admin/toolbar'); ?>
<div class="span10" id="main-content">
    <div class="btn">
        Total <?php count($tasks); ?> Unassigned tasks
    </div>
    <?php echo form_open('admin/assign_task'); ?>
    <div class="well">
        <div class="clearfix">
            <label class="btn-mini" for="x1Input3">Select User</label>
            <select name="userid" id="select-1">
                <?php foreach ($users as $user): ?>
                    <option value="<?php echo $user['userid'] ?>"><?php echo $user['username']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="clearfix">
            <label class="btn-mini">Select Task</label>
            <select name="taskid" id="select-2">
                <?php foreach ($tasks as $task): ?>
                    <option value="<?php echo $task['taskid']; ?>"><h5><?php echo $task['name']; ?></h5></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="clearfix">
            <button class="btn" type="submit"><h4>Assign</h4></button>
            <a class="btn" href="<?php echo base_url(); ?>admin/dashboard">Go to Dashboard</a>
        </div>
    </div>
    <?php echo form_close(); ?>
</div>
<?php if ($this->session->userdata('flash_message')): ?>
    <div class="span3">
        <div class="block-message alert-message success">
            <?php echo $this->session->userdata('flash_message'); ?>
        </div>
    </div>
    <?php $this->session->unset_userdata('flash_message'); ?>
<?php endif; ?>