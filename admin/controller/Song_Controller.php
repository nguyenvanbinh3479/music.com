<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Song_Controller extends Base_Controller
{
    /**
    * action index: show all baihats
    * method: GET
    */
    public function index()
    {        
        $this->model->load('Song');
        // $this->model->load('Singer');
        // $this->model->load('Album');
        // $this->model->load('Category');
        // $this->model->load('Author');
        $list_song = $this->model->Song->all();
        // $list_singer = $this->model->Singer->all();
        // $list_album = $this->model->Album->all();
        // $list_category = $this->model->Category->all();
        // $list_author= $this->model->Author->all();

        $data = array(
            'title' => 'index',
            'list_song' => $list_song,
            'list_singer' => $list_singer,
            'list_album' => $list_album,
            'list_category' => $list_category,
            'list_author' => $list_author
        );
       
        $this->view->load('songs/index', $data);
    }

    /**
    * action show: show a baihat
    * method: GET
    */
    public function show()
    {        
        $this->model->load('Song');
        $song = $this->model->BaiHat->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'song' => $song
        );

        // Load view
        $this->view->load('songs/show', $data);
    }

    /**
    * action create: create a baihat
    * method: GET
    */
    public function create()
    {        

        $this->model->load('Album');
        $this->model->load('Singer');
        $this->model->load('Category');
        $this->model->load('Author');

        $list_album = $this->model->Album->all();
        $list_singer = $this->model->Singer->all();
        $list_category = $this->model->Category->all();
        $list_author= $this->model->Author->all();

        $data = array(
            'title' => 'index',
            'list_album' => $list_album,
            'list_singer' => $list_singer,
            'list_category' => $list_category,
            'list_author' => $list_author
        );

        $this->view->load('songs/create',$data);

    }

     /**
    * action store: save a baihat to database
    * method: POST
    */
    public function store()
    {        
        $this->model->load('Song');
        // $this->model->BaiHat->singers_id = $_POST['singers_id'];
        // $this->model->BaiHat->album_id = $_POST['album_id'];
        // $this->model->BaiHat->categories_id = $_POST['categories_id'];
        // $this->model->BaiHat->author_id = $_POST['author_id'];
        $this->model->BaiHat->ten = $_POST['ten'];
        $this->model->BaiHat->anh = $_POST['anh'];
        $this->model->BaiHat->loi = $_POST['loi'];
        $this->model->BaiHat->link = $_POST['link'];
        $this->model->BaiHat->ngay = $_POST['ngay'];
        $this->model->BaiHat->save();

        go_back();
    }

    /**
    * action edit: show form edit a baihat
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('Song');
        $this->model->load('Singer');
        $this->model->load('Album');
        $this->model->load('Category');
        $this->model->load('Author');

        $song = $this->model->BaiHat->findById($_GET['id']);
        $list_album = $this->model->Album->all();
        $list_singer = $this->model->Singer->all();
        $list_category = $this->model->Category->all();
        $list_author= $this->model->Author->all();
        $data = array(
            'title' => 'edit',
            'song' => $song,
            'list_singer' => $list_singer,
            'list_album' => $list_album,
            'list_category' => $list_category,
            'list_author' => $list_author
        );

        // Load view
        $this->view->load('songs/edit', $data);
    }

    /**
    * action edit: update baihat database
    * method: POST
    */
    public function update()
    {        
        $this->model->load('Song');
        $song = $this->model->BaiHat->findById($_POST['id']);
        $song->singers_id = $_POST['singers_id'];
        $song->album_id = $_POST['album_id'];
        $song->categories_id = $_POST['categories_id'];
        $song->author_id = $_POST['author_id'];
        $song->ten = $_POST['ten'];
        $song->anh = $_POST['anh'];
        $song->loi = $_POST['loi'];
        $song->link = $_POST['link'];
        $song->ngay = $_POST['ngay'];
        $song->update();

        go_back();
    }

    /**
    * action delete: show form edit a baihat
    * method: GET
    */
    public function delete()
    {        
        $this->model->load('Song');
        $song = $this->model->BaiHat->findById($_GET['id']);
        $song->delete();

        go_back();
    }

}
