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
      <div class="col-md-8">
         <div class="table-responsive">
            <table class="table">
               <thead>
                  <tr>
                     <th>PRODUCT</th>
                     <th>PRICE</th>
                     <th>QUANTITY</th>
                     <th>SUBTOTAL</th>
                     <th>REMOVE</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                  

                     ?>
                     <tr>
                        <td><?php  ?></td>
                        <td><?php  ?></td>
                        <td>
                           <input type="number" class="form-control custom-input" min="1" value="<?php  ?>">
                        </td>
                        <td><?php  ?></td>
                        <td>
                           <a href="add_to_cart.php?remove=<? ?>" onclick="return confirm('Are you sure want to remove this item?')">
                           <button class="btn btn-danger btn-remove" type="button">
                           <i class="fas fa-trash-alt"></i> 
                           </button>
                           </a>
                        </td>
                     </tr>
                     <?php
                    
                
                  ?>
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="3" class="text-right"><strong>Total:</strong></td>
                     <td><strong><?php  ?></strong></td>
                     <td></td>
                     <!-- empty cell for alignment -->
                  </tr>
               </tfoot>
            </table>
         </div>
      </div>
      <div class="col-md-4 border added-products">
         <!-- Product details section -->
         <h4>Product details</h4>
         <?php
         
            ?>
            <div class="row">
               <p class="col-6"><?php ?>-<?php  ?></p>
               <div class="col-6 text-right"><?php  ?></div>
            </div>
            <?php
        
         ?>
         <hr class="border-bottom">
         <div class="row">
            <div class="col-6"><strong>Total amount</strong></div>
            <div class="col-6 text-right"><?php  ?></div>
         </div>
         <div class="text-center mt-4">
            <a href="checkout.php">
            <button class="btn btn-primary">PROCEED TO CHECKOUT</button>
            </a>
         </div>
      </div>
   </div>
</div>

<?php
    require 'footer.php';
?>