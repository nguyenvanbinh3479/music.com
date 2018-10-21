<?php
class Category_Model{
	public $id;
    public $ten;
    public $anh;

    public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from categories';
		$result = mysqli_query($conn, $sql);
		$list_category = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
            $theloai = new Category_Model();
            $theloai->id = $row['id'];
            $theloai->ten = $row['ten'];
            $theloai->anh = 'public/img/types/'.$row['anh'];
            $list_category[] = $theloai;            
        }

        return $list_category;
	}

	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO categories (ten, anh) VALUES (?, ?)");
		$stmt->bind_param("ss", $this->ten, $this->anh);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;		
		$stmt->close();
		return $rs;
	}

	public function findById($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from categories where id='.$id;
		$result = mysqli_query($conn, $sql);

		if(!$result)
			die('Error: ');

		$row = mysqli_fetch_assoc($result);
        $theloai = new Category_Model();
        $theloai->id = $row['id'];
        $theloai->ten = $row['ten'];
        $theloai->anh = 'public/img/types/'.$row['anh'];

        return $theloai;
	}

	public function delete(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from categories where id='.$this->id;
		$result = mysqli_query($conn, $sql);

		return $result;
	}

	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE categories SET ten=?, anh=? WHERE id=?");
		$stmt->bind_param("ssi", $this->ten, $this->anh, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}
    
}