<?php
class Feed extends Controller {

    function Feed() {
        parent::Controller();
        $this->load->helper('xml');
    }

    function atom($id) {
        if($id == '') {
            echo 'No Feed exists at this address';
            return;
        }
        $docket = new Docket();
        $task = new Task();
        $user = new User();
        $data['docket'] = $docket->get_by_id($id);
        if($docket->shared == 0 ){
            echo 'No Feed exists at this address';
            return;
        }
        $data['tasks'] = $task->where('docket_id' , $docket->id)->get()->all;
        $data['author_name'] = $user->get_by_id($docket->user_id);
        $this->load->view('feed/atom', $data);
    }
}