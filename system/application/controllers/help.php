<?php

class Help extends Application {

    function Help() {
        parent::Application();
    }

    function index() {
        $this->load->view('help/index');
    }
}