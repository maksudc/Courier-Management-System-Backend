<?php $this->load->view('admin/toolbar');?>
<div class="" id=" main-content">
    <div class="span4">
        <table class="table">
            <tr>
                <td>
                    Username
                </td>
                <td>
                    <?php echo $user['username']; ?>
                </td>
            </tr>
            <tr>
                <td>
                    Email
                </td>
                <td>
                    <?php echo $user['email']; ?>
                </td>
            </tr>
        </table>
    </div>
    <div class="span4">
        <img src="<?php echo base_url() ?>/assets/images/default.gif"/>
    </div>
    &nbsp;
    <br>
    <br>
    <div class="span6">
        <h2 class="tag"> Active tasks</h2>
        <div class="events">
            <?php foreach ($active_tasks as $task): ?>
                <a href="<?php echo base_url() . "index.php/task/index/" . $task['taskid']; ?>">
                    <div class="row event">
                        <div class="span2">
                            <h4> <?php echo $task['name']; ?></h4>
                        </div>
                        <div class="span2">
                            <p>
                                <?php echo $task['description']; ?>
                            </p>
                        </div>
                        <div class="span2">
                            Deadline: <?php echo $task['duedate']; ?>
                        </div>

                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="span3 widget pull-right">
        <marquee behaviour="scroll" scrollamount="2" direction="up" class="events" onmouseover="this.setAttribute('scrollamount', 0, 0);" onmouseout="this.setAttribute('scrollamount', 2, 0);">
            <?php foreach ($reported_tasks as $task): ?>
                <div class="event">
                    <a href="<?php echo base_url() . "index.php/task/index/" . $task['taskid']; ?>">
                        <h><?php echo $task['name']; ?></h>
                        <h><?php echo $task['duedate']; ?></h>
                    </a>
                </div>
            <?php endforeach; ?>
        </marquee>
    </div>
</div>