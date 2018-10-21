<?php 
class Singer_Model{
	public $id;
	public $ten;
    public $thong_tin;
    public $anh;

    public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from singers';
		$result = mysqli_query($conn, $sql);
		$list_singer = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
            $singer = new Singer_Model();
            $singer->id = $row['id'];
            $singer->ten = $row['ten'];
            $singer->thong_tin = $row['thong_tin'];
            $singer->anh = 'public/img/singers/'.$row['anh'];
            $list_singer[] = $singer;            
        }

        return $list_singer;
	}

	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO singers (ten, thong_tin, anh) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $this->ten, $this->thong_tin, $this->anh);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;		
		$stmt->close();
		return $rs;
	}

	public function findById($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from singers where id='.$id;
		$result = mysqli_query($conn, $sql);

		if(!$result)
			die('Error: ');

		$row = mysqli_fetch_assoc($result);
        $singer = new Singer_Model();
        $singer->id = $row['id'];
        $singer->ten = $row['ten'];
        $singer->thong_tin = $row['thong_tin'];
        $singer->anh = 'public/img/singers/'.$row['anh'];

        return $singer;
	}

	public function delete(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from singers where id='.$this->id;
		$result = mysqli_query($conn, $sql);

		return $result;
	}

	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE singers SET ten=?, thong_tin=?, anh=? WHERE id=?");
		$stmt->bind_param("sssi", $this->ten, $this->thong_tin, $this->anh, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}
}
