<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p></p>
    </div>
    <div class="span-13 prepend-1 append-bottom rightColumn">
        <h2>Register</h2>
        <p class="small quiet">Welcome to Dockets. Use the following form to register yourself with us. After sucessful registration, you will receive a confirmation email. You will have to activate you account using the instructions given in the email before you can start using the Dockets.</p>
        <?php echo $message; ?>
        <?php echo form_open('account/register'); ?>
        <label>Username</label>
        <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>" class="title" />
        <span class="small block quiet">Enter Your desired username. This will be used for loging in.</span>
        <?php echo form_error('username'); ?>
        <label>Password</label>
        <input type="password" name="password" id="password" class="text" value=""/>
        <span class="small block quiet">Enter your desired password. preferablly you should choose a password that is hard to guess.</span>
        <?php echo form_error('password'); ?>
        <label>Email</label>
        <input type="text" name="email" id="email" class="text" value="<?php echo set_value('email'); ?>" />
        <span class="small block quiet">Enter your valid email address. This email address will be used for your <?php echo anchor('http://gravatar.org', 'Gravatar'); ?>.</span>
        <?php echo form_error('email'); ?>
        <hr class="space" />
        <input type="submit" name="register" id="register" value="register" class="" />  <span class="inline strong" ><?php echo anchor('session/login', 'Already Registered? Login here!');?></span>
        <?php echo form_close(); ?>
    </div>
    <div class="span-4 last"></div>
</div>
<?php $this->load->view('footer'); ?>