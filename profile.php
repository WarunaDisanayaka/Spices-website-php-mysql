<?php
    require 'navigation.php';
?>
<?php
    $login = Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
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
<div class="container mt-5 mb-5">
   <ul class="nav nav-tabs mb-5">
      <li class="nav-item">
         <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Dashboard</button>
      </li>
      <li class="nav-item">
         <button class="nav-link" id="menu1-tab" data-bs-toggle="tab" data-bs-target="#menu1" type="button" role="tab" aria-controls="menu1" aria-selected="false">Orders</button>
      </li>
      <li class="nav-item">
         <button class="nav-link" id="menu1-tab" data-bs-toggle="tab" data-bs-target="#menu3" type="button" role="tab" aria-controls="menu3" aria-selected="false">Profile</button>
      </li>
      <li class="nav-item">
         <a href="logout.php"><button class="nav-link" id="menu2-tab" data-bs-toggle="tab" data-bs-target="#menu2" type="button" role="tab" aria-controls="menu2" aria-selected="false">Logout</button></a>
      </li>
   </ul>
   <div class="tab-content">
      <div id="home" class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
         <h3>Dashboard</h3>
         <p>Hi welcome <?php echo $row['username'] ?> </p>
      </div>
      <div id="menu1" class="tab-pane fade" role="tabpanel" aria-labelledby="menu1-tab">
         <h3>Orders</h3>
         <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
               <table class="table">
                  <thead class="thead-dark">
                     <tr>
                        <th scope="col">Product name</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                  </tbody>
               </table>
            </div>
            <!-- Content Row -->
            <div class="row">
            </div>
            <!-- Content Row -->
            <div class="row">
               <div class="col-lg-6 mb-4">
               </div>
            </div>
         </div>
      </div>
      <div id="menu3" class="tab-pane fade" role="tabpanel" aria-labelledby="menu1-tab">
         <h3>Design Orders</h3>
         <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
               <table class="table">
                  <thead class="thead-dark">
                     <tr>
                        <th scope="col">Design</th>
                        <th scope="col">Product price</th>
                        <th scope="col">Status</th>
                     </tr>
                  </thead>
                  <tbody>
                     
                  </tbody>
               </table>
            </div>
            <!-- Content Row -->
            <div class="row">
            </div>
            <!-- Content Row -->
            <div class="row">
               <div class="col-lg-6 mb-4">
               </div>
            </div>
         </div>
      </div>
      <div id="menu2" class="tab-pane fade" role="tabpanel" aria-labelledby="menu2-tab">
         <h3>Menu </h3>
         <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam ut blandit nisi. Donec auctor bibendum felis a lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas  </p>
      </div>
   </div>
</div>


<?php
    require 'footer.php';
?>