<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class PlaylistDetail_Controller extends Base_Controller
{
    /**
    * action index: show all playlistsdetail
    * method: GET
    */
    public function index()
    {        
        $this->model->load('PlaylistDetail');
        $this->model->load('Song');
        $this->model->load('PlayList');
        $list_playlistdetail = $this->model->PlaylistDetail->all();
        $list_song = $this->model->Song->all();
        $list_playlist = $this->model->PlayList->all();
        $data = array(
            'title' => 'index',
            'list_playlistdetail' => $list_playlistdetail,
            'list_song' => $list_song,
            'list_playlist' => $list_playlist
        );

        // Load view
        $this->view->load('playlistsdetail/index', $data);
    }

    /**
    * action show: show a playlistdetail
    * method: GET
    */
    public function show()
    {        
        $this->model->load('PlaylistDetail');
        $playlistdetail = $this->model->PlaylistDetail->findById($_GET['id']);
        $data = array(
            'title' => 'show',
            'playlistdetail' => $playlistdetail     
        );

        // Load view
        $this->view->load('playlistsdetail/show', $data);
    }

    /**
    * action create: create a playlistdetail
    * method: GET
    */
    public function create()
    {        
        $this->model->load('Song');
        $this->model->load('PlayList');

        $list_song = $this->model->Song->all();
        $list_playlist = $this->model->PlayList->all(); 

        $data = array(
            'title' => 'index',
            'list_song' => $list_song,
            'list_playlist' => $list_playlist            
        );
        $this->view->load('playlistsdetail/create',$data);
    }

     /**
    * action store: save a playlistdetail to database
    * method: POST
    */
    public function store()
    {        
        $this->model->load('PlaylistDetail');
        $this->model->PlaylistDetail->Playlists_id = $_POST['Playlists_id'];
        $this->model->PlaylistDetail->Songs_id = $_POST['Songs_id'];
        
        $this->model->PlaylistDetail->save();

        go_back();
    }

    /**
    * action edit: show form edit a playlistdetail
    * method: GET
    */
    public function edit()
    {        
        $this->model->load('PlaylistDetail');
        $this->model->load('Song');
        $this->model->load('PlayList');

        $playlistdetail = $this->model->PlaylistDetail->findById($_GET['id']);
        $list_song = $this->model->Song->all();
        $list_playlist = $this->model->PlayList->all(); 

        $data = array(
            'title' => 'edit',
            'playlistdetail' => $playlistdetail,
            'list_song' => $list_song,
            'list_playlist' => $list_playlist  
        );

        // Load view
        $this->view->load('playlistsdetail/edit', $data);
    }

    /**
    * action edit: update playlistdetail database
    * method: POST
    */
    public function update()
    {        

        $this->model->load('PlaylistDetail');
        $playlistdetail = $this->model->PlaylistDetail->findById($_POST['id']);
        $playlistdetail->Playlists_id = $_POST['Playlists_id'];
        $playlistdetail->Songs_id = $_POST['Songs_id'];        
        $playlistdetail->update();

        go_back();
    }

    public function check_exist() {
        $conn = FT_Database::instance()->getConnection();
        $stmt = $conn->prepare("SELECT * FROM playlists WHERE Playlists_id = ? AND Songs_id = ?");

        $stmt->bind_param("ii", $Playlists_id, $Songs_id);

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
    * action delete: show form edit a playlistdetail
    * method: GET
    */
    public function delete() {        
        $this->model->load('PlaylistDetail');
        // die($_GET['Playlists_id']);
        $this->model->PlaylistDetail->delete($_GET['Playlists_id'], $_GET['Songs_id']);

        go_back();
    }
}
