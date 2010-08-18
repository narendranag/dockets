<?php $this->load->view('header'); ?>
<div class="container">
    <div class="span-6 leftColumn">
        <p><?php echo anchor('dockets/', 'Back to your Dockets');?> or <?php echo anchor('dockets/create', 'Create a new one');?></p>
        <p>
        <?php echo anchor('help/creating', 'Creating a Docket'); ?><br />
        <?php echo anchor('help/sharing', 'Sharing a Docket'); ?><br />
        <?php echo anchor('help/sharing', 'Sharing a Docket'); ?></p>
    </div>
    <div class="span-17 prepend-1 last rightColumn">

        <h2>Welcome To Help Section</h2>
        <p>Here you'll be able to learn about Dockets  like anything. </p>
        <h3>Creating a new Docket</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nisl lectus, blandit ut dapibus at, aliquet et nulla.</p>
        <p>Quisque facilisis pulvinar dictum. Donec nisi sem, pharetra eget pretium a, ultricies eget erat. Aliquam erat volutpat. Cras at bibendum orci. Aenean pharetra dapibus purus et elementum.</p>

        <p>Curabitur rhoncus, metus ullamcorper sagittis laoreet, mi lectus congue leo, a sagittis neque nisl id elit. Maecenas gravida odio eu mi sollicitudin facilisis. Sed viverra, diam hendrerit molestie elementum, tortor purus ullamcorper magna, id condimentum arcu diam non nisl. Donec semper tellus eu metus cursus condimentum. Vestibulum sit amet est in metus fermentum viverra et eget turpis. Fusce et lacus lectus, ac interdum diam. Praesent facilisis fringilla felis, et tempor nunc fermentum sed. Morbi varius blandit dolor sed laoreet. Etiam commodo lorem lacinia ipsum congue vitae aliquet est volutpat. Vestibulum rutrum est quis diam convallis commodo ac at libero. </p>

    </div>
</div>
<?php $this->load->view('footer'); ?>