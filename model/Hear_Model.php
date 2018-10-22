<?php
class Hear_Model{
	public $id;
	public $Songs_id;
	public $Users_id;
	public $ngay;

	public function all(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from hears';
		$result = mysqli_query($conn, $sql);
		$list_hear = array();

		if(!$result)
			die('Error: '.mysqli_query_error());

		while ($row = mysqli_fetch_assoc($result)){
            $hear = new Hear_Model();
            $hear->id = $row['id'];
            $hear->Songs_id = $row['Songs_id'];
            $hear->Users_id = $row['Users_id'];
            $hear->ngay = $row['ngay'];
            $list_hear[] = $hear;            
        }

        return $list_hear;
	}

	public function save(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("INSERT INTO hears (Songs_id, Users_id, ngay) VALUES (?, ?, ?)");
		$stmt->bind_param("iis", $this->Songs_id, $this->Users_id, $this->ngay);
		$rs = $stmt->execute();
		$this->id = $stmt->insert_id;		
		$stmt->close();
		return $rs;
	}

	public function findById($id){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'select * from hears where id='.$id;
		$result = mysqli_query($conn, $sql);

		if(!$result)
			die('Error: ');

		$row = mysqli_fetch_assoc($result);
        $hear = new Hear_Model();
        $hear->id = $row['id'];
        $hear->Songs_id = $row['Songs_id'];
        $hear->Users_id = $row['Users_id'];
        $hear->ngay = $row['ngay'];

        return $hear;
	}

	public function delete(){
		$conn = FT_Database::instance()->getConnection();
		$sql = 'delete from hears where id='.$this->id;
		$result = mysqli_query($conn, $sql);

		return $result;
	}

	public function update(){
		$conn = FT_Database::instance()->getConnection();
		$stmt = $conn->prepare("UPDATE hears SET Songs_id=?, Users_id=?, ngay=? WHERE id=?");
		$stmt->bind_param("iisi", $this->Songs_id, $this->Users_id, $this->ngay, $_POST['id']);
		$stmt->execute();
		$stmt->close();
	}

	// public function login($Songs_id, $Users_id)
	// {
	// 	$conn = FT_Database::instance()->getConnection();
	// 	$sql = "SELECT * FROM hears WHERE Songs_id = '" . $Songs_id . "' and Users_id = '" . $Users_id . "'";
	// 	$result = mysqli_query($conn, $sql);

	// 	if(!$result)
	// 		die('Error: ');

	// 	$row = mysqli_fetch_assoc($result);
 //        $hear = new Hear_Model();
 //        $hear->id = $row['id'];
 //        $hear->Songs_id = $row['Songs_id'];
 //        $hear->Users_id = $row['Users_id'];
 //        $hear->ngay = $row['ngay'];

 //        return $hear;
	// }

	public function checkUser($Users_id){
		$conn = FT_Database::instance()->getConnection();
		$sql = "SELECT * FROM users WHERE id = " . $Users_id;
		$result = mysqli_query($conn, $sql);
		if(!$result)
			die('Error: ');
		if (mysqli_num_rows($result) > 0) {
			return true;
		}else {
			return false;
		}
	}

	public function checkBaiHat($Songs_id){
		$conn = FT_Database::instance()->getConnection();
		$sql = "SELECT * FROM songs WHERE id = " . $Songs_id;
		$result = mysqli_query($conn, $sql);
		if(!$result)
			die('Error: ');
		if (mysqli_num_rows($result) > 0) {
			return true;
		}else {
			return false;
		}
	}

	public function PlusMusic($Songs_id, $Users_id, $ngay){
		$conn = FT_Database::instance()->getConnection();

		if ($this->checkUser($Users_id) && $this->checkBaiHat($Songs_id)) {
			$sql = "INSERT INTO hears(Songs_id, Users_id, ngay)
			 VALUES(" . $Songs_id . "," . $Users_id . "," . $ngay .") ";
			 mysqli_query($conn, $sql);
			 return 1;
		}else {
			return 0;
		}
	}
}