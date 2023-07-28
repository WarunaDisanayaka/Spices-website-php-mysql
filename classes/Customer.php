<?php
    include_once '../lib/Database.php';
    include_once '../helpers/Format.php';
?>
<?php
    class Customer{

        private $db;
        private $fm;
        public function __construct(){
            $this->db=new Database();
            $this->fm=new Format();
        }


        public function customerRegistration($data){

            $username=mysqli_real_escape_string($this->db->link,$data['username']);
            $email=mysqli_real_escape_string($this->db->link,$data['email']);
            $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
            $address=mysqli_real_escape_string($this->db->link,$data['address']);
            $city=mysqli_real_escape_string($this->db->link,$data['city']);
            $zip=mysqli_real_escape_string($this->db->link,$data['zip']);
            $password=mysqli_real_escape_string($this->db->link,md5($data['password']));
            
            if ($username == "" || $email== "" || $phone== "" || $address== "" || $city== "" || $zip== "" ||$password== "" ) {
                $msg="Fields must not be empty !";
                return $msg;
            }else{
    
                $mailCheckquery = "SELECT * FROM Buyer WHERE email='$email' LIMIT 1";
                $mailCheck = $this->db->select($mailCheckquery);

                if ($mailCheck !=false) {
                    $msg="Email already exist";
                    return $msg;
                }else{
                    $query="INSERT INTO Buyer(Username,Password,Email,Phone,Address,City,Zip) 
                VALUES('$username','$password','$email','$phone','$address','$city','$zip')";

                $customerinsert=$this->db->insert($query);
                if ($customerinsert) {
                $msg="Customer Registered Successfully";
                return $msg;
            }else{
                $msg="Customer Not Registered";
            return $msg;
                }
            }

                
            }
        }
        
    }
?>