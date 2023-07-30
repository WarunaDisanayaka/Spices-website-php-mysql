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
                $msg="<p class='text' style='color:red;'>Fields must not be empty! </p>";
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
               // Sending email notification
               $emailSubject = "Registration Successful";
               $emailBody = "Dear $username,\n\nThank you for registering on our website. Your account has been successfully created.";
               $emailHeaders = "From: waruna@gmail.com"; // Replace with your email address

               if (mail($email, $emailSubject, $emailBody, $emailHeaders)) {
                   $msg = "Customer Registered Successfully. An email notification has been sent.";
               } else {
                   $msg = "Customer Registered Successfully, but the email notification could not be sent.";
               }

               return $msg;
            }else{
                $msg="Customer Not Registered";
            return $msg;
                }
            }

                
            }
        }

        public function customerLogin($data){

            $email=mysqli_real_escape_string($this->db->link,$data['email']);
            $password=mysqli_real_escape_string($this->db->link,md5($data['password']));
            
            if ($email== "" || $password== "" ) {
                $msg="<p class='text' style='color:red;'>Fields must not be empty! </p>";
                return $msg;
            }else{
    
                $query = "SELECT * FROM Buyer WHERE email='$email' LIMIT 1";
                $result = $this->db->select($query);

                if ($result !=false) {
                    $value=$result->fetch_assoc();
                    Session::set("cuslogin",true);
                    Session::set("cusId",$value['BuyerID']);
                    Session::set("cusName",$value['Username']);
                    header("Location:profile.php");
                }else{
                    $msg="<p class='text' style='color:red;'>Email or Password Not matched! </p>";
                    return $msg;
                }
            }
        }

        public function getCustomerData($id){
            $query="SELECT * FROM Buyer WHERE BuyerID='$id'";
            $result=$this->db->select($query);
            return $result;
        }

        public function updateCustomerData($data,$id){

            $username=mysqli_real_escape_string($this->db->link,$data['username']);
            $email=mysqli_real_escape_string($this->db->link,$data['email']);
            $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
            $address=mysqli_real_escape_string($this->db->link,$data['address']);
            $city=mysqli_real_escape_string($this->db->link,$data['city']);
            $zip=mysqli_real_escape_string($this->db->link,$data['zip']);
            $password=mysqli_real_escape_string($this->db->link,md5($data['password']));
            
            if ($username == "" || $email== "" || $phone== "" || $address== "" || $city== "" || $zip== "" ||$password== "" ) {
                $msg="<p class='text' style='color:red;'>Fields must not be empty! </p>";
                return $msg;
            }else{
    
                $query = "UPDATE 
                Buyer SET 
                Username='$username', 
                Password='$password', 
                Email='$email', 
                Phone='$phone' ,
                Address='$address', 
                City='$city', 
                Zip='$zip'  
                WHERE BuyerID='$id'";

                $updateCustomer = $this->db->update($query);

                if ($updateCustomer) {
                $msg="Customer Updated Successfully";
                return $msg;
            }else{
                $msg="Customer Not Updated";
            return $msg;
                }
            }

                
            }



            public function sellerRegistration($data){

                $username=mysqli_real_escape_string($this->db->link,$data['username']);
                $email=mysqli_real_escape_string($this->db->link,$data['email']);
                $phone=mysqli_real_escape_string($this->db->link,$data['phone']);
                $address=mysqli_real_escape_string($this->db->link,$data['address']);
                $password=mysqli_real_escape_string($this->db->link,md5($data['password']));
                
                if ($username == "" || $email== "" || $phone== "" || $address== ""  ||$password== "" ) {
                    $msg="<p class='text' style='color:red;'>Fields must not be empty! </p>";
                    return $msg;
                }else{
        
                    $mailCheckquery = "SELECT * FROM Seller WHERE Email='$email' LIMIT 1";
                    $mailCheck = $this->db->select($mailCheckquery);
    
                    if ($mailCheck !=false) {
                        $msg="Email already exist";
                        return $msg;
                    }else{
                        $query="INSERT INTO Seller(Username,Password,Email,Phone,Address) 
                    VALUES('$username','$password','$email','$phone','$address')";
    
                    $customerinsert=$this->db->insert($query);
                    if ($customerinsert) {
                   // Sending email notification
                   $emailSubject = "Registration Successful";
                   $emailBody = "Dear $username,\n\nThank you for registering on our website. Your account has been successfully created.";
                   $emailHeaders = "From: waruna@gmail.com"; // Replace with your email address
    
                   if (mail($email, $emailSubject, $emailBody, $emailHeaders)) {
                       $msg = "Customer Registered Successfully. An email notification has been sent.";
                   } else {
                       $msg = "Customer Registered Successfully, but the email notification could not be sent.";
                   }
    
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