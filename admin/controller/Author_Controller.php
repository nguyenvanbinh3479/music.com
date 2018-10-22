<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Author_Controller extends Base_Controller
{
    /**
    * action index: show all users
    * method: GET
    */
    public function index()
    {
        $this->model->load('Author');
        $list_author = $this->model->Author->all();
        $data = array(
            'title' => 'index',
            'list_author' => $list_author
        );

        // Load view
        $this->view->load('authors/index', $data);
    }

    /**
    * action show: show a user
    * method: GET
    */
    public function show()
    {
        $this->model->load('Author');
        $author = $this->model->Author->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'author' => $author
        );

        // Load view
        $this->view->load('authors/show', $data);
    }

    /**
    * action create: create a user
    * method: GET
    */
    public function create()
    {
        $this->view->load('authors/create');
    }

     /**
    * action store: save a user to database
    * method: POST
    */
    public function store()
    {
        $this->model->load('Author');
        $this->model->Author->anh = $_POST['anh'];
        $this->model->Author->ten = $_POST['ten'];
        $this->model->Author->thong_tin = $_POST['thong_tin'];
        $this->model->Author->save();

        go_back();
    }

    /**
    * action edit: show form edit a user
    * method: GET
    */
    public function edit()
    {
        $this->model->load('Author');
        $author = $this->model->Author->findById($_GET['id']);
        $data = array(
            'title' => 'edit',
            'author' => $author
        );

        // Load view
        $this->view->load('authors/edit', $data);
    }

    /**
    * action edit: update user database
    * method: POST
    */
    public function update()
    {
        $this->model->load('Author');
        $author = $this->model->Author->findById($_POST['id']);
        $author->anh = $_POST['anh'];
        $author->ten = $_POST['ten'];
        $author->thong_tin = $_POST['thong_tin'];
        $author->update();

        go_back();
    }

    /**
    * action delete: show form edit a user
    * method: GET
    */
    public function delete()
    {
        $this->model->load('Author');
        $author = $this->model->Author->findById($_GET['id']);
        $author->delete();

        go_back();
    }
}
#sssss
