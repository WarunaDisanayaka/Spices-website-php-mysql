<?php include '../classes/Category.php'?>
<?php include '../classes/Product.php'?>
<?php
    if (!isset($_GET['proid'])|| $_GET['proid']==NULL) {
        echo "<script>window.location='edit_product.php'</script>";
    }else{
        $id=$_GET['proid'];
    }
?>
<?php
   $pd = new Product();
   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
      $updateProduct=$pd->productUpdate($_POST,$_FILES,$id);
   }
   
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <title>Dashboard Admin</title>
      <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
      <link href="css/styles.css" rel="stylesheet" />
      <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
      
   </head>
   <body class="sb-nav-fixed">
      <!--Navigation Bar-->
      <?php include_once('top.inc.php'); ?>
      <!--Navigation Bar-->
      <div id="layoutSidenav">
         <div id="layoutSidenav_content">
            <main>
               <div class="container-fluid px-4">
                  <h1 class="mt-4">Add Products</h1>
                  <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item active">Add Products</li>
                  </ol>
                  <div class="card mb-4">
                     <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Add Products
                     </div>
                     <?php 
                                 if (isset($updateProduct)) {
                                    echo $updateProduct;
                                 }
                           ?>
                        
                     <div class="card-body product-form">
                        <div class="cat-error"><?php echo $msg;?></div>
                        <?php
                        $getProd = $pd->getProById($id);
                        if ($getProd) {
                            while ($value = $getProd->fetch_assoc()) {
                     ?>  
                        <form method="POST" enctype="multipart/form-data">
                           <div class="form-group w-50">
                              <label for="exampleFormControlSelect1">Category</label>
                              <select class="form-select" aria-label="Default select example"  name="CategoryId">
                                 <?php
                                    $cat = new Category();
                                    $getCat=$cat->getAllCat();
                                    if ($getCat) {
                                       while ($result=$getCat->fetch_assoc()) {
                                          
   
                                 ?>
                                  <option selected>Open this select menu</option>
                                  <option value="<?php echo $result['CategoryId']?>"><?php echo $result['CategoryName'] ?></option>
                                  <?php
                                         }
                                       }
                                  ?>
                                 
                              </select>
                           </div>
                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Product Name</label>
                              <input type="text" name="name" class="form-control" value="<?php echo $value['Name'] ?>"  placeholder="Enter Product Name">
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Price</label>
                              <input type="text" name="price" class="form-control" value="<?php echo $value['Price'] ?>"   placeholder="Enter Price">
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Stock</label>
                              <input type="text" name="qty" class="form-control" value="<?php echo $value['Stock'] ?>"  placeholder="Enter Qty">
                           </div>
                           <div class="form-group w-50">
  <label for="exampleInputEmail1">Image</label>
  <img id="previewImage" src="<?php echo $value['Image'] ?>" style="width: 80px">
  <a href="javascript:void(0);" onclick="selectImage()">Change Image</a>
  <input type="file" name="image" id="imageInput" class="form-control" style="display: none;">
</div>



                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Description</label>
                              <input type="text" name="description" class="form-control" value="<?php echo $value['Description'] ?>"  placeholder="Enter Description">
                           </div>
                           
                           
                           <div class="form-group w-50">
  <label>Grams</label><br>
  <?php
// Assuming $value['Size'] contains the sizes retrieved from the database, e.g., '100g, 250g, 500g'
$selectedSizes = $value['Size'];
?>

  <input type="checkbox" name="grams[]" value="100g" <?php if (strpos($selectedSizes, '100g') !== false) echo 'checked'; ?>> 100g<br>
  <input type="checkbox" name="grams[]" value="250g" <?php if (strpos($selectedSizes, '250g') !== false) echo 'checked'; ?>> 250g<br>
  <input type="checkbox" name="grams[]" value="500g" <?php if (strpos($selectedSizes, '500g') !== false) echo 'checked'; ?>> 500g<br>
  <input type="checkbox" name="grams[]" value="1kg" <?php if (strpos($selectedSizes, '1kg') !== false) echo 'checked'; ?>> 1kg<br>
</div>



                           <div class="cat-btn">
                              <button type="submit" name="submit" class="btn btn-success">Update</button>
                           </div>

                        </form>
                        <?php
                                }
                            }
                        ?>
                     </div>
                  </div>
               </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
               <div class="container-fluid px-4">
                  <div class="d-flex align-items-center justify-content-between small">
                     <div class="text-muted"></div>
                     <div>
                        <a href="#"></a>
                        &middot;
                        <a href="#"></a>
                     </div>
                  </div>
               </div>
            </footer>
         </div>
      </div>
      <!--Side Bar-->
      <?php require('sidebar.inc.php');?>
      <!--Side Bar-->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
      <script src="js/scripts.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
      <script src="assets/demo/chart-area-demo.js"></script>
      <script src="assets/demo/chart-bar-demo.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
      <script src="js/datatables-simple-demo.js"></script>
      
      <script>
function selectImage() {
  const fileInput = document.getElementById('imageInput');
  fileInput.click();
}

// Update the image preview when a new image is selected
document.getElementById('imageInput').addEventListener('change', function() {
  const previewImage = document.getElementById('previewImage');
  const file = this.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = function() {
      previewImage.src = reader.result;
    };
    reader.readAsDataURL(file);
  }
});

// Optional: Show the previously selected image thumbnail on page load
window.addEventListener('DOMContentLoaded', function() {
  const currentImageUrl = "<?php echo $value['Image']; ?>";
  const previewImage = document.getElementById('previewImage');
  previewImage.src = currentImageUrl;
});
</script>


   </body>
</html>