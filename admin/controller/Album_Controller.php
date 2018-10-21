<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Album_Controller extends Base_Controller
{
    /**
    * action index: show all albums
    * method: GET
    */
    public function index()
    {        
        $this->model->load('Album');
        $this->model->load('Singer');
        $this->model->load('Category');
        $list_album = $this->model->Album->all();
        $list_singer = $this->model->Singer->all();
        $list_category = $this->model->Category->all();
        $data = array(
            'title' => 'index',
            'list_album' => $list_album,
            'list_singer' => $list_singer,
            'list_category' => $list_category
        );
      
        // Load view

        $this->view->load('albums/index', $data);
    }

    /**
    * action show: show a album
    * method: GET
    */
    public function show()
    {        
        $this->model->load('Album');
        $album = $this->model->Album->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'album' => $album
        );

        // Load view
        $this->view->load('albums/show', $data);
    }

    /**
    * action create: create a album
    * method: GET
    */
    public function create()
    {        

        $this->model->load('Singer');
        $this->model->load('Category');
        $list_singer = $this->model->Singer->all();
        $list_category = $this->model->Category->all();
        $data = array(
            'title' => 'index',
            'list_singer' => $list_singer,
            'list_category' => $list_category
        );

        $this->view->load('albums/create',$data);
    }

     /**
    * action store: save a album to database
    * method: POST
    */
    public function store()
    {        
        $this->model->load('Album');
        $this->model->Album->anh = $_POST['anh'];
        $this->model->Album->ten = $_POST['ten'];
        $this->model->Album->Singers_id = $_POST['Singers_id'];
        $this->model->Album->Categories_id = $_POST['Categories_id'];
        $this->model->Album->ngay = $_POST['ngay'];        
        
        $this->model->Album->save();

        go_back();
    }

    /**
    * action edit: show form edit a album
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('Album');
        $this->model->load('Category');
        $this->model->load('Singer');
        
        $album = $this->model->Album->findById($_GET['id']);
        $singer = $this->model->Singer->all();
        $category = $this->model->Category->all();
        $data = array(
            'title' => 'edit',
            'album' => $album,
            'list_singer' => $singer,
            'list_category' => $category
        );

        // Load view
        $this->view->load('albums/edit', $data);
    }

    /**
    * action edit: update album database
    * method: POST
    */
    public function update()
    {        

        $this->model->load('Album');
        $album = $this->model->Album->findById($_POST['id']);
        $album->anh = $_POST['anh'];
        $album->ten = $_POST['ten'];  
        $album->Singers_id = $_POST['Singers_id'];
        $album->Categories_id = $_POST['Categories_id'];      
        $album->ngay = $_POST['ngay'];      
        $album->update();
        go_back();
    }

    /**
    * action delete: show form edit a album
    * method: GET
    */
    public function delete()
    {        
        $this->model->load('Album');
        $album = $this->model->Album->findById($_GET['id']);
        $album->delete();

        go_back();
    }
}
