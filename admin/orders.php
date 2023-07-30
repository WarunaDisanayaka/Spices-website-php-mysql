<?php include '../classes/Cart.php'?>
<?php
   $ct = new Cart();
   if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['submit'])) {
    $orderId=$_POST['OrderID'];
    $status=$_POST['status'];
    $updateStatus=$ct->updateOrder($orderId,$status);

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
                        <h1 class="mt-4">Orders</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Orders</li>
                        </ol>
                    
                
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Order List
                            </div>
                            <div class="card-body product-tbl">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                          
                                          
                                            <th>Product</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>Phone</th>
                                            <th>Total</th>
                                            <th>Order Status</th>
                                            <th>Date</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $ct = new Cart();
                                            $getOrders=$ct->getAllOrders();
                                            if ($getOrders) {
                                                $i=0;
                                                while ($result=$getOrders->fetch_assoc()) {
                                                 $i++;   
                                        ?>
                                       <tr>
                                          
                                            <td><?php echo $result['ProductName']?></td>
                                            <td><?php echo $result['Username']?></td>
                                            <td><?php echo $result['Address']?></td>
                                            <td><?php echo $result['City']?></td>
                                            <td><?php echo $result['Phone']?></td>
                                            <td><?php echo $result['Total']?></td>
                                            <td><?php echo $result['Status']?></td>
                                            <td><?php echo $result['Date']?></td>
                                            <td>
    <form method="post">
        <input type="hidden" name="OrderID" value="<?php echo $result['OrderID']; ?>">
        <select name="status" id="status_<?php echo $result['ProductID']; ?>">
            <option value="pending" <?php if ($result['Status'] == 'pending') echo 'selected'; ?>>Pending</option>
            <option value="processing" <?php if ($result['Status'] == 'processing') echo 'selected'; ?>>Processing</option>
            <option value="shipped" <?php if ($result['Status'] == 'shipped') echo 'selected'; ?>>Shipped</option>
        </select>
        <button type="submit" name="submit">Update</button>
    </form>
</td>


                                       </tr>
                                       <?php
                                             }
                                            }
                                       ?>
                                    </tbody>
                                </table>
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

         <!--Navigation Bar-->
        <?php require('sidebar.inc.php');?>
         <!--Navigation Bar-->
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        
    </body>
</html>
