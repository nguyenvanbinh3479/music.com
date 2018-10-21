<?php
class Author_Model{
  public $id;
  public $anh;
  public $ten;
  public $thong_tin;

    public function all(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from authors';
    $result = mysqli_query($conn, $sql);
    $list_author = array();

    if(!$result)
      die('Error: '.mysqli_query_error());

    while ($row = mysqli_fetch_assoc($result)){
            $tacgia = new Author_Model();
            $tacgia->id = $row['id'];
            $tacgia->anh = 'public/img/authors/'.$row['anh'];
            $tacgia->ten = $row['ten'];
            $tacgia->thong_tin = $row['thong_tin'];
            $list_author[] = $tacgia;
        }

        return $list_author;
  }

  public function save(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("INSERT INTO authors (anh, ten, thong_tin) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $this->anh, $this->ten, $this->thong_tin);
    $rs = $stmt->execute();
    $this->id = $stmt->insert_id;
    $stmt->close();
    return $rs;
  }

  public function findById($id){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'select * from authors where id='.$id;
    $result = mysqli_query($conn, $sql);

    if(!$result)
      die('Error: ');

        $row = mysqli_fetch_assoc($result);
        $tacgia = new Author_Model();
        $tacgia->id = $row['id'];
        $tacgia->anh = 'public/img/authors/'.$row['anh'];
        $tacgia->ten = $row['ten'];
        $tacgia->thong_tin = $row['thong_tin'];

        return $tacgia;
  }

  public function delete(){
    $conn = FT_Database::instance()->getConnection();
    $sql = 'delete from authors where id='.$this->id;
    $result = mysqli_query($conn, $sql);

    return $result;
  }

  public function update(){
    $conn = FT_Database::instance()->getConnection();
    $stmt = $conn->prepare("UPDATE authors SET anh=?, ten=?, thong_tin=? WHERE id=?");
    $stmt->bind_param("sssi", $this->anh, $this->ten, $this->thong_tin, $_POST['id']);
    $stmt->execute();
    $stmt->close();
  }

}
