<?php 

class Application extends Controller {

	function Application() {
		
        parent::Controller();

            $config = Array(
                'protocol' => 'smtp',
                'smtp_host' => 'ssl://smtp.googlemail.com',
                'smtp_port' => 465,
                'smtp_user' => 'codemaster.snake@gmail.com',
                'smtp_pass' => 'rediff',
                'mailtype'  => 'html',
                'charset'   => 'iso-8859-1'
            );
            $this->load->library('email', $config);
            $this->email->set_newline("\r\n");

            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');
            if(!$this->dx_auth->is_logged_in()) {
                redirect('session/login');
            }
	}
}