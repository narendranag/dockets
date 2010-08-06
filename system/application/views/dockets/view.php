<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <?php
            echo '<h4><img src="'.gravatar_url($this->dx_auth->get_user_email(), 'X', '45').'" align="left" />';
            echo '&nbsp;<span class="strong loud">' . $this->dx_auth->get_username() . '</span><br/><span class="small">&nbsp;&nbsp;'. anchor('session/logout', 'logout') .'</span></h4>';
            echo '<p>Total Gold Coins: <span id="gold">'.$gold_amount.'</span></p>'
        ?>
        <hr />
        <p><?php echo anchor('dockets/', 'Back to your Dockets');?> or <?php echo anchor('dockets/create', 'Create a new one');?></p>
        <h6>Manage</h6>
        <p>If you wish, you can either <?php echo anchor('dockets/delete/'.$docket->id, 'delete', array('class' => 'strong')); ?> or <?php echo anchor('dockets/edit', 'edit', array('class' => 'strong')); ?> this Docket</p>
        <h6>Sharing</h6>
        <p>By Making this Docket Public, anyone can view it!<br/>
            <span class="loud strong">Current Status: <a href="<?php echo site_url('dockets/view/'.$docket->id.'/#');?>" id="share_docket" rel="<?php echo $docket->id; ?>">
        <?php
            if($docket->shared) {
                echo 'Public';
            } else echo 'Private';
        ?>
            </a><br/>Public URL: <?php echo anchor($docket->short_url); ?></span></p>
        <?php $this->load->view('left_column'); ?>
    </div>
    <div class="span-17 prepend-1 last rightColumn">
        <h2 class="inline"><?php echo $docket->name; ?></h2>
        <p><em><?php echo $docket->description; ?></em></p>
        <?php echo form_open('dockets/view/' . $docket->id); ?>
        <label>Add a task</label>
        <input type="text" name="name" id="name" class="title" /><br/>
        <?php echo form_error('name'); ?>
        <input type="submit" name="submit" id="submit" value="add" class="" /> <input type="text" name="due" id="due" class="inline" value="<?php echo set_value('due', date('d-m-Y', strtotime('+10 day'))); ?>"/>
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
                    echo '<li><span class="loud"><input type="checkbox" rel="'.$task->id.'" class="pending_task" /> '.$task->name.'</span> <span class="edit_link small">'.anchor('dockets/view/'.$docket->id.'#', 'edit').'</span></li>';
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
                    echo '<li><span class="quiet"><input type="checkbox" rel="'.$task->id.'" class="completed_task" checked="checked"/> '.$task->name.'</span> <span class="edit_link small">'.anchor('dockets/view/'.$docket->id.'#', 'edit').'</span></li>';
                }
            ?>
        </ul>
    </div>
</div>
<?php $this->load->view('footer'); ?>