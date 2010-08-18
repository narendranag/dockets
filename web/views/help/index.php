<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p><?php echo anchor('dockets/', 'Back to your Dockets');?> or <?php echo anchor('dockets/create', 'Create a new one');?></p>
    </div>
    <div class="span-17 prepend-1 last rightColumn">

        <h2>Welcome To Dockets Help Section</h2>
        <p>We have compiled a small FAQ for you guys to get started.</p>
        <h3>What is Dockets?</h3>
        <p>Dockets is a small yet powerful web based application which will allow you to manage your tasks. In plain English, It's a TO-DO list manager .</p>
        <h3>TODO List? Not Again!</h3>
        <p>If this is what you are feeling then this feeling is mutual :) We are also sick and tired of every other todo list manage out there. Therefore we are creating one on our own.</p>
        <h3>Alright, But WTF Gold coins are doing here?</h3>
        <p>This is a little secret we need to maintain :) Be patient, Yo'll soon know. For now,</p>
            <ul>
                <li>You'll get 5000 gold coins for registering</li>
                <li>You gain 10 gold coins for completing every task</li>
            </ul>

    </div>
</div>
<?php $this->load->view('footer'); ?>