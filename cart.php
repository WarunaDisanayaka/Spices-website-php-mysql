<?php
    require 'navigation.php';
?>
<?php
    $login = Session::get("cuslogin");
    if ($login == false) {
    }
?>
<?php
    if (isset($_GET['remove'])) {
      $cartId=$_GET['remove'];
      $detProduct=$ct->delByCartId($cartId);
    }
?>
<?php
   if ($_SERVER['REQUEST_METHOD']=='POST') {
      $cartId     =  $_POST['cartId'];
      $quantity   =  $_POST['quantity'];
      $updateCat  =  $ct->updateCartQty($cartId,$quantity);
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
                        $getProducts=$ct->getCartProduct();
                        if ($getProducts) {
                           $i=0;
                           $sum=0;
                           while ($result=$getProducts->fetch_assoc()) {
                              $i++;
                     ?>
                     <tr>
                        <td><?php echo $result['Name']  ?></td>
                        <td><?php  echo $result['Price'] ?></td>
                        <td>
                           <form action="" method="post">
                              <input type="hidden" name="cartId" value="<?php  echo $result['Id']  ?>">
                              <input type="number" class="form-control custom-input" min="1" name="quantity" value="<?php  echo $result['Qty']  ?>"><br>
                              <input type="submit" name="submit" value="Update">
                           </form>
                        </td>
                        <td><?php echo $total=$result['Price'] * $result['Qty'] ?></td>
                        <td>
                           <a href="?remove=<?php echo $result['Id'] ?>" onclick="return confirm('Are you sure want to remove this item?')">
                           <button class="btn btn-danger btn-remove" type="button">
                           <i class="fas fa-trash-alt"></i> 
                           </button>
                           </a>
                        </td>
                     </tr>
                     <?php
                     $sum=$sum+$total;
                       }
                     }
                
                  ?>
               </tbody>
               <tfoot>
                  <tr>
                     <td colspan="3" class="text-right"><strong>Total:</strong></td>
                     <td><strong><?php echo $sum; ?></strong></td>
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
         $getProducts=$ct->getCartProduct();
         if ($getProducts) {
            $i=0;
            while ($result=$getProducts->fetch_assoc()) {
               $i++;
            ?>
            <div class="row">
               <p class="col-6"><?php echo $result['Name'] ?>-<?php  echo $result['Price']  ?></p>
               <div class="col-6 text-right"><?php  echo $result['Qty'] ?></div>
            </div>
            <?php
           }
         }
         ?>
         <hr class="border-bottom">
         <div class="row">
            <div class="col-6"><strong>Total amount</strong></div>
            <div class="col-6 text-right"><?php echo $sum;   ?></div>
         </div>
         <div class="text-center mt-4">
    <?php
        if ($login == true) {
            echo '<a href="checkout.php"><button class="btn btn-primary">PROCEED TO CHECKOUT</button></a>';
        } else {
            echo '<a href="login.php" style="text-decoration: none; color: blue;">Please login to proceed to checkout.</a>';
        }
    ?>
</div>

      </div>
   </div>
</div>

<?php
    require 'footer.php';
?>