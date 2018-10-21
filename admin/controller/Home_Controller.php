<?php if ( ! defined('PATH_SYSTEM')) die ('Bad requested!');

class Home_Controller extends Base_Controller
{

    public function index()
    {        
        // $this->model->load("Album");
        $this->model->load("Song");
        // $this->model->load("BinhLuan");
        // $this->model->load("CaSi");
        // $this->model->load("ChiTietPlayList");
        // $this->model->load("LuotNghe");
        // $this->model->load("Playlist");
        // $this->model->load("TacGia");
        // $this->model->load("TheLoai");
        $this->model->load("User");
        // $this->model->load("YeuThich");
        // $list_album = $this->model->Album->all();
        $list_song = $this->model->Song->all();
        // $list_binhluan = $this->model->BinhLuan->all();
        // $list_casi = $this->model->CaSi->all();
        // $list_chitietplaylist = $this->model->ChiTietPlayList->all();
        // $list_luotnghe = $this->model->LuotNghe->all();
        // $list_playlist = $this->model->Playlist->all();
        // $list_tacgia = $this->model->TacGia->all();
        // $list_theloai = $this->model->TheLoai->all();
        $list_user = $this->model->User->all();
        // $list_yeuthich = $this->model->YeuThich->all();

        $data = array(
            'title' => 'home',
            // 'list_album' => $list_album,
            'list_song' => $list_song,
            // 'list_binhluan' => $list_binhluan,
            // 'list_casi' => $list_casi,
            // 'list_chitietplaylist' => $list_chitietplaylist,
            // 'list_luotnghe' => $list_luotnghe,
            // 'list_playlist' => $list_playlist,
            // 'list_tacgia' => $list_tacgia,
            // 'list_theloai' => $list_theloai,
            'list_user' => $list_user,
            // 'list_yeuthich' => $list_yeuthich
        );

        // Load view
        $this->view->load('home/home',$data);
    }

}