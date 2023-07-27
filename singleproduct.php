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
<div class="container my-5">
   <div class="row">
      <div class="col-md-6">
         <div class="carousel slide" data-bs-ride="carousel" id="productCarousel">
            <!-- <div class="carousel-inner">
               <div class="carousel-item active">
                  <img src="vendordashboard/<?php   ?>" class="product-img" alt="Product Image" class="d-block w-100">
               </div>
               <div class="carousel-item">
                  <img src="vendordashboard/<?php  ?>" class="product-img" alt="Product Image" class="d-block w-100">
               </div>
               <div class="carousel-item">
                  <img src="vendordashboard/<?php  ?>" class="product-img" alt="Product Image" class="d-block w-100">
               </div>
               </div> -->
            <div class="col">
               <div class="images p-3">
                  <div class="text-center p-4">
                     <img id="main-image" src="img/9_2000x.webp" class="product-img" alt="Product Image" class="d-block w-100" /> 
                    </div>
                  <div class="thumbnail text-center"> <img onclick="change_image(this)" src="vendordashboard/<?php echo $product_detials['image1']; ?>" width="70">
                <img onclick="change_image(this)" src="vendordashboard/<?php echo $product_detials['image2']; ?>" width="70"> </div>
               </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
            </button>
         </div>
      </div>
      <div class="col-md-6">
         <h2 class="fw-bold"> <?php  ?></h2>
         <p class="lead">Rs <?php  ?></p>
         <p><?php  ?></p>
         <div class="mb-3">
         </div>
         <div class="mb-3">
         </div>
         <div class="d-flex align-items-center">
            <input type="number"  id="quantityInput"  style="width: 70px; margin-right:0.5rem;">
            <form action="" class="add-cart">
               <input type="hidden" name="pid" class="pid" value="<?php  ?>">
               <input type="hidden" name="pname" class="pname" value="<?php  ?>">
               <input type="hidden" name="pprice" class="pprice" value="<?php  ?>">
               <input type="hidden" name="pimage" class="pimage" value="<?php  ?>">
               <input type="hidden" name="selected_size" class="selected_size" id="selectedSizeInput">
               <input type="hidden" id="qtyHidden" name="quantity" class="quantity">
               <input type="hidden" name="user" id="user" value="<?php  ?>">
               <button class="btn btn-primary me-3 addCart" onclick="return checkLogin1();">Add to Cart</button>
               <button class="btn btn-secondary addFavourites" onclick="return checkLogin2();"><i class="bi bi-heart"></i> Add Wishlist</button>
            </form>
         </div>
         <p class="mt-3"><small>Category: <?php  ?></small></p>
         
      </div>
   </div>
</div>

<?php
    require 'footer.php';
?>