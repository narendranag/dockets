<?php

class Session extends Controller {
    function Session() {
        parent::Controller();
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    }

    function index() {
        redirect('session/login');
    }

    function login() {
        $data['message'] = null;
        if($this->form_validation->run() == false) {
            $this->load->view('session/login', $data);
        } else {
            ($this->input->post('remember') == 'on')? $remember =  true : $remember = false;
            if($this->dx_auth->login($this->input->post('username'), $this->input->post('password'), $remember) == false) {
                $data['message'] = $this->dx_auth->get_auth_error();
                ;
                $this->load->view('session/login', $data);
            } else {
                redirect('dockets/index');
            }

        }
    }

    function logout() {
        $this->dx_auth->logout();
        redirect();
    }

}