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
    * action show: show a like
    * method: GET
    */
    public function show()
    {        
        $this->model->load('Like');
        $like = $this->model->Like->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'like' => $like     
        );

        // Load view
        $this->view->load('likes/show', $data);
    }

    /**
    * action create: create a like
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
        $this->view->load('likes/create',$data);
    }

     /**
    * action store: save a like to database
    * method: POST
    */
    public function store()
    {        
        $this->model->load('Like');
        $this->model->Like->Users_id = $_POST['Users_id'];
        $this->model->Like->Songs_id = $_POST['Songs_id'];
        $this->model->Like->ngay = $_POST['ngay'];
        
        $this->model->Like->save();

        go_back();
    }

    /**
    * action edit: show form edit a like
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('Like');
        $this->model->load('Song');
        $this->model->load('User');

        $like = $this->model->Like->findById($_GET['id']);
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
        $like = $this->model->Like->findById($_POST['id']);
        $like->Users_id = $_POST['Users_id'];
        $like->Songs_id = $_POST['Songs_id'];        
        $like->ngay = $_POST['ngay'];        
        $like->update();

        go_back();
    }

    public function check_exist() {
        $conn = FT_Database::instance()->getConnection();
        $stmt = $conn->prepare("SELECT * FROM likes WHERE Users_id = ? AND Songs_id = ? AND ngay= ?");

        $stmt->bind_param("iis", $Users_id, $Songs_id, $ngay);

        $stmt->execute();
        $stmt->bind_result($id);
        $stmt->store_result();
        /*Fetch the value*/
        $stmt->fetch();

        if ($stmt->num_rows > 0) {
        return $stmt->num_rows;
        } else {
        return 0;
        }
    }   


    /**
    * action delete: show form edit a like
    * method: GET
    */
    public function delete() {        
        $this->model->load('Like');
        // die($_GET['Users_id']);
        $this->model->Like->delete($_GET['Users_id'], $_GET['Songs_id']);

        go_back();
    }
}
