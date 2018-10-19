<?php 
class Song_Model{
	public $id;
	public $singer_id;
	public $album_id;
	public $category_id;
	public $author_id;
	public $ten;
	public $anh;
	public $loi;
	public $link;
	public $ngay;

    public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from songs';
		$result = mysqli_query($conn, $sql);
		$list_song = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
			$song = new Song_Model();
            $song->id = $row['id'];
			$song->singer_id = $row['singer_id'];
			$song->album_id = $row['album_id'];
			$song->category_id = $row['category_id'];
			$song->author_id = $row['author_id'];
            $song->ten = $row['ten'];
			$song->anh = $row['anh'];
			$song->loi = $row['loi'];
			$song->link = $row['link'];
			$song->ngay = $row['ngay'];
			$list_song[] = $song;  
        }
        return $list_song;
	}

	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO songs (song_id, album_id, categories_id, author_id, ten, anh, loi, link, ngay) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("iiiisssss", $this->song_id, $this->album_id, $this->category_id, $this->author_id, $this->ten, $this->anh, $this->loi, $this->link, $this->ngay);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;		
		$stmt->close();
		return $rs;
	}

	public function findById($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from songs where id='.$id;
		$result = mysqli_query($conn, $sql);

		if(!$result)
			die('Error: ');

		$row = mysqli_fetch_assoc($result);
        $song = new Song_Model();
        $song->id = $row['id'];
		$song->singer_id = $row['singer_id'];
        $song->album_id = $row['album_id'];
		$song->category_id = $row['category_id'];
		$song->author_id = $row['author_id'];
        $song->ten = $row['ten'];
		$song->anh = $row['anh'];
		$song->loi = $row['loi'];
		$song->link = $row['link'];
		$song->ngay = $row['ngay'];

        return $song;
	}

	public function delete(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from songs where id='.$this->id;
		$result = mysqli_query($conn, $sql);

		return $result;
	}

	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE songs SET singer_id=?, album_id=?, categories_id=?, author_id=?, ten=?, anh=?, loi=?, link=?, ngay=? WHERE id=?");
		$stmt->bind_param("iiiisssssi", $this->singer_id, $this->album_id, $this->category_id, $this->author_id, $this->ten, $this->anh, $this->loi, $this->link, $this->ngay, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}


    public function topFiveMusic(){
    	$list_song = array();
     	$conn = FT_Database::instance()->getConnection(); 
     	$sql = "SELECT songs.id,songs.ten as 'tenbaihat',  singers.ten as 'tencasi', songs.anh, 
         songs.link from songs, hears, singers, authors WHERE songs.id = hears.song_id && songs.singer_id = 
         singers.id && authors.id = songs.author_id GROUP BY hears.song_id 
         ORDER BY COUNT(songs.id) DESC limit 5";

     	$result = mysqli_query($conn, $sql);
     	if(!$result)
			die('Error: '.mysqli_query_error());

		if ($result->num_rows > 0) {
			while ($row = mysqli_fetch_assoc($result)){
			$song = new Song_Model();
	        $song->id = $row['id'];
	        $song->ten = $row['tenbaihat'];
			$song->casi_id = $row['tencasi'];
			$song->anh = $row['anh'];
			$song->link = $row['link'];
			array_push($list_song, $song); 
	        }
	        return $list_song;
		}else {
			return 0;
		}
		
    }

    public function newMusic(){
    	$list_baihat = array();
    	$conn = FT_Database::instance()->getConnection(); 
    	$sql = "";
    	
    	$result = mysqli_query($conn, $sql);
     	if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
			$song = new Song_Model();
	        $song->id = $row['id'];
	        $song->ten = $row['tenbaihat'];
			$song->singer_id = $row['tencasi'];
			$song->anh = $row['anh'];
			$song->link = $row['link'];
			$song->ngay = $row['ngay'];
			array_push($list_song, $song); 
        }
        return $list_song;
    }

    public function findSongsFromPlaylist($id){
		$conn = FT_Database::instance()->getConnection();

		$sql ="SELECT songs.id, songs.ten, songs.anh, singers.ten as 'ten_casi', songs.link 
        FROM songs, playlistsdetail, singers 
        WHERE playlistsdetal.song_id = songs.id && 
        songs.singer_id = singers.id && playlistsdetail.playlist_id = " . $id;
		
		$result = mysqli_query($conn, $sql);
		$songs = array();

		if(!$result)
			die('Error: ');

		if ($result->num_rows > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		    $song = new Song_Model();
		    $song->id = $row['id'];
		    $song->ten = $row['ten'];
		    $song->singer_id = $row['ten_casi'];
		    $song->anh = $row['anh'];
		    $song->link = $row['link'];

		    array_push($songs, $song);
		}
		
		}else {
			return 0;
		}
		return $songs;
	}

	public function InfoMusic($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = "SELECT songs.id, songs.ten as 'ten_bai_hat', singers.ten as 'ten_ca_si', 
        categories.ten as 'ten_the_loai', authors.ten as 'ten_tac_gia', songs.anh, 
        songs.loi_bai_hat, songs.link, songs.ngay FROM songs, categories, authors, 
        singers WHERE songs.singer_id = singers.id && songs.author_id = authors.id && 
        songs.categorie_id = categories.id && songs.id = " . $id;

		$result = mysqli_query($conn, $sql);
		$song = new Song_Model();

		if(!$result)
			die('Error: ');

		if ($result->num_rows > 0) {
			$row = mysqli_fetch_assoc($result);
			$song->id = $row['id'];
			$song->singer_id = $row['ten_ca_si'];
			$song->category_id = $row['ten_the_loai'];
			$song->author_id = $row['ten_tac_gia'];
			$song->ten = $row['ten_bai_hat'];
			$song->anh = $row['anh'];
			$song->loi = $row['loi_bai_hat'];
			$song->link = $row['link'];
			$song->ngay = $row['ngay'];

			return $song;
		}else {
			return 0;
		}
		
	}

	public function showBaiHatYeuThichFromID($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = "SELECT songs.id, songs.ten, singers.ten as 'ten_ca_si', songs.anh, 
        songs.link FROM songs, singers, likes WHERE songs.singer_id = singers.id && 
        songs.id = likes.song_id && likes.user_id = " . $id;

		$result = mysqli_query($conn, $sql);
		$songs = array();

		if(!$result)
			die('Error: ');
		if ($result->num_rows > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
		    $song = new Song_Model();
		    $song->id = $row['id'];
		    $song->ten = $row['ten'];
		    $song->singer_id = $row['ten_ca_si'];
		    $song->anh = $row['anh'];
		    $song->link = $row['link'];

		    array_push($songs, $song);
			}
		return $songs;
		}else {
			return 0;
		}

	}

	public function LuotNgheTuIDBaiHat($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = "SELECT COUNT(hears.user_id) as 'hear' FROM hears 
        WHERE hears.song_id = " . $id;
		$result = mysqli_query($conn, $sql);
		if(!$result)
			die('Error: ');
		if ($result->num_rows > 0) {
			$result = mysqli_fetch_assoc($result);
			return $result['luotnghe'];
		}else {
			return -1;
		}
	}

	public function LuotThichTheoIDBaiHat($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = "SELECT COUNT(likes.user_id) as 'luotthich' FROM likes 
        WHERE likes.baihat_id = " . $id;
		$result = mysqli_query($conn, $sql);
		if(!$result)
			die('Error: ');
		if ($result->num_rows > 0) {
			$result = mysqli_fetch_assoc($result);
			return $result['luotthich'];
		}else {
			return -1;
		}
	}

	public function getLyric($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = "SELECT loi FROM songs WHERE id = " . $id;
	
		$result = mysqli_query($conn, $sql);
		if(!$result)
		die('Error: ');

		if ($result->num_rows > 0) {
			$result = mysqli_fetch_assoc($result);
			return $result['loi_bai_hat'];	
		}else {
			return 0;
		}
	}

}
 ?>