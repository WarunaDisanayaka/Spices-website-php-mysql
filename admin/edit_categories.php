<?php include '../classes/Category.php'?>
<?php
    if (!isset($_GET['catid'])|| $_GET['catid']==NULL) {
        echo "<script>window.location='edit_categories.php'</script>";
    }else{
        $id=$_GET['catid'];
    }
?>
<?php
   $cat = new Category();
   if ($_SERVER['REQUEST_METHOD']=='POST') {
      $catName=$_POST['categories'];
      $updateCat=$cat->catUpdate($catName,$id);
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
                  <h1 class="mt-4">Update Categories</h1>
                  <ol class="breadcrumb mb-4">
                     <li class="breadcrumb-item active">Update Categories</li>
                  </ol>
                  <div class="card mb-4">
                     <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Update Category
                     </div>
                     <div class="card-body">
                     <?php 
                                $getCat=$cat->getCatById($id);
                                if ($getCat) {
                                    while ($result=$getCat->fetch_assoc()) {
                           ?>
                        <form method="POST">
                           <div class="form-group w-50">
                              <label for="exampleInputEmail1">Category</label>
                              <input type="text" name="categories" class="form-control"  placeholder="Enter Category" value="<?php echo $result['CategoryName']?>">
                           </div>
                           <div class="cat-btn">
                                <button type="submit" name="submit" class="btn btn-success">Update</button>
                           </div>
                        </form>
                        <?php
                                 }
                                }
                        ?>
                        <div class="cat-error">
                            <?php 
                                 if (isset($insertCat)) {
                                    echo $insertCat;
                                 }
                           ?>
                           
                           
                        </div>
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