<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="content-language" content="en-us" />
        <base href="<?php echo base_url(); ?>web/" />
        <link href="statics/css/screen.css" rel="stylesheet" type="text/css" media="screen,projection"/>
        <link href="statics/css/style.css" rel="stylesheet" type="text/css" media="screen,projection"/>
        <link href="statics/css/print.css" rel="stylesheet" type="text/css" media="print"/>

        <script src="statics/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="statics/js/date.js"></script>
        <script type="text/javascript" src="statics/js/datepicker.js"></script>

        <script src="statics/js/site.js"></script>

        <title>Dockets</title>
        <?php
        //if (is_file('statics/css/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '.css'))
            echo '<link rel="stylesheet" href="statics/css/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '.css" type="text/css" media="screen" />';
        ?>
        <?php
        //if (is_file('statics/js/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '.js'))
            echo '<script src="statics/js/' . $this->uri->segment(1) . '/' . $this->uri->segment(2) . '.js" type="text/javascript"></script>';
        ?>

        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-18034593-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();

        </script>
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
                    if ($this->dx_auth->is_logged_in()) {
                        ;
                    } else {
                        echo ' | ' . anchor('session/login', 'Login') . ' | ' . anchor('account/register', 'Register');
                    }
                    ?>
                </span>
            </div>

        </div>
        <hr />