<?php 
class Like_Model{
    public $Songs_id;
    public $Users_id;
	public $ngay;
	public $show = "";

    public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from likes';
		$result = mysqli_query($conn, $sql);
		$list_like = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
            $like = new Like_Model();
            $like->Songs_id = $row['Songs_id'];
            $like->Users_id = $row['Users_id'];
            $like->ngay = $row['ngay'];
            $list_like[] = $like;            
        }

        return $list_like;
	}

	public function save(){
	   $conn = FT_Database::instance()->getConnection();
	    if ($this->check_Like_exists($this->Songs_id, $this->Users_id) == 0) {
	      $stmt = $conn->prepare("INSERT INTO likes (Songs_id, Users_id, ngay) VALUES (?, ?, ?)");
	      $stmt->bind_param("iis", $this->Songs_id, $this->Users_id, $this->ngay);
	      $rs = $stmt->execute();
	      $stmt->close();
	      return true;
	    } else {
	      //$this->delete();
	      return false;
	    }
	}


	public function check_Like_exists($Songs_id, $Users_id) {
	    $conn = FT_Database::instance()->getConnection();
	    $stmt = $conn->prepare("SELECT * FROM likes WHERE Songs_id = ? AND Users_id = ?");
	    $stmt->bind_param("ii", $Songs_id, $Users_id);
	    $stmt->execute();
	    $stmt->store_result();
	    $stmt->fetch();

	    if ($stmt->num_rows > 0) {
	        return $stmt->num_rows;
	     } else {
	        return 0;
	     }
  	}


    public function num_likes($Songs_id) {
	    $conn = FT_Database::instance()->getConnection();
	    $sql = "SELECT COUNT($Songs_id) as luot_like FROM likes WHERE Songs_id = $Songs_id";
	    $result = mysqli_query($conn, $sql);
	    if(!$result)
	      die('Error: ');
	    $row = mysqli_fetch_assoc($result);
	    $luot_like = $row['luot_like'];
	    return $luot_like;
  	}

	public function delete($Songs_id, $Users_id){
		$conn = FT_Database::instance()->getConnection();
		if ($this->check_Like_exists($this->Songs_id, $this->Users_id) > 0){
			$sql = 'delete from likes where Songs_id = '.$Songs_id.' AND Users_id = '.$Users_id;
			mysqli_query($conn, $sql);

			return true;
		}else {
			return false;	
		}
	}

}
