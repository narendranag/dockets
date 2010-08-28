<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <?php
            echo '<h4><img src="'.gravatar_url($this->dx_auth->get_user_email(), 'X', '45').'" align="left" width="45" height="45" />';
            echo '&nbsp;<span class="strong loud">' . $this->dx_auth->get_username() . '</span><br/><span class="small">&nbsp;&nbsp;'. anchor('session/logout', 'logout') .'</span></h4>';
            echo '<p>Total Gold Coins: <span id="gold">'.$gold_amount.'</span></p>';
            echo '<p class="small">'.anchor('account/manage', 'Manage Account'). '</p>';
        ?>
        <hr />
        <p><?php echo anchor('dockets/create', 'Create a new Docket'); ?></p>
        <?php $this->load->view('left_column'); ?>
    </div>
    <div class="span-13 prepend-1 rightColumn">
        <h2>Your Dockets</h2>
        <p class="small quiet">This is your dashboard. All your pending and completed dockets will be listed here. To create a new Docket, click on 'Create a new Docket' from left column.</p>
        <?php echo $message; ?>
        <ul class="dockets" id="pending_dockets">
            <?php
                foreach($pending_dockets as $docket) {
                    echo '<li>'.anchor('dockets/view/' . $docket->id, $docket->name). '</li>';
                }
            ?>
        </ul>
        <?php
            if(!count($completed_dockets)) {
//                echo '<p class="quiet small">Nothing Found</p>';
            } else {
        ?>
        <p class="small">Completed Dockets: 
            <?php
                foreach($completed_dockets as $docket) {
                    echo anchor('dockets/view/'.$docket->id, $docket->name) . ', ';
                }
            ?>
        </p>
        <?php
            }
        ?>
    </div>
    <div class="span-4 last"></div>
</div>
<?php $this->load->view('footer'); ?>