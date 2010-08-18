<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p></p>
    </div>
    <div class="span-17 prepend-1 append-bottom last rightColumn">
        <h2>Forgot Password</h2>
        <?php echo $message; ?>
        <?php echo form_open('account/forgot_password'); ?>
        <label>Username or Email</label>
        <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" class="title" /><br/>
        <?php echo form_error('username'); ?>
        <input type="submit" name="forgot_password" id="forgot_password" value="Reset Password" class="" />
        <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('footer'); ?>