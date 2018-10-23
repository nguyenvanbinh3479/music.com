<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Like_Controller extends Base_Controller
{
    /**
    * action index: show all likes
    * method: GET
    */

    public function index()
    {        
        $this->model->load('Like');
        $this->model->load('Song');
        $this->model->load('User');
        $list_like = $this->model->Like->all();
        $list_song = $this->model->Song->all();
        $list_user = $this->model->User->all();
        $data = array(
            'title' => 'index',
            'list_like' => $list_like,
            'list_song' => $list_song,
            'list_user' => $list_user
        );

        // Load view
        $this->view->load('likes/index', $data);
    }


    /**
    * action create: create a YeuThich
    * method: GET
    */
    public function create()
    {        
        $this->model->load('Song');
        $this->model->load('User');
        $this->model->load('Like');
        $loke = new Like_Model();
        $list_song = $this->model->Song->all();
        $list_user = $this->model->User->all();

        $data = array(
            'show' => $like->show,
            'list_song' => $list_song,
            'list_user' => $list_user,
        );

        $this->view->load('likes/create',$data);

    }

     /**
    * action store: save a like to database
    * method: POST
    */
    public function store()
    {        
       
        $this->model->load('Like');
        if ($this->model->Like->check_yeuthich_exists($_POST['Songs_id'], $_POST['Users_id']) == 0) {
            $this->model->Like->Songs_id = $_POST['Songs_id'];
            $this->model->Like->Users_id = $_POST['Users_id'];
            $this->model->Like->ngay = $_POST['ngay'];
            $this->model->Like->save();
            go_back();
        }else {
           
        }

    }

    /**
    * action edit: show form edit a YeuThich
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('Like');
        $this->model->load('Song');
        $this->model->load('User');
        $like = $this->model->Like->find($_GET['Songs_id'], $_GET['Users_id']);
        $list_song = $this->model->Song->all();
        $list_user = $this->model->User->all();
        $data = array(
            'title' => 'edit',
            'like' => $like,
            'list_song' => $list_song,
            'list_user' => $list_user
        );

        // Load view
        $this->view->load('likes/edit', $data);
    }

    /**
    * action edit: update like database
    * method: POST
    */
    public function update()
    {        
        $this->model->load('Like');
        $like = $this->model->Like->find($_POST['Songs_id'], $_POST['Users_id']);
        $like->Songs_id = $_POST['Songs_id'];
        $like->Users_id = $_POST['Users_id'];          
        $like->ngay = $_POST['ngay'];          
        $like->update();

        go_back();
    }

    /**
    * action delete: show form edit a YeuThich
    * method: GET
    */
    public function delete()
    {        
        $this->model->load('Like');
        $this->model->Like->delete($_GET['Songs_id'], $_GET['Users_id']);
        go_back();
    }
}
