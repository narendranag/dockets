<?php
class FOO extends Controller {

    function FOO() {
        parent::Controller();
        $this->load->library('Treasure');
    }

    function index() {
        
        var_dump($this->treasure->increase($this->dx_auth->get_user_id()));
        var_dump($this->treasure->decrease($this->dx_auth->get_user_id()));
        var_dump($this->treasure->initialize($this->dx_auth->get_user_id()));
        echo "index";
    }

}