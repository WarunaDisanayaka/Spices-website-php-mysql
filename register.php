<?php
    require 'navigation.php';
?>
<?php
    $cr=new Customer();
   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
      $customerReg=$cr->customerRegistration($_POST);
   }
   
?>
<section class="hero" style="background-image: url('img/shopbanner.webp');">
   <div class="container">
      <div class="row align-items-center">
         <div class="col-lg-6">
            <h1 class="hero-title"></h1>
         </div>
      </div>
   </div>
</section>
<!-- Register start -->
<div class="container mt-5">
   <div class="row justify-content-center">
      <div class="col-md-6 col-lg-5">
         <div class="card border-0">
            <div class="card-body">
               <h5 class="card-title text-center">Create an account</h5>
               <?php
                  // Form is invalid. Show the errors to the user.
                  if ($customerReg) {
                    echo '<div class="alert alert-danger" role="alert">';
                      echo  $customerReg;
                    echo '</div>';  
                  }
                  ?>
               <form method="POST">
                  <div class="mb-3">
                     <label for="username" class="form-label">Username</label>
                     <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email">
                  </div>
                  <div class="mb-3">
                     <label for="phone" class="form-label">Phone</label>
                     <input type="tel" class="form-control" id="phone" name="phone" >
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Address</label>
                     <input type="text" class="form-control" id="address" name="address" >
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">City</label>
                     <input type="text" class="form-control" id="city" name="city" >
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Zip Code</label>
                     <input type="text" class="form-control" id="zip" name="zip" >
                  </div>
                  <div class="mb-3">
                     <label for="password" class="form-label">Password</label>
                     <input type="password" class="form-control" id="password" name="password" >
                  </div>
                  <div class="d-grid gap-2">
                     <button type="submit" name="submit" class="btn btn-lg btn-dark">Register</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!-- Register end -->

<?php
    require 'footer.php';
?>