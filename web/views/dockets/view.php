<?php $this->load->view('header'); ?>
<script src="<?php echo base_url(); ?>/web/statics/fancybox/jquery.fancybox-1.3.1.js"></script>
<div class="container">
    <div class="span-6 leftColumn">
        <?php
            echo '<h4><img src="'.gravatar_url($this->dx_auth->get_user_email(), 'X', '45').'" align="left" width="45" height="45" />';
            echo '&nbsp;<span class="strong loud">' . $this->dx_auth->get_username() . '</span><br/><span class="small">&nbsp;&nbsp;'. anchor('session/logout', 'logout') .'</span></h4>';
            echo '<p>Total Gold Coins: <span id="gold">'.$gold_amount.'</span></p>';
            echo '<p class="small">'.anchor('account/manage', 'Manage Account'). '</p>';
        ?>
        <hr />
        <p><?php echo anchor('dockets/', 'Back to your Dockets');?> or <?php echo anchor('dockets/create', 'Create a new one');?></p>
        <h6>Sharing</h6>
        <p class="small quiet">My Making this Docket public, anyone can view this Docket.<br/>
        <span class="loud">This docket is currently:
            <a href="<?php echo site_url('dockets/view/'.$docket->id.'/#');?>" id="share_docket" rel="<?php echo $docket->id; ?>"><?php
            if($docket->shared) {
                echo 'Public';
            } else echo 'Private';
        ?></a><br/>
        <img class="icon" src="<?php echo base_url() ?>web/statics/images/icons/globe.png" />
        Public URL: <?php echo anchor($docket->short_url); ?><br/>
        <img class="icon" src="<?php echo base_url() ?>web/statics/images/icons/mail-send.png" /> <?php echo anchor('ajax/email_docket/'.$docket->id, 'Email this docket to a friend', "id='email_send'"); ?></span></p>
        <p><img class="icon" src="<?php echo base_url() ?>web/statics/images/icons/cross.png" /> <?php echo anchor('ajax/delete_docket/'.$docket->id, 'Delete this Docket', "id=delete_docket"); ?></p>
        <?php $this->load->view('left_column'); ?>
    </div>
    <div class="span-17 prepend-1 last rightColumn">
        <h2 class="inline"><?php echo $docket->name; ?></h2>
        <p><?php echo $docket->description; ?></p>
        <?php echo form_open('dockets/view/' . $docket->id); ?>
        <label>Add a task</label>
        <input type="text" name="name" id="name" class="title" value="<?php echo set_value('name'); ?>"/>
        <span class="small block quiet">Enter the name of the task you want to create.</span>
        <?php echo form_error('name'); ?>
        <input type="submit" name="submit" id="submit" value="add" class="" /> <input type="text" name="due" id="due" class="inline" value="<?php echo set_value('due', date('Y-m-d', strtotime('+10 day'))); ?>"/> <span class="quiet small">Due Date (format: yyyy-mm-dd)</span>
        <?php echo form_error('due'); ?>
        <?php echo form_close(); ?>
        <hr class="space" />
<!--        <h3>Pending Tasks</h3>
        <?php
            if(!count($pending_tasks)) {
                echo '<p class="quiet">Nothing Found!</p>';
            }
        ?> //-->
        <ul class="tasks" id="pending_tasks">
            <?php
                foreach($pending_tasks as $task) {
                    echo '<li><span class="loud"><input type="checkbox" rel="'.$task->id.'" class="pending_task" /> '.$task->name.' <span class="quiet small">('.$task->due.')</span></span></li>';
                }
            ?>
        </ul>
<!--        <h3>Completed Tasks</h3>
        <?php
            if(!count($completed_tasks)) {
                echo '<p class="quiet">Nothing Found!</p>';
            }
        ?> //-->
        <ul class="tasks" id="completed_tasks">
            <?php
                foreach($completed_tasks as $task) {
                    echo '<li><span class="quiet"><input type="checkbox" rel="'.$task->id.'" class="completed_task" checked="checked"/> '.$task->name.' <span class="quiet small">('.$task->due.')</span></span></li>';
                }
            ?>
        </ul>
    </div>
</div>
<?php $this->load->view('footer'); ?>