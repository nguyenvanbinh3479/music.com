<?php 
class Like_Model{
    public $Users_id;
    public $Songs_id;
	public $ngay;

    public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from likes';
		$result = mysqli_query($conn, $sql);
		$list_like = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
            $like = new Like_Model();
            $like->Users_id = $row['Users_id'];
            $like->Songs_id = $row['Songs_id'];
            $like->ngay= $row['ngay'];
            $list_like[] = $like;          
        }

        return $list_like;
	}

	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO likes (Users_id, Songs_id, ngay) VALUES (?, ?, ?)");
		$stmt->bind_param("iis", $this->Users_id, $this->Songs_id, $this->ngay);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;		
		$stmt->close();
		return $rs;
	}

	public function delete($Users_id, $Songs_id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from likes where Users_id ='.$Users_id . ' AND Songs_id = ' . $Songs_id;
		$result = mysqli_query($conn, $sql);

		return $result;
	}

	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE likes SET Users_id=?, Songs_id=?, ngay=? WHERE id=?");
		$stmt->bind_param("iisi", $this->Users_id, $this->Songs_id, $this->ngay, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}
}
