<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>
<?php
    class Category{

        private $db;
        private $fm;
        public function __construct(){
            $this->db=new Database();
            $this->fm=new Format();
        }
    
        public function catInsert($catName){
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link,$catName);

            if (empty($catName)) {
                $msg="Fields must not be empty !";
                return $msg;
            }else{
                $query="INSERT INTO Category(CategoryName) VALUES ('$catName')";

                $catinsert=$this->db->insert($query);
                if ($catinsert) {
                    $msg="Category Inserted Successfully";
                    return $msg;
                }else{
                    $msg="Category Not Inserted";
                    return $msg;
                }
            }
        }


        public function getAllCat(){
            $query="SELECT * FROM Category ORDER BY CategoryId DESC";
            $result=$this->db->select($query);
            return $result;
        }


        public function getCatById($id){
            $query="SELECT * FROM Category WHERE CategoryId='$id'";
            $result=$this->db->select($query);
            return $result;
        }

        public function catUpdate($catName,$id){
            $id=mysqli_real_escape_string($this->db->link,$id);
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link,$catName);

            if (empty($catName)) {
                $msg="Fields must not be empty !";
                return $msg;
            }else{
                $query="UPDATE Category SET CategoryName='$catName' WHERE CategoryId='$id'";

                $catupdate=$this->db->update($query);
                if ($catupdate) {
                    $msg="Category Updated Successfully";
                    header("Location:categories.php");
                    return $msg;
                }else{
                    $msg="Category Not Updated";
                    return $msg;
                }
            }
        }


        public function delByCatId($id){
            $query="DELETE FROM Category WHERE  CategoryId='$id'";
            $deldata=$this->db->delete($query);
            if ($deldata) {
                $msg="Category Deleted Successfully!";
            }else{
                $msg="Category Not Deleted";
            }
        }


    }
?>