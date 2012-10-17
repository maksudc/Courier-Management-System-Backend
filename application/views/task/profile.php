<?php $this->load->view('admin/toolbar');?>
<div class="span4">

    <table class="table table-condensed">
        <tr>
            <td>
                <h4>Name</h4>
            </td>
            <td>
                <?php echo $task['name']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Description 
            </td>
            <td>
                <?php echo $task['description']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Deadline
            </td>
            <td>
                <?php echo $task['duedate'] . '  ' . $task['duetime']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Status
            </td>
            <td>
                <?php echo $task['status']; ?>
            </td>
        </tr>
        <tr>
            <td>
                Comments
            </td>
            <td>
                <?php echo $task['comments']; ?>
            </td>
        </tr>
    </table>
</div>
<div class="span6 pull-right">
    <iframe src="<?php $taskid = $task['taskid'];
                echo base_url() . "index.php/task/map/$taskid"; ?>" style="width: 100%;height: 100%">

    </iframe>
</div>
