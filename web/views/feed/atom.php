<?php header("Content-Type: application/atom+xml"); ?>
<?xml version="1.0" encoding="utf-8" ?>
<feed xmlns="http://www.w3.org/2005/Atom">

    <title><?php echo $docket->name; ?></title>
    <subtitle><?php echo $docket->description; ?></subtitle>
    <id><?php echo site_url(); ?></id>
    <author>
        <name><?php echo $author_name; ?></name>
    </author>
    <?php
        foreach($tasks as $task) {
            echo '<entry>';
            echo '<id>'.site_url('pub/view/'.$docket->id).'</id>';
            echo '<title>'.$task->name.'</title>';
            echo '<updated>'.$task->updated.'</updated>';
            echo '<link rel="alternate" href="'.site_url('pub/view/'.$docket->id).'"/>';
            echo '</entry>';
        }
    ?>
    <entry></entry>

</feed>
