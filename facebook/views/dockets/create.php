<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <?php
            echo '<h4><img src="'.gravatar_url($this->dx_auth->get_user_email(), 'X', '45').'" align="left" />';
            echo '&nbsp;<span class="strong loud">' . $this->dx_auth->get_username() . '</span><br/><span class="small">&nbsp;&nbsp;'. anchor('session/logout', 'logout') .'</span></h4>';
            echo '<p>Total Gold Coins: <span id="gold">'.$gold_amount.'</span></p>'
        ?>
        <hr />
        <p><?php echo anchor('dockets', 'Back to your Dockets');?></p>
        <?php $this->load->view('left_column'); ?>

    </div>
    <div class="span-17 prepend-1 last rightColumn">
        <h2>Create a New Docket</h2>
        <?php echo $message; ?>
        <?php echo form_open('dockets/create'); ?>
        <input type="text" name="name" id="name" class="title" />
        <?php echo form_error('name'); ?>
        <label>Descrption <span class="quiet">(optional)</span></label>
        <textarea name="description" id="description" ></textarea>
        <?php echo form_error('name'); ?>
        <input type="submit" name="submit" id="submit" value="create" class="block" />
        <?php echo form_close(); ?>
        <hr class="space" />
        <?php
            if(count($dockets)) {
                ?>
        <h3>Your Existing Dockets</h3>
        <ul class="dockets">
            <?php
                foreach($dockets as $docket) {
                    echo '<li>'.anchor('dockets/view/' . $docket->id, $docket->name). '</li>';
                }
            ?>
        </ul>
        <?php
            }
        ?>
    </div>
</div>
<?php $this->load->view('footer'); ?>