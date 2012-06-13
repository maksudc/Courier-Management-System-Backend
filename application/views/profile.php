<div id="main-content" class="span10">

    <div class="alert-message block-message success">

        Welcome to your profile page

    </div>

    <div class="widget">
        <img src="
        <?php
        if (empty($photo)) {

            $photo = base_url() . '/assets/images/default.gif';
        }
        echo $photo;
        ?>"/>
    </div>

    <table class=" table table-bordered">

        <tr class="row">
            <td>
                Name
            </td>
            <td>
                <?php echo $name; ?>
            </td>
        </tr>

        <tr class="row">
            <td>
                Email
            </td>
            <td>
                <?php echo $email; ?>
            </td>
        </tr>

        <tr class="row">
            <td>
                Phone
            </td>
            <td>
                <?php echo $phone; ?>
            </td>
        </tr>

    </table>
</div>