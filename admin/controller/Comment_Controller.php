<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Comment_Controller extends Base_Controller
{
    /**
    * action index: show all comments
    * method: GET
    */
    public function index()
    {        
        $this->model->load('Comment');
        $this->model->load('Song');
        $this->model->load('User');
        
        $list_comment = $this->model->Comment->all();
        $list_song = $this->model->Song->all();
        $list_user = $this->model->User->all();

        $data = array(
            'title' => 'index',
            'list_comment' => $list_comment,
            'list_song' => $list_song,
            'list_user' => $list_user
        );
        // Load view
        $this->view->load('comments/index', $data);
    }

    /**
    * action show: show a comment
    * method: GET
    */
    public function show()
    {        
        $this->model->load('Comment');
        $comment = $this->model->Comment->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'comment' => $comment
        );

        // Load view
        $this->view->load('comments/show', $data);
    }

    /**
    * action create: create a comment
    * method: GET
    */
    public function create()
    {        
        $this->model->load('Song');
        $this->model->load('User');
        
        $list_song = $this->model->Song->all();
        $list_user = $this->model->User->all();

        $data = array(
            'title' => 'index',
            'list_song' => $list_song,
            'list_user' => $list_user
        );
        $this->view->load('comments/create',$data);
    }

     /**
    * action store: save a comment to database
    * method: POST
    */
    public function store()
    {        
        $this->model->load('Comment');
        $this->model->Comment->Songs_id = $_POST['Songs_id'];
        $this->model->Comment->Users_id = $_POST['Users_id'];
        $this->model->Comment->noi_dung = $_POST['noi_dung'];
        $this->model->Comment->ngay = $_POST['ngay'];
        
        $this->model->Comment->save();

        go_back();
    }

    /**
    * action edit: show form edit a comment
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('Comment');
        $this->model->load('Song');
        $this->model->load('User');
        
        $comment = $this->model->Comment->findById($_GET['id']);
        $list_song = $this->model->Song->all();
        $list_user = $this->model->User->all();
        $data = array(
            'title' => 'edit',
            'comment' => $comment,
            'list_song' => $list_song,
            'list_user' => $list_user,
        );

        // Load view
        $this->view->load('comments/edit', $data);
    }

    /**
    * action edit: update comment database
    * method: POST
    */
    public function update()
    {        
        $this->model->load('Comment');
        $comment = $this->model->Comment->findById($_POST['id']);
        $comment->Songs_id = $_POST['Songs_id'];
        $comment->Users_id = $_POST['Users_id'];
        $comment->noi_dung = $_POST['noi_dung'];  
        $comment->ngay = $_POST['ngay'];  
        $comment->update();
        go_back();
    }

    /**
    * action delete: show form edit a comment
    * method: GET
    */
    public function delete()
    {        
        $this->model->load('Comment');
        $comment = $this->model->Comment->findById($_GET['id']);
        $comment->delete();

        go_back();
    }
}
