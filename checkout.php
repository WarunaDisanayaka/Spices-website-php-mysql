<?php
   require 'navigation.php';
   ?>
   <?php
    $login = Session::get("cuslogin");
    if ($login == true) {
        
    }
?>
<?php
    if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['place'])) {
        $cusId=Session::get("cusId");
        $insertOrder=$ct->orderProduct($cusId);
        $delCartData=$ct->delCustomerData();
     }
?>
<!-- Hero section start-->
<section class="hero" style="background-image: url('img/shopbanner.webp');">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6">
            <h1 class="hero-title"></h1>
         </div>
      </div>
   </div>
</section>
<!-- Hero section end -->
<!-- Register start -->
<div class="container mt-5 mb-5">
   <?php
      // Form is invalid. Show the errors to the user.
      if (!empty($errors)) {
         echo '<div class="alert alert-danger" role="alert">';
         foreach ($errors as $error) {
            echo '<p>' . $error . '</p>';
         }
         echo '</div>';
      }
      ?>
   <div class="row">
      <div class="col-sm-8">
      <?php
                     $id=Session::get("cusId");
                     $getdata=$cr->getCustomerData($id);
                     if ($getdata) {
                        while ($result=$getdata->fetch_assoc()) {
                  ?>
         <form method="POST" class="row g-3">
            <div class="col-md-12">
               <label for="inputEmail4" class="form-label">Full name</label>
               <input type="text" name="fname" class="form-control" id="inputEmail4" value="<?php echo $result['Username']?>">
            </div>
            <div class="col-12">
               <label for="inputAddress" class="form-label">Email</label>
               <input type="text" name="email" class="form-control" id="inputAddress" placeholder="" value="<?php echo $result['Email']?>">
            </div>
            <div class="col-12">
               <label for="inputAddress" class="form-label">Phone</label>
               <input type="text" name="phone" class="form-control" id="inputAddress" placeholder="" value="<?php echo $result['Phone']?>">
            </div>
            <div class="row g-3">
               <div class="col-sm-7">
               <label for="inputAddress" class="form-label">City</label>
                  <input type="text" name="city" class="form-control" placeholder="City" aria-label="City" value="<?php echo $result['City']?>">
               </div>
               <div class="col-sm">
               <label for="inputAddress" class="form-label">Zip</label>
                  <input type="text" name="zip" class="form-control" placeholder="Zip" aria-label="Zip" value="<?php echo $result['Zip']?>">
               </div>
            </div>
            <div class="form-group">
               <label for="exampleFormControlTextarea1">Address</label>
               <input type="text" name="address" class="form-control" placeholder="address" aria-label="address" value="<?php echo $result['Address']?>">
            </div>
            <div class="col-md-4 payment-method">
               <label for="exampleFormControlTextarea1">Payment method</label>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="Cash on Delivery" checked>
                  <label class="form-check-label" for="credit_card">
                  Cash on Delivery
                  </label>
               </div>
               <div class="form-check">
                  <input class="form-check-input" type="radio" name="payment_method" id="paypal" value="paypal">
                  <label class="form-check-label" for="paypal">
                  PayPal
                  </label>
               </div>
            </div>
      </div>
      <div class="col-md-4 border added-products">
      <!-- Product details section -->
      <h4>Product details</h4>
      <?php
         $getProducts=$ct->getCartProduct();
         $total = 0;
         if ($getProducts) {
            $i=0;
            while ($result=$getProducts->fetch_assoc()) {
               $i++;
            ?>
      <div class="row">
      <input type="hidden" name="shop" value="<?php echo $result['shop'] ?>">
      <p class="col-6"><?php echo $result['Name'] ?>&nbsp;<?php echo $result['Price'] ?> x <?php echo $result['Qty'] ?></p>
      <div class="col-6 text-right"><?php echo number_format(($total=$result['Price'] * $result['Qty']), 2) ?></div>
      </div>
      <?php
            }
        }
         ?>
      <hr class="border-bottom">
      <div class="row">
      <div class="col-6"><strong>Total amount</strong></div>
      <div class="col-6 text-right"><?php echo number_format($total, 2) ?></div>
      </div>
      <div class="text-center mt-4">
      <button class="btn btn-primary" name="place">PLACE ORDER</button>
      <div id="paypal-payment-button">
      </div>
      </div>
      </form>
      <?php
            }
        }

      ?>
      </div>
   </div>
</div>
<!-- Register end -->
<?php
   // Include the footer file
   require_once 'footer.php';
   
   ?>