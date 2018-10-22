<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Hear_Controller extends Base_Controller
{
    /**
    * action index: show all hears
    * method: GET
    */
    public function index()
    {        
        $this->model->load('Hear');
        $this->model->load('Song');
        $this->model->load('User');
        $list_hear = $this->model->Hear->all();
        $list_song = $this->model->Song->all();
        $list_user= $this->model->User->all();
        $data = array(
            'title' => 'index',
            'list_hear' => $list_hear,
            'list_song' => $list_song,
            'list_user' => $list_user
        );

        // Load view
        $this->view->load('hears/index', $data);
    }

    /**
    * action show: show a hear
    * method: GET
    */
    public function show()
    {        
        $this->model->load('Hear');
        $hear = $this->model->Hear->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'hear' => $hear
        );

        // Load view
        $this->view->load('hears/show', $data);
    }

    /**
    * action create: create a hear
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
        
        $this->view->load('hears/create', $data);
    }

     /**
    * action store: save a hear to database
    * method: POST
    */
    public function store()
    {        
        $this->model->load('Hear');
        $this->model->Hear->Songs_id = $_POST['Songs_id'];
        $this->model->Hear->Users_id = $_POST['Users_id'];
        $this->model->Hear->ngay = $_POST['ngay'];
        $this->model->Hear->save();

        go_back();
    }

    /**
    * action edit: show form edit a hear
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('Hear');
        $this->model->load('Song');
        $this->model->load('User');
        $hear = $this->model->Hear->findById($_GET['id']);
        $song = $this->model->Song->all();
        $user = $this->model->User->all();
        
        $data = array(
            'title' => 'edit',
            'hear' => $hear,
            'list_song' => $song,
            'list_user' => $user
        );
        
        // Load view
        $this->view->load('hears/edit', $data);
    }

    /**
    * action edit: update hear database
    * method: POST
    */
    public function update()
    {        
        $this->model->load('Hear');
        $hear = $this->model->Hear->findById($_POST['id']);
        $hear->Songs_id = $_POST['Songs_id'];
        $hear->Users_id = $_POST['Users_id'];
        $hear->ngay = $_POST['ngay'];        
        $hear->update();

        go_back();
    }

    /**
    * action delete: show form edit a hear
    * method: GET
    */
    public function delete()
    {        
        $this->model->load('Hear');
        $hear = $this->model->Hear->findById($_GET['id']);
        $hear->delete();

        go_back();
    }
}
