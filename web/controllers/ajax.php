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
        $result = array('id' => $task->id, 'name' => $task->name, 'docket_id' => $docket->id, 'gold' => $gold);
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

        $result = array('id' => $task->id, 'name' => $task->name, 'docket_id' => $docket->id, 'gold' => $gold);
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
    
    function email_send() {
    	$this->load->view('ajax/email_send');
    }
}