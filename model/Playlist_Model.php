<?php
class Playlist_Model{
    public $id;
	public $Users_id;
    public $ten;
	public $anh;
	public $ngay;

    public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from playlists';
		$result = mysqli_query($conn, $sql);
		$list_playlist = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
            $playlist = new Playlist_Model();
            $playlist->id = $row['id'];
			$playlist->Users_id = $row['Users_id'];
            $playlist->ten = $row['ten'];
			$playlist->anh = $row['anh'];
			$playlist->ngay = $row['ngay'];
			
            $list_playlist[] = $playlist;            
        }

        return $list_playlist;
	}

	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO playlists (Users_id, ten, anh, ngay) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("isss", $this->Users_id, $this->ten, $this->anh, $this->ngay);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;		
		$stmt->close();
		return $rs;
	}

	public function findById($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from playlists where id='.$id;
		$result = mysqli_query($conn, $sql);

		if(!$result)
			die('Error: ');

		$row = mysqli_fetch_assoc($result);
        $playlist = new Playlist_Model();
        $playlist->id = $row['id'];
        $playlist->Users_id = $row['Users_id'];
        $playlist->ten = $row['ten'];
        $playlist->anh = $row['anh'];
        $playlist->ngay = $row['ngay'];
        return $playlist;
	}

	public function delete(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from playlists where id='.$this->id;
		$result = mysqli_query($conn, $sql);

		return $result;
	}

	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE playlists SET Users_id=?, ten=?, anh=?, ngay=? WHERE id=?");
		$stmt->bind_param("isssi", $this->Users_id, $this->ten, $this->anh, $this->ngay, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}

}