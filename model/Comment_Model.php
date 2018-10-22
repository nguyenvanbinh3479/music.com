<?php 
class Comment_Model{
	public $id;
    public $Songs_id;
    public $Users_id;
    public $noi_dung;
    public $ngay;

    public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from comments';
		$result = mysqli_query($conn, $sql);
		$list_comment = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
            $comment = new Comment_Model();
            $comment->id = $row['id'];
            $comment->Songs_id = $row['Songs_id'];
            $comment->Users_id = $row['Users_id'];
            $comment->noi_dung = $row['noi_dung'];
            $comment->ngay = $row['ngay'];
            $list_comment[] = $comment;            
        }

        return $list_comment;
	}

	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO comments (Songs_id, Users_id, noi_dung, ngay) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("iiss", $this->Songs_id, $this->Users_id, $this->noi_dung, $this->ngay);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;		
		$stmt->close();
		return $rs;
	}

	public function findById($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from comments where id='.$id;
		$result = mysqli_query($conn, $sql);

		if(!$result)
			die('Error: ');

		$row = mysqli_fetch_assoc($result);
        $comment = new Comment_Model();
        $comment->id = $row['id'];      
        $comment->Songs_id = $row['Songs_id'];
        $comment->Users_id = $row['Users_id'];
        $comment->noi_dung = $row['noi_dung'];
        $comment->ngay = $row['ngay'];
	
        return $comment;
	}

	public function delete(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from comments where id='.$this->id;
		$result = mysqli_query($conn, $sql);

		return $result;
	}

	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE comments SET Songs_id=?, Users_id=?, noi_dung=?, ngay=? WHERE id=?");
		$stmt->bind_param("iissi", $this->Songs_id, $this->Users_id, $this->noi_dung, $this->ngay, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}
}
