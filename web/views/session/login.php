<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p></p>
    </div>
    <div class="span-17 prepend-1 append-bottom last rightColumn">
        <h2>Login</h2>
        <?php echo $message; ?>
        <?php echo form_open('session/login'); ?>
        <label>Username or Email</label>
        <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" class="title" />
        <?php echo form_error('username'); ?>
        <label>Password</label>
        <input type="password" name="password" id="password" /> <span class="small"><?php echo anchor('account/forgot_password','Forgot Password?'); ?></span><br/>
        <?php echo form_error('password'); ?>
        <input type="checkbox" name="remember" id="remember" /> <span class="quiet small">Remember Me for 2 Weeks</span>
        <hr class="space" />
        <input type="submit" name="login" id="login" value="login" class="" /> <span class="inline strong" ><?php echo anchor('account/register', 'New User? Register here!');?></span>
        <?php echo form_close(); ?>
    </div>
</div>
<?php $this->load->view('footer'); ?>