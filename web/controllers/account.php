<?php

class Account extends Controller {
    
    var $new_user_info = null;

    function Account() {
        parent::Controller();
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
    }

    function index() {
//        redirect('account/login');
    }

    function register() {
        $data['message'] = null;
        if($this->form_validation->run() == false) {
            $this->dx_auth->captcha();
            $this->load->view('account/register', $data);
        } else {
            $this->new_user_info = $this->dx_auth->register($this->input->post('username'), $this->input->post('password'), $this->input->post('email'));
            print_r($this->new_user_info);
            if($this->new_user_info == false) {
                $data['message'] = '<p>'.$this->dx_auth->get_error_msg().'</p>';
                $this->dx_auth->captcha();
                $this->load->view('account/register', $data);
            } else {
                if ($this->dx_auth->email_activation) {
                    $data['message'] = '<p>You have successfully registered. Check your email address to activate your account.</p>';
                }
                else {
                    $data['message'] = '<p>You have successfully registered. ' . anchor('session/login', 'Login') . '</p>';
                    $this->treasure->initialize($user->id);
                }
                $this->load->view('session/login', $data);
            }

        }
    }

    function activate() {
        // Get username and key
        $username = $this->uri->segment(3);
        $key = $this->uri->segment(4);

        // Activate user
        if ($this->dx_auth->activate($username, $key)) {
            $data['message'] = '<p>Your account have been successfully activated. You can now login to your account.';
        }
        else {
            $data['message'] = '<p>The activation code you entered was incorrect. Please check your email again.</p>';
        }
        $this->load->view('session/login', $data);
    }

    function forgot_password() {
        $data['message'] = null;

        // Validate rules and call forgot password function
        if ($this->form_validation->run() AND $this->dx_auth->forgot_password($this->input->post('username'))) {
            $data['message'] = '<p>An email has been sent to your email with instructions with how to activate your new password.</p>';
        }
        $this->load->view('account/forgot_password', $data);
    }

    function reset_password() {
        // Get username and key
        $data['message'] = null;
        $username = $this->uri->segment(3);
        $key = $this->uri->segment(4);

        // Reset password
        if ($this->dx_auth->reset_password($username, $key)) {
            $data['message'] = '<p>You have successfully reset you password, '.anchor(site_url($this->dx_auth->login_uri), 'Login'). '</p>';
        }
        else {
            $data['message'] = '<p>Reset failed. Your username and key are incorrect. Please check your email again and follow the instructions.</p>';
        }
        $this->load->view('account/reset_password', $data);
    }

    function change_password() {
        $data['message'] = null;
        // Check if user logged in or not
        if ($this->dx_auth->is_logged_in()) {
            $val = $this->form_validation;

            // Set form validation
            $val->set_rules('old_password', 'Old Password', 'trim|required|xss_clean|');
            $val->set_rules('new_password', 'New Password', 'trim|required|xss_clean|matches[confirm_new_password]');
            $val->set_rules('confirm_new_password', 'Confirm new Password', 'trim|required|xss_clean');

            // Validate rules and change password
            if ($val->run() AND $this->dx_auth->change_password($val->set_value('old_password'), $val->set_value('new_password'))) {
                $data['message'] = '<p>Your password has successfully been changed. You can now login.</p>';
                $this->load->view('session/login', $data);
            }
            else {
                $this->load->view('account/change_password', $data);
            }
        }
        else {
            // Redirect to login page
            redirect('session/login');
        }
    }

    function manage() {
        $data['message'] = null;
        if ($this->dx_auth->is_logged_in()) {
            $data['email'] = $this->dx_auth->get_user_email();
            if($this->form_validation->run() == false) {
                $this->load->view('account/manage', $data);
            }
        } else {
            redirect('session/login');
        }
    }

    function username_check($username) {
        $result = $this->dx_auth->is_username_available($username);
        if ( ! $result) {
            $this->form_validation->set_message('username_check', 'Username already exist. Please choose another username.');
        }

        return $result;
    }

    function email_check($email) {
        $result = $this->dx_auth->is_email_available($email);
        if ( ! $result) {
            $this->form_validation->set_message('email_check', 'Email is already used by another user. Please choose another email address.');
        }

        return $result;
    }
    function captcha_check($code) {
        $result = TRUE;

        if ($this->dx_auth->is_captcha_expired()) {
            // Will replace this error msg with $lang
            $this->form_validation->set_message('captcha_check', 'Your confirmation code has expired. Please try again.');
            $result = FALSE;
        }
        elseif ( ! $this->dx_auth->is_captcha_match($code)) {
            $this->form_validation->set_message('captcha_check', 'Your confirmation code does not match the one in the image. Try again.');
            $result = FALSE;
        }

        return $result;
    }
}