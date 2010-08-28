<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <?php
            echo '<h4><img src="'.gravatar_url($this->dx_auth->get_user_email(), 'X', '45').'" align="left" width="45" height="45" />';
            echo '&nbsp;<span class="strong loud">' . $this->dx_auth->get_username() . '</span><br/><span class="small">&nbsp;&nbsp;'. anchor('session/logout', 'logout') .'</span></h4>';
        ?>
        <hr />
        <p><?php echo anchor('dockets/', 'Back to your Dockets');?> or <?php echo anchor('dockets/create', 'Create a new one');?></p>
                <?php $this->load->view('left_column'); ?>
    </div>
    <div class="span-13 prepend-1 append-bottom rightColumn">
        <h2>Manage Your Account</h2>
        <p class="quiet small">This section will allow you to change you profile setings such as Name, Website etc. However, you are not allowed you change your username and/or email address you specified during the time of registration.</p>
        <?php echo $message; ?>
        <?php echo form_open('account/manage'); ?>
        <h3>Personal Details</h3>
        <label>Your Full Name</label>
        <input type="text" name="name" id="name" class="text" value="<?php echo set_value('name', $user_profile->name); ?>"/>
        <span class="small block quiet">Enter your full name</span>
        <?php echo form_error('name'); ?>
        <label>Email Address</label>
        <input type="text" name="email" id="email" class="text" value="<?php echo set_value('email', $email); ?>" disabled="disabled"/>
        <span class="small block quiet">You can't edit your email address.</span>
        <?php echo form_error('email'); ?>
        <label>Website</label>
        <input type="text" name="website" id="website" class="text" value="<?php echo set_value('website', $user_profile->website); ?>"/>
        <span class="small block quiet">Enter the address of your website.</span>
        <?php echo form_error('website'); ?>
        <label>Country</label>
        <?php echo form_dropdown('country', $countries, $user_profile->country_id); ?>
        <span class="small block quiet">Enter the address of your website.</span>
        <?php echo form_error('country'); ?>

        <input type="submit" name="save" id="save" value="Save Details" class="" />
        <?php echo form_close(); ?>
    </div>
    <div class="span-4 last"></div>
</div>
<?php $this->load->view('footer'); ?>