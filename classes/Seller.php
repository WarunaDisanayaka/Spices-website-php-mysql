<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
    include '../lib/Session.php';
?>
<?php
    class Seller{

        private $db;
        private $fm;
        public function __construct(){
            $this->db=new Database();
            $this->fm=new Format();
        }

        public function sellerLogin($sellerUser,$sellerPass){   
            $sellerUser = $this->fm->validation($sellerUser);
            $sellerPass = $this->fm->validation($sellerPass);

            $sellerUser = mysqli_real_escape_string($this->db->link,$sellerUser);
            $sellerPass = mysqli_real_escape_string($this->db->link,$sellerPass);

            if (empty($sellerUser) || empty($sellerPass)) {
                $loginmsg="Username or Password must not be empty !";
                return $loginmsg;
            }else{
                $query="SELECT * FROM Seller WHERE Email='$sellerUser' AND Password='$sellerPass'";

                $result=$this->db->select($query);

                if ($result !=false) {
                    $value=$result->fetch_assoc();
                    Session::set("sellerlogin",true);
                    Session::set("sellerId",$value['SellerID']);
                    Session::set("sellerName",$value['Username']);
                    header("Location:dashboard.php");
                }else{
                    $loginmsg="Username or Password not match !";
                    return $loginmsg;
                }

            }

    }


    }
?>