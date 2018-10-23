<?php 
class PlaylistDetail_Model{
    public $Playlists_id;
    public $Songs_id;

    public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from playlistsdetail';
		$result = mysqli_query($conn, $sql);
		$list_playlistdetail = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
            $playlistdetail = new PlaylistDetail_Model();
            $playlistdetail->Playlists_id = $row['Playlists_id'];
            $playlistdetail->Songs_id = $row['Songs_id'];
            $list_playlistdetail[] = $playlistdetail;          
        }

        return $list_playlistdetail;
	}

	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO playlistsdetail (Playlists_id, Songs_id) VALUES (?, ?)");
		$stmt->bind_param("ii", $this->Playlists_id, $this->Songs_id);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;		
		$stmt->close();
		return $rs;
	}

	public function delete($Playlists_id, $Songs_id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from playlistsdetail where Playlists_id ='.$Playlists_id . ' AND Songs_id = ' . $Songs_id;
		$result = mysqli_query($conn, $sql);

		return $result;
	}

	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE playlistsdetail SET Playlists_id=?, Songs_id=? WHERE id=?");
		$stmt->bind_param("iii", $this->Playlists_id, $this->Songs_id, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}
}
