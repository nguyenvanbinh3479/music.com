<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Singer_Controller extends Base_Controller
{
    /**
    * action index: show all baihats
    * method: GET
    */
    public function index()
    {        
        $this->model->load('Singer');
        $list_singer = $this->model->Singer->all();

        $data = array(
            'title' => 'index',
            'list_singer' => $list_singer
        );
       
        $this->view->load('singers/index', $data);
    }

    /**
    * action show: show a baihat
    * method: GET
    */
    public function show()
    {        
        $this->model->load('Singer');
        $singer = $this->model->singer->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'singer' => $singer
        );

        // Load view
        $this->view->load('singers/show', $data);
    }

    /**
    * action create: create a baihat
    * method: GET
    */
    public function create()
    {        
        $this->view->load('singers/create');
    }

     /**
    * action store: save a baihat to database
    * method: POST
    */
    public function store()
    {        
        $this->model->load('Singer');
        $this->model->Singer->ten = $_POST['ten'];
        $this->model->Singer->anh = $_POST['anh'];
        $this->model->Singer->thong_tin = $_POST['thong_tin'];
        $this->model->Singer->save();

        go_back();
    }

    /**
    * action edit: show form edit a baihat
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('Singer');

        $singer = $this->model->Singer->findById($_GET['id']);
        $data = array(
            'title' => 'edit',
            'singer' => $singer,    
        );

        // Load view
        $this->view->load('singers/edit', $data);
    }

    /**
    * action edit: update baihat database
    * method: POST
    */
    public function update()
    {        
        $this->model->load('Singer');
        $singer = $this->model->Singer->findById($_POST['id']);
        $singer->ten = $_POST['ten'];
        $singer->anh = $_POST['anh'];
        $singer->thong_tin = $_POST['thong_tin'];
        $singer->update();

        go_back();
    }

    /**
    * action delete: show form edit a baihat
    * method: GET
    */
    public function delete()
    {        
        $this->model->load('Singer');
        $singer = $this->model->Singer->findById($_GET['id']);
        $singer->delete();

        go_back();
    }

}
