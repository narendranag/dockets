<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p></p>
    </div>
    <div class="span-17 prepend-1 append-bottom last rightColumn">
        <h2>Register</h2>
        <?php echo $message; ?>
        <?php echo form_open('account/register'); ?>
        <label>Username</label>
        <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" />
        <?php echo form_error('username'); ?>
        <label>Password</label>
        <input type="password" name="password" id="password" class="block" value="" />
        <?php echo form_error('password'); ?>
        <label>Email</label>
        <input type="text" name="email" id="email" class="block" value="<?php echo set_value('email'); ?>" />
        <?php echo form_error('email'); ?>
        <br/>
        <?php
        $captcha = array(
                'name'	=> 'captcha',
                'id'	=> 'captcha'
        );
        echo $this->dx_auth->get_captcha_image(); ?>
        <br/><em class="small quiet">Enter the code exactly as it appears. There is no zero.</em>
        <label>Confirmation Code</label>
        <?php echo form_input($captcha);?>
        <?php echo form_error($captcha['name']); ?>
        <hr class="space" />
        <input type="submit" name="register" id="register" value="register" class="" />  <span class="inline strong" ><?php echo anchor('session/login', 'Already Registered? Login here!');?></span>
        <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('footer'); ?>