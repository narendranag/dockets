<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p><?php echo anchor('dockets/', 'Back to your Dockets');?> or <?php echo anchor('dockets/create', 'Create a new one');?></p>
        <?php $this->load->view('left_column'); ?>
    </div>
    <div class="span-17 prepend-1 last rightColumn">
        <h2>Edit Docket</h2>
        <?php echo form_open('dockets/edit/' . $docket->id); ?>
        <input type="text" name="name" id="name" value="<?php echo set_value('name',$docket->name); ?>" class="title block" />
        <?php echo form_error('name'); ?>
        <textarea name="description" id="description"><?php echo set_value('description', $docket->description); ?></textarea>
        <?php
            $ctr = 0;
            foreach($tasks as $task) {
                echo '<input type="text" name="tasks[]" id="" value="'.set_value('tasks[]', $task->name).'" class="block" />';
                $ctr++;
            }
        ?>
        <?php echo form_error('tasks[]'); ?>
        <hr class="space" />
        <input type="submit" name="submit" id="submit" value="add" class="block" />
        <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('footer'); ?>