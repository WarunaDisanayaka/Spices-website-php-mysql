<?php
    require 'navigation.php';
?>
 <!-- product-grid -->
   
    <div class="container mt-5">
  
      <div class="row">
      <?php
            $getProducts=$pd->getAllProducts();
            if ($getProducts) {
                while ($result=$getProducts->fetch_assoc()) {
        ?>
          <div class="col-md-3 col-sm-6">
              <div class="product-grid">
                  <div class="product-image">
                     <a href="singleproduct.php?proid=<?php echo $result['ProductID']?>">
                        <img class="pic-1" src="admin/<?php echo $result['Image']?>">
                        <img class="pic-2" src="admin/<?php echo $result['Image']?>">
                      </a>
                      <ul class="social">
                          <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li>
                          <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                          <li><a href="" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                      </ul>
                      
                  </div>
                  
                  <div class="product-content pb-4">
                    <h3 class="title"><a href="singleproduct.php"><?php echo $result['Name']?></a></h3>
                      <div class="price">Rs <?php echo $result['Price']?>
                         
                      </div>
                    
                  </div>
              </div>
          </div>
          <?php
                }
            }
          ?>
        
      </div>
  </div>

  <?php
    require 'footer.php';
?>