<?php
class Ajax extends Application {
    function Ajax() {
        parent::Application();
    }

    function complete_task() {
        $id = $this->input->post('id');
        $user = new User();
        $task = new Task();

        if($task->where('user_id', $this->dx_auth->get_user_id())->where('id', $id)->count() == 0) {
            return;
        }

        $task->get_by_id($id);
        $task->completed = 1;
        $task->save();

        
        $docket = new Docket();
        $docket->get_by_id($task->docket_id);

        $task->clear();
        if($task->where('docket_id', $docket->id)->where('completed', 0)->count() == 0){
            $docket->completed = 1;
            $docket->save();
            
        } else {
            $docket->completed = 0;
            $docket->save();
        }

        $gold = $this->treasure->increase($this->dx_auth->get_user_id());

        $task->clear();
        $task->get_by_id($id);
        $result = array('id' => $task->id, 'name' => $task->name, 'docket_id' => $docket->id, 'due' => $task->due, 'gold' => $gold);
        echo json_encode($result);
    }

    function uncomplete_task() {
        $id = $this->input->post('id');
        $user = new User();
        $task = new Task();
        
        if($task->where('user_id', $this->dx_auth->get_user_id())->where('id', $id)->count() == 0) {
            return;
        }

        $task->get_by_id($id);
        $task->completed = 0;
        $task->save();

        
        $docket = new Docket();
        $docket->get_by_id($task->docket_id);
        
        $task->clear();
        if($task->where('docket_id', $docket->id)->where('completed', 0)->count() == 0){
            $docket->completed = 1;
            $docket->save();
            
        } else {
            $docket->completed = 0;
            $docket->save();
        }

        $gold = $this->treasure->decrease($this->dx_auth->get_user_id());

        $task->clear();
        $task->get_by_id($id);

        $result = array('id' => $task->id, 'name' => $task->name, 'docket_id' => $docket->id, 'due' => $task->due, 'gold' => $gold);
        echo json_encode($result);
    }

    function toggle_docket_sharing() {
        $id = $this->input->post('id');
        $docket = new Docket();
        $docket->get_by_id($id);
        $docket->shared = !($docket->shared);
        $docket->save();
        
        $result['status'] = ($docket->shared)? 'Public' : 'Private';
        echo json_encode($result);
    }
    
    function email_docket($id) {
        $data['id'] = $id;
        $data['message'] = null;
        $this->form_validation->set_rules('email' , 'Email Address', 'required|trim|valid_email');
        if($this->form_validation->run() == false) {
        } else {
            $data['message'] = '<p class="success">This Docket has been successfully emailed to '.$this->input->post('email').'</p>';

            $this->load->library('profile');
            $this->email->from($this->dx_auth->get_user_email(), $this->profile->get_name($this->dx_auth->get_user_id()));
            $this->email->to($this->input->post('email'));

            $this->email->subject('Dockets App');
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
            $this->email->send();
            echo $this->email->print_debugger();
        }
        $this->load->view('ajax/email_docket', $data);
    }

    function delete_docket($id) {
    	$this->load->view('ajax/delete_docket');
    }
}