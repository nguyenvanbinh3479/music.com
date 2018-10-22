<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Category_Controller extends Base_Controller
{
    /**
    * action index: show all categories
    * method: GET
    */
    public function index()
    {        
        $this->model->load('Category');
        $list_category = $this->model->Category->all();
        $data = array(
            'title' => 'index',
            'list_category' => $list_category
        );

        // Load view
        $this->view->load('categories/index', $data);
    }

    /**
    * action show: show a category
    * method: GET
    */
    public function show()
    {        
        $this->model->load('Category');
        $category = $this->model->Category->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'category' => $category
        );

        // Load view
        $this->view->load('categories/show', $data);
    }

    /**
    * action create: create a category
    * method: GET
    */
    public function create()
    {        
        $this->view->load('categories/create');
    }

     /**
    * action store: save a category to database
    * method: POST
    */
    public function store()
    {        
        $this->model->load('Category');
        $this->model->Category->ten = $_POST['ten'];
        $this->model->Category->anh = $_POST['anh'];
        $this->model->Category->save();

        go_back();
    }

    /**
    * action edit: show form edit a category
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('Category');
        $category = $this->model->Category->findById($_GET['id']);
        $data = array(
            'title' => 'edit',
            'category' => $category
        );

        // Load view
        $this->view->load('categories/edit', $data);
    }

    /**
    * action edit: update category database
    * method: POST
    */
    public function update()
    {        
        $this->model->load('Category');
        $category = $this->model->Category->findById($_POST['id']);
        $category->ten = $_POST['ten'];
        $category->anh = $_POST['anh'];         
        $category->update();

        go_back();
    }

    /**
    * action delete: show form edit a category
    * method: GET
    */
    public function delete()
    {        
        $this->model->load('Category');
        $category = $this->model->Category->findById($_GET['id']);
        $category->delete();

        go_back();
    }
}
