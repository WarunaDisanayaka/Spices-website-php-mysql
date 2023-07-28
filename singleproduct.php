<?php
    require 'navigation.php';
?>
<?php
    if (!isset($_GET['proid'])|| $_GET['proid']==NULL) {
        echo "<script>window.location='product.php'</script>";
    }else{
        $id=$_GET['proid'];
    }

   if ($_SERVER['REQUEST_METHOD']=='POST') {
      $quantity=$_POST['quantity'];
      $addCat=$ct->addToCart($quantity,$id);
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
<div class="container my-5">
   <?php
      $getPd=$pd->getProById($id);
      if ($getPd) {
         while ($result=$getPd->fetch_assoc()) {
      
   ?>
  
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
                     <img id="main-image" src="admin/<?php echo $result['Image']; ?>" class="product-img" alt="Product Image" class="d-block w-100" /> 
                    </div>
                  <div class="thumbnail text-center"> 
               <!-- <img onclick="change_image(this)" src="vendordashboard/" width="70">
                <img onclick="change_image(this)" src="vendordashboard/" width="70">  -->
               </div>
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
         <h2 class="fw-bold"><?php echo $result['Name']; ?></h2>
         <p class="lead">Rs <?php echo $result['Price']; ?></p>
         <p><?php  ?></p>
         <div class="mb-3">
         </div>
         <div class="mb-3">
         </div>
         <div class="d-flex align-items-center">
            <form action="" class="add-cart" method="post">
            <input type="number" min="1" id="quantityInput" name="quantity"  style="width: 70px; margin-right:0.5rem;">
               <input type="hidden" id="qtyHidden"  class="quantity">
               <input type="hidden"  name="user" id="user" value="<?php  ?>">
               <button class="btn btn-primary me-3 addCart">Add to Cart</button>
               <button class="btn btn-secondary addFavourites"><i class="bi bi-heart"></i> Add Wishlist</button>
            </form>
         </div>
         <?php
      if (isset($addCat)) {
         echo $addCat;  
      }
   ?>
         <p class="mt-3"><small>Category: <?php  ?></small></p>
         
      </div>
   </div>
   <?php
         }
      }
   ?>
</div>

<?php
    require 'footer.php';
?>