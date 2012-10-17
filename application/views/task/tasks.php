<?php $this->load->view('admin/toolbar'); ?>
<div class="span4"> 
    <h3> Unassigned Tasks</h3>   
    <?php foreach ($unassigned_tasks as $task): ?>
        <a href="<?php echo base_url() . "index.php/task/index/" . $task['taskid']; ?>">
            <div class="row event">
                <div class="span2">
                    <h4> <?php echo $task['name']; ?></h4>
                </div>                
                <div class="span2">
                    Deadline: <?php echo $task['duedate']; ?>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
<div class="span4">
    <h3>&nbsp;Assigned Tasks</h3>
    <?php foreach ($unreported_tasks as $task): ?>
        <a href="<?php echo base_url() . "index.php/task/index/" . $task['taskid']; ?>">
            <div class="row event">
                <div class="span2">
                    <h4> <?php echo $task['name']; ?></h4>
                </div>                
                <div class="span2">
                    Deadline: <?php echo $task['duedate']; ?>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>
<div class="span4">
    <h3>Completed Tasks</h3>
    <?php foreach ($reported_tasks as $task): ?>
        <a href="<?php echo base_url() . "index.php/task/index/" . $task['taskid']; ?>">
            <div class="row event">
                <div class="span2">
                    <h4> <?php echo $task['name']; ?></h4>
                </div>                
                <div class="span2">
                    Deadline: <?php echo $task['duedate']; ?>
                </div>
            </div>
        </a>
    <?php endforeach; ?>
</div>

