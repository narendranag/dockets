<?php
class Pub extends Controller {

    function Pub() {
        parent::Controller();
    }

    function view($id = null) {
        if(is_null($id)) {
            echo "error: no id supplied";
            return false;
        }
        $this->load->library('bitly');

        $this->form_validation->set_rules('name' , 'Task Name', 'required|trim');
        $data = array();
        $docket = new Docket();
        $task = new Task();
        $user = new User();

        if(!$docket->where('shared', 1)->where('id', $id)->count()) {
            redirect('dockets');

        } else $data['docket'] = $docket->get_by_id($id);

        if($docket->short_url == '') {
            $docket->short_url = $this->bitly->shorten(base_url() . 'index.php/pub/view/' . $docket->id);
            $docket->save();
        }

        if( $task->where('completed', 0)->where_related_docket('id', $docket->id)->count() == 0) {
            $data['pending_tasks'] = array();
        } else $data['pending_tasks'] = $task->where('completed', 0)->where_related_docket('id', $docket->id)->get()->all;
        if($task->where('completed', 1)->where_related_docket('id', $docket->id)->count() == 0) {
            $data['completed_tasks'] = array();
        } else $data['completed_tasks'] = $task->where('completed', 1)->where_related_docket('id', $docket->id)->get()->all;
        $data['user'] = $user->get_by_id($docket->user_id);
        $this->load->view('pub/view', $data);
    }
}
