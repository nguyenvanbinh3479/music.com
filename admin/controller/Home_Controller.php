<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Home_Controller extends Base_Controller
{

    public function index()
    {        
        $this->model->load("Album");
        $this->model->load("Song");
        $this->model->load("Comment");
        $this->model->load("Singer");
        $this->model->load("PlaylistDetail");
        $this->model->load("Hear");
        $this->model->load("Playlist");
        $this->model->load("Author");
        $this->model->load("Category");
        $this->model->load("User");
        $this->model->load("Like");
        $list_album = $this->model->Album->all();
        $list_song = $this->model->Song->all();
        $list_comment = $this->model->Comment->all();
        $list_singer = $this->model->Singer->all();
        $list_playlistdetail = $this->model->PlaylistDetail->all();
        $list_hear = $this->model->Hear->all();
        $list_playlist = $this->model->Playlist->all();
        $list_author = $this->model->Author->all();
        $list_category = $this->model->Category->all();
        $list_user = $this->model->User->all();
        $list_like = $this->model->Like->all();

        $data = array(
            'title' => 'home',
            'list_album' => $list_album,
            'list_song' => $list_song,
            'list_comment' => $list_comment,
            'list_singer' => $list_singer,
            'list_playlistdetail' => $list_playlistdetail,
            'list_hear' => $list_hear,
            'list_playlist' => $list_playlist,
            'list_author' => $list_author,
            'list_category' => $list_category,
            'list_user' => $list_user,
            'list_like' => $list_like
        );

        // Load view
        $this->view->load('home/home',$data);
    }

}