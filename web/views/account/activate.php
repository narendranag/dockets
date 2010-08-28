<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p></p>
    </div>
    <div class="span-13 prepend-1 append-bottom rightColumn">
        <h2>Activate Your Account</h2>
        <?php echo $message; ?>
        <?php echo form_open('account/activate'); ?>
        <label>Username</label>
        <input type="text" name="username" id="username" class="text" />
        <span class="small block quiet">Enter the username you specified during the time of registration.</span>
        <label>Activation Key</label>
        <input type="text" name="key" id="key" class="text" />
        <span class="small block quiet">Enter the activation code you received in your confirmation email.</span>
        <?php echo form_error('key'); ?>
        <hr class="space" />
        <input type="submit" name="activate" id="activate" value="Activate" />
        <?php echo form_close(); ?>
    </div>
    <div class="span-4 last">

    </div>
</div>
<?php $this->load->view('footer'); ?>