<?php
    require 'navigation.php';
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
                  if (!empty($errors)) {
                    echo '<div class="alert alert-danger" role="alert">';
                    foreach ($errors as $error) {
                      echo '<p>' . $error . '</p>';
                    }
                    echo '</div>';
                  }
                  ?>
               <form method="POST" action="register.php">
                  <div class="mb-3">
                     <label for="username" class="form-label">Username</label>
                     <input type="text" class="form-control" id="username" name="username" value="<?php echo isset($username) ? $username : ''; ?>">
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($email) ? $email : ''; ?>">
                  </div>
                  <div class="mb-3">
                     <label for="phone" class="form-label">Phone</label>
                     <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo isset($phone) ? $phone : ''; ?>">
                  </div>
                  <div class="mb-3">
                     <label for="password" class="form-label">Password</label>
                     <input type="password" class="form-control" id="password" name="password" value="<?php echo isset($password) ? $password : ''; ?>">
                  </div>
                  <div class="mb-3">
                     <label for="confirm-password" class="form-label">Confirm Password</label>
                     <input type="password" class="form-control" id="confirm-password" name="confirm-password" value="<?php echo isset($confirm_password) ? $confirm_password : ''; ?>">
                  </div>
                  <div class="d-grid gap-2">
                     <button type="submit" class="btn btn-lg btn-dark">Register</button>
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