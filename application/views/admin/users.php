<?php $this->load->view('admin/toolbar'); ?>

<div class="span7" id="main-content">
    <div class="events">
        <?php foreach ($users as $user): ?>
            <a href="<?php echo base_url(); ?>/index.php/user/index/<?php echo $user['userid']; ?>">
                <div class="row event">
                    <div class="span2">
                        <img src="<?php
                                    if (!isset($image)) {
                                        $src = base_url() . 'assets/images/default.gif';
                                    } else {
                                        $src = $image;
                                    }
                                    echo $src;
                                        ?>"
                             />
                    </div>
                    <div class="span1 alert-message block-message success">
                        <?php echo $user['email']; ?>
                    </div>
                </div>
            </a>
        <?php endforeach; ?>
    </div>