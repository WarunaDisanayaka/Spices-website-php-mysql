<?php
    require 'navigation.php';
?>
<?php
    $login = Session::get("cuslogin");
    if ($login == true) {
        header("Location:profile.php");
    }
?>
<?php
    $cr=new Customer();
   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])) {
      $customerLogin = $cr->customerLogin($_POST);
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
<!-- Login form start -->
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6 col-lg-5">
      <div class="card border-0">
        <div class="card-body">
          <h5 class="card-title text-center">Login to your account here</h5>
          <?php
              if (isset($customerLogin)) {
                echo $customerLogin;
              }
          ?>
          <form method="POST">
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="d-grid gap-2">
              <button type="submit" name="login" class="btn btn-dark btn-lg">Login</button>
            </div>
            <div class="text-center mt-3">
              <p>Don't have an account? <a href="register.php">Register</a></p>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Login form end -->


<?php
    require 'footer.php';
?>