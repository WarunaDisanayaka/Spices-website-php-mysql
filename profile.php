<?php
    require 'navigation.php';
?>
<?php
    $login = Session::get("cuslogin");
    if ($login == false) {
        header("Location:login.php");
    }
?>
<?php
   if (isset($_GET['cid'])) {
      $delCartData=$ct->delCustomerData();
      Session::destroy();
   }
?>

<?php
   if (isset($_POST['submit'])) {
      $id=$_POST['id'];
      $updateCustData=$ct->updateCustomerData($_POST,$id);

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
         <a href="?cid=<?php Session::get('cusId')?>"><button class="nav-link" id="menu2-tab" data-bs-toggle="tab" data-bs-target="#menu2" type="button" role="tab" aria-controls="menu2" aria-selected="false">Logout</button></a>
      </li>
   </ul>
   <div class="tab-content">
      <div id="home" class="tab-pane fade show active" role="tabpanel" aria-labelledby="home-tab">
         <h3>Dashboard</h3>
         <p>Hi welcome  </p>
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
         <h3>Profile Details</h3>
         <div class="container-fluid">
            <!-- Content Row -->
            <div class="row">
               <table class="table">
                  <tbody>
                  <div class="container mt-5">
   <div class="row ">
      <div class="col-md-6 col-lg-5">
         <div class="card border-0">
            <div class="card-body">
               <h5 class="card-title text-center"></h5>
               <?php 
                                 if (isset($updateCustData)) {
                                    echo $updateCustData;
                                 }
                           ?>
                  <?php
                     $id=Session::get("cusId");
                     $getdata=$cr->getCustomerData($id);
                     if ($getdata) {
                        while ($result=$getdata->fetch_assoc()) {
                  ?>
               <form method="POST">
                  <div class="mb-3">
                     <label for="username" class="form-label">Username</label>
                     <input type="text" class="form-control" id="username" name="username" value="<?php echo $result['Username']?>">
                     <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $result['BuyerID']?>">
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Email</label>
                     <input type="email" class="form-control" id="email" name="email" value="<?php echo $result['Email']?>">
                  </div>
                  <div class="mb-3">
                     <label for="phone" class="form-label">Phone</label>
                     <input type="tel" class="form-control" id="phone" name="phone"  value="<?php echo $result['Phone']?>" >
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Address</label>
                     <input type="text" class="form-control" id="address" name="address"  value="<?php echo $result['Address']?>" >
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">City</label>
                     <input type="text" class="form-control" id="city" name="city" value="<?php echo $result['City']?>" >
                  </div>
                  <div class="mb-3">
                     <label for="email" class="form-label">Zip Code</label>
                     <input type="text" class="form-control" id="zip" name="zip" value="<?php echo $result['Zip']?>" >
                  </div>
                  <div class="mb-3">
                     <label for="password" class="form-label">Password</label>
                     <input type="text" class="form-control" id="password" name="password"  >
                  </div>
                  <div class="d-grid gap-2">
                     <button type="submit" name="submit" class="btn btn-lg btn-dark">Update</button>
                  </div>
               </form>
               <?php
                     }
                  }
               ?>
            </div>
         </div>
      </div>
   </div>
</div>
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