<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p></p>
    </div>
    <div class="span-17 prepend-1 append-bottom last rightColumn">
        <h2>Change Password</h2>
        <?php echo $message; ?>
        <?php echo form_open('account/change_password'); ?>
        <label>Old Password</label>
        <input type="password" name="old_password" id="old_password" class="title" />
        <?php echo form_error('old_password'); ?>
        <label>New Password</label>
        <input type="password" name="new_password" id="new_password" class="title" /><br/>
        <?php echo form_error('new_password'); ?>
        <label>Confirm New Password</label>
        <input type="password" name="confirm_new_password" id="confirm_new_password" class="title" /><br/>
        <?php echo form_error('confirm_new_password'); ?>
        <input type="submit" name="change_password" id="change_password" value="Change Password" class="" /> 
        <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('footer'); ?>