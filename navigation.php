<?php
    include 'lib/Session.php';
    Session::init();
    include 'lib/Database.php';
    include 'helpers/Format.php';
    include 'config/config.php';


    spl_autoload_register(function($class){
        include "classes/".$class.".php";
    });

    $db=new Database();
    $fm=new Format();
    $pd=new Product();
    $ct= new Cart();
    $cr=new Customer();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Website</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <link href="css/main.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">

  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    
     <!-- Template Javascript -->
     <script src="js/main.js"></script>
     <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

   <nav class="navbar navbar-expand-sm bg-dark navbar-dark menu-bar fixed-top ">
      <div class="container-fluid ">
        <!-- <a class="navbar-brand " href="#"><h1 class="logo text-light" style="font-family: 'Times New Roman', Times, serif;">Spices<span class=" text-warning">Hub</span></h1></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse bg-dark justify-content-end" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="product.php">Product</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li> 
            <li class="nav-item">
                <a class="nav-link" href="#">Shop</a>
              </li>  
            <li class="nav-item me-3 me-lg-0">
                <a class="nav-link" href="cart.php">
                    <i class="fas fa-shopping-cart"></i>
                </a>
            </li>
            <li class="nav-item me-3 me-lg-0">
    <a class="nav-link" href="login.php">
        <i class="fas fa-user"></i> <!-- Replace "fas fa-shopping-cart" with "fas fa-user" for the profile icon -->
    </a>
</li>

            <!-- <li class="nav-item dropdown bg-dark">
              <a class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown">Dropdown</a>
              <ul class="dropdown-menu bg-dark navbar-dark mt-2">
                <li><a class="dropdown-item bg-dark" href="#">Link</a></li>
                <li><a class="dropdown-item bg-dark" href="#">Another link</a></li>
                <li><a class="dropdown-item bg-dark" href="#">A third link</a></li>
              </ul>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>
