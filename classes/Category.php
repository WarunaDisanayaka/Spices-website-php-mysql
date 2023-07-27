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

    }
?>