<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>
<?php
    class Cart{

        private $db;
        private $fm;
        public function __construct(){
            $this->db=new Database();
            $this->fm=new Format();
        }


        public function addToCart($quantity,$id){
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);
            $productId = mysqli_real_escape_string($this->db->link,$id);
            $sId=session_id();

            $query="SELECT * FROM Product WHERE ProductID='$productId'";
            $result=$this->db->select($query)->fetch_assoc();

            $productName= $result['Name'];
            $price = $result['Price'];
            $Image = $result['Image'];

            $query=
            "INSERT INTO Cart (ProductID,Name,Image,Price,Sid,Qty) 
            VALUES('$productId','$productName','$Image','$price','$sId','$quantity')";

            $Inserted_row=$this->db->insert($query);

            if ($Inserted_row) {
                header("Location:cart.php");
            }

        }

    }
?>