<?php

/**
 * Description of dockets
 *
 * @author snake
 *
 */

class Dockets extends Application {

    function Dockets() {
        parent::Application();

    }

    function index() {
        $data['message'] = null;
        
        $docket = new Docket();
        $user = new User();
        $user->get_by_id($this->dx_auth->get_user_id());

        $data['gold_amount'] = $this->treasure->get_amount($this->dx_auth->get_user_id());

        $docket->clear();

        if($docket->where('user_id', $this->dx_auth->get_user_id())->where('completed', 0)->count()) {
            $data['pending_dockets'] = $docket->where('user_id', $this->dx_auth->get_user_id())->where('completed', 0)->get()->all;
        } else $data['pending_dockets'] = array();

        if($docket->where('user_id', $this->dx_auth->get_user_id())->where('completed', 1)->count()) {
            $data['completed_dockets'] = $docket->where('user_id', $this->dx_auth->get_user_id())->where('completed', 1)->get()->all;
        } else $data['completed_dockets'] = array();


        if(count($data['pending_dockets']) == 0 && count($data['completed_dockets']) == 0){
            $data['message'] = '<p class="quiet" >You do not have any dockets created yet. Click '.anchor('dockets/create', 'here'). ' to get started.</p>';
        }

        $this->load->view('dockets/index', $data);
    }

    function create() {
        $data['message'] = '';
        $docket = new Docket();
        $user = new User();
        $user->get_by_id($this->dx_auth->get_user_id());

        $data['gold_amount'] = $this->treasure->get_amount($this->dx_auth->get_user_id());

        if($this->form_validation->run() == false) {
            
        } else {
            if($docket->where('name', $this->input->post('name'))->where('user_id' , $this->dx_auth->get_user_id())->count() == 0 ) {
                $docket->clear();
                $docket->name = $this->input->post('name');
                $docket->description = strip_tags($this->input->post('description'));
                $docket->save();
                $user->save($docket);
                redirect('dockets/view/'. $docket->id);
            } else {
                $data['message'] = '<p>This Docket already exists</p>';
            }
        }
        $docket->clear();

        $data['dockets'] = $docket->where('user_id', $this->dx_auth->get_user_id())->get()->all;
        $this->load->view('dockets/create', $data);
    }

    function view($id = null) {
        if(is_null($id)) {
            echo "error: no id supplied";
            return false;
        }

        $this->load->library('bitly');

        $this->form_validation->set_rules('name' , 'Task Name', 'required|trim|callback_check_task');
        $this->form_validation->set_rules('due' , 'Due Date', 'trim');
        $data = array();
        $docket = new Docket();
        $task = new Task();
        $user = new User();
        $user->get_by_id($this->dx_auth->get_user_id());

        $data['gold_amount'] = $this->treasure->get_amount($this->dx_auth->get_user_id());

        if(!$docket->where('user_id', $this->dx_auth->get_user_id())->where('id', $id)->count()) {
            redirect('dockets');
        } else $data['docket'] = $docket->where('user_id', $this->dx_auth->get_user_id())->get_by_id($id);

        if($docket->short_url == '') {
            $docket->short_url = $this->bitly->shorten(base_url() . 'index.php/pub/view/' . $docket->id);
            $docket->save();
        }


        if($this->form_validation->run() == false) {
            ;
        } else {
            $data['pending_tasks'] = array();
            $task->name = $this->input->post('name');
            $task->due = date("Y-m-d", strtotime($this->input->post('due')));
            $task->save(array($docket, $user));
            $docket->completed = 0;
            $docket->save();
        }


        if( $task->where('completed', 0)->where_related_docket('id', $docket->id)->count() == 0) {
            $data['pending_tasks'] = array();
        } else $data['pending_tasks'] = $task->where('completed', 0)->where_related_docket('id', $docket->id)->get()->all;
        if($task->where('completed', 1)->where_related_docket('id', $docket->id)->count() == 0) {
            $data['completed_tasks'] = array();
        } else $data['completed_tasks'] = $task->where('completed', 1)->where_related_docket('id', $docket->id)->get()->all;

        $this->load->view('dockets/view', $data);
    }

    function edit($id) {
        print_r($_POST);
        if(is_null($id) || !isset ($id)) {
            redirect('dockets');
        }
        $docket= new Docket();
        if($docket->where('id', $id)->where('user_id', $this->dx_auth->get_user_id())->count() == 0) {
            redirect('dockets');
        }

        $docket->get_by_id($id);
        $task = new Task();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('tasks[]', 'tasks[]', 'required|trim');

        $data['docket'] = $docket;
        $data['tasks'] = $task->where('docket_id', $docket->id)->get()->all;

        if($this->form_validation->run() == false) {
            $this->load->view('dockets/edit', $data);
        } else{
            $this->load->view('dockets/edit', $data);
        }

    }


    function check_task($name) {
        $task = new Task();
        if($task->where('name', $name)->where('docket_id', $this->uri->segment(3))->where('user_id', $this->dx_auth->get_user_id())->count() > 0) {
			$this->form_validation->set_message('check_task', 'You already have a task with same title');
			return false;
        }
        else {
            return true;
        }
    }
}
?>
