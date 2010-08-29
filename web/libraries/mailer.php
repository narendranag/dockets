<?php

class Mailer {
    var $ci;

    function DX_Auth_Event() {
        $this->ci =& get_instance();
    }
    function email_docket($docket_id, $to, $from_email, $from_name) {
        $this->ci->load->library('email');
        $this->email->from($from_email, $from_name);
        $this->email->to($to);
        $this->email->subject($from_name . 'wants to share this Docket with you');
        $message = "Hi There

%s wants to share the following Docket with you

%s

Regards,
Dockets Team";
        $docket = new Docket();
        $tasks = new Task();
        $docket->get_by_id($id);
        $tasks->where('docket_id', $id)->get();
        foreach($tasks->all as $task) {
            $status = ($task->pending)?"Pending":"Completed";
            $task_list .= '> ' . $task->name . " (".$task->due.") [".$status."]" . "\n\r";
        }
        $message = sprintf($message, $this->dx_auth->get_username(), $task_list);
        $this->email->message($message);
        return ($this->email->send());
    }

}