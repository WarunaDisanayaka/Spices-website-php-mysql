<?php include '../classes/Category.php'?>
<?php include '../classes/Product.php'?>
<?php
   $pd = new Product();
   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
      $insertProduct=$pd->productInsert($_POST,$_FILES);
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
                                 if (isset($insertProduct)) {
                                    echo $insertProduct;
                                 }
                           ?>
                     <div class="card-body product-form">
                        <div class="cat-error"><?php echo $msg;?></div>
                        <form method="POST" enctype="multipart/form-data">
                           <div class="form-group w-50">
                              <label for="exampleFormControlSelect1">Category</label>
                              <select class="form-select" aria-label="Default select example" name="CategoryId">
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
                              <input type="text" name="name" class="form-control"  placeholder="Enter Product Name">
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Price</label>
                              <input type="text" name="price" class="form-control"   placeholder="Enter Price">
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Stock</label>
                              <input type="text" name="qty" class="form-control"  placeholder="Enter Qty">
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Image</label>
                              <input type="file" name="image" class="form-control">
                             
                           </div>

                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Description</label>
                              <textarea type="text" name="description" class="form-control"  placeholder="Enter Description"></textarea>
                           </div>
                           
                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Size</label>
                              <textarea type="text" name="size" class="form-control"  placeholder="Enter Size" ></textarea>
                           </div>

                           <div class="cat-btn">
                              <button type="submit" name="submit" class="btn btn-success">Add</button>
                           </div>

                        </form>
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
   </body>
</html>