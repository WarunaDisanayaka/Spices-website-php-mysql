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

            $checkquery="SELECT * FROM Cart WHERE ProductID='$productId' AND Sid='$sId'";
            $getCartPro=$this->db->select($checkquery);
            if ($getCartPro) {
                $msg="Product Already Added";
                return $msg;
            }else{

            $query=
            "INSERT INTO Cart (ProductID,Name,Image,Price,Sid,Qty) 
            VALUES('$productId','$productName','$Image','$price','$sId','$quantity')";

            $Inserted_row=$this->db->insert($query);

            if ($Inserted_row) {
                header("Location:cart.php");
            }
          }
        }

        public function getCartProduct(){
            $sId=session_id();
            $query="SELECT * FROM Cart WHERE Sid='$sId'";
            $result=$this->db->select($query);
            return $result;

        }

        public function updateCartQty($cartId,$quantity){
            $cartId = mysqli_real_escape_string($this->db->link,$cartId);
            $quantity = mysqli_real_escape_string($this->db->link,$quantity);

            $query="UPDATE Cart SET Qty='$quantity' WHERE Id='$cartId'";

                $cartupdate=$this->db->update($query);
                if ($cartupdate) {
                    $msg="Cart Updated Successfully";
                    header("Location:cart.php");
                    return $msg;
                }else{
                    $msg="Cart Not Updated";
                    return $msg;
                }
        }

        public function delByCartId($id){
            $query="DELETE FROM Cart WHERE  Id='$id'";
            $deldata=$this->db->delete($query);
            if ($deldata) {
                $msg="Category Deleted Successfully!";
            }else{
                $msg="Category Not Deleted";
            }
        }

        public function delCustomerData(){
            $sId=session_id();
            $query="DELETE FROM Cart WHERE Sid='$sId'";
            $this->db->delete($query);
        }


        public function orderProduct($cusId) {
            $sId = session_id();
            $query = "SELECT * FROM Cart WHERE Sid='$sId'";
            $getPro = $this->db->select($query);
            if ($getPro) {
                while ($result = $getPro->fetch_assoc()) {
                    $productId = $result['ProductID'];
                    $productName = $result['Name'];
                    $quantity = $result['Qty'];
                    $price = $result['Price'];
                    // $image=$result['Image'];
                    $total = $quantity * $price;
                    $status = "pending";
        
                    $query = "INSERT INTO 
                    Orders
                    (BuyerID, ProductID, ProductName, Quantity, Price, Total, Status)
                    VALUES
                    ('$cusId', '$productId', '$productName', '$quantity', '$price', '$total', '$status')";
        
                    $addOrder = $this->db->insert($query);
                    if (!$addOrder) {
                        $msg = "Category Not Inserted";
                        return $msg;
                    }
                }
                $msg = "Category Inserted Successfully";
                return $msg;
            }
        }

        public function getOrders($cusId){
                $query="SELECT * FROM Orders WHERE BuyerID='$cusId'";
                $result=$this->db->select($query);
                return $result;
        }




        public function getAllOrders(){
            $query = "SELECT * FROM Orders JOIN Buyer ON Orders.BuyerID = Buyer.BuyerID";
            $result=$this->db->select($query);
            return $result;
        }


        public function updateOrder($orderId,$status){
            $query = "UPDATE Orders SET Status='$status' WHERE OrderID='$orderId'";
            $result=$this->db->update($query);
            return $result;
        }
        

    }
?>