<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>
<?php
    class Product{

        private $db;
        private $fm;
        public function __construct(){
            $this->db=new Database();
            $this->fm=new Format();
        }
    
        public function productInsert($data,$file){
            $productName=mysqli_real_escape_string($this->db->link,$data['name']);
            $catId=mysqli_real_escape_string($this->db->link,$data['CategoryId']);
            $description=mysqli_real_escape_string($this->db->link,$data['description']);
            $price=mysqli_real_escape_string($this->db->link,$data['price']);
            $stock=mysqli_real_escape_string($this->db->link,$data['qty']);
            $size=mysqli_real_escape_string($this->db->link,$data['size']);

            $premited=array('jpg','jpeg','png','gif');
            $file_name=$_FILES['image']['name'];
            $file_size=$_FILES['image']['size'];
            $file_temp=$_FILES['image']['tmp_name'];

            $div=explode('.',$file_name);
            $file_ext=strtolower(end($div));
            $unique_image=substr(md5(time()),0,10).'.'.$file_ext;
            $uploaded_image="upload/".$unique_image;

            if ($productName == "" || $catId=="" ||  $description=="" || $price=="" || $stock=="" || $size=="" ) {
                $msg="Fields must not be empty !";
                return $msg;
            }else{
                move_uploaded_file($file_temp,$uploaded_image);
                $query="INSERT INTO Product(CategoryId,Name,Description,Image,Price,Stock,Size) 
                VALUES('$catId','$productName','$description','$uploaded_image','$price','$stock','$size')";

                $productinsert=$this->db->insert($query);
                if ($productinsert) {
                    $msg="Product Inserted Successfully";
                    return $msg;
                }else{
                    $msg="Product Not Inserted";
                    return $msg;
                }
            }
        }


        public function getAllCat(){
           
        }


        public function getCatById($id){
            
        }

        public function catUpdate($catName,$id){
           
        }


        public function delByCatId($id){
            
        }


    }
?>