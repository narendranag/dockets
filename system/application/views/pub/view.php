<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p>This Docket was created by: <br/>
        <img src="<?php echo gravatar_url($user->email,'X', 28);?>" title="<?php echo $this->dx_auth->get_username(); ?>" /><br/></p>
        <h6>Want one for you too?</h6>
        <p>Get Started <span class="strong"><?php echo anchor('session/register', 'here'); ?></span></p>
        <h6>Keep Updated</h6>
        <p>Subscribe to RSS feed of this by clicking <?php echo anchor('feed/atom/'.$docket->id, 'here'); ?></p>

    </div>
    <div class="span-17 prepend-1 last rightColumn">
        <h2 class="inline"><?php echo $docket->name; ?></h2>
        <p><em><?php echo $docket->description; ?></em></p>
<!--        <h3>Pending Tasks</h3>
        <?php
            if(!count($pending_tasks)) {
                echo '<p class="quiet">Nothing Found!</p>';
            }
        ?> //-->
        <ul class="tasks" id="pending_tasks">
            <?php
                foreach($pending_tasks as $task) {
                    echo '<li><span class="loud">'.$task->name.'</span></li>';
                }
            ?>
<!--        <h3>Completed Tasks</h3>
        <?php
            if(!count($completed_tasks)) {
                echo '<p class="quiet">Nothing Found!</p>';
            }
        ?> //-->
            <?php
                foreach($completed_tasks as $task) {
                    echo '<li><span class="quiet small">'.$task->name.' [completed]</span></li>';
                }
            ?>
        </ul>
    </div>
</div>
<?php $this->load->view('footer'); ?>