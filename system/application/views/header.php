<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="en-us" />
        <base href="<?php echo base_url(); ?>" />
        <link href="css/screen.css" rel="stylesheet" type="text/css" media="screen,projection"/>
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen,projection"/>
        <link href="css/print.css" rel="stylesheet" type="text/css" media="print"/>

        <script src="js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="js/date.js"></script>
        <script type="text/javascript" src="js/datepicker.js"></script>
        

        <script src="js/site.js"></script>
        <title>Dockets</title>
    <?php
    if(is_file('css/'. $this->uri->segment(1) .'/'. $this->uri->segment(2) .'.css'))
        echo '<link rel="stylesheet" href="css/'. $this->uri->segment(1) .'/'. $this->uri->segment(2) .'.css" type="text/css" media="screen" />';
    ?>
    <?php
    if(is_file('js/'. $this->uri->segment(1) .'/'. $this->uri->segment(2) .'.js'))
        echo '<script src="js/'. $this->uri->segment(1) .'/'. $this->uri->segment(2) .'.js" type="text/javascript"></script>';
    ?>
    </head>
    <body>
        <div class="container header prepend-top">
            <div class="span-12">
                <h1>Dockets</h1>
            </div>
            <div class="span-12 last rightAlign prepend-top ">
                Helping you manage yourself easily
                <span class="quiet ">
                <?php
                    if($this->dx_auth->is_logged_in()) {
                        ;
                    } else {
                        echo ' | ' . anchor('session/login', 'Login') . ' | ' . anchor('session/register', 'Register');
                    }
                ?>
                </span>
            </div>
            
        </div>
<hr />