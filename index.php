<?php
    include 'navigation.php';
?>
<?php
    echo session_id();
?>
    <!-- homePage slide show -->
    <div id="carouselExampleIndicators" class="carousel slide h-50" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/slider1_1.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1>500 Spices,Herbs & Seasonings</h1>
       
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/slider2_1.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1>Enhance Your Culinary Creations with Premium Spices & Herbs!</h1>
       
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/slider3_1.webp" class="d-block w-100" alt="...">
      <div class="carousel-caption">
        <h1>Spice up Your Life: 500 Exquisite Flavors Await!</h1>
    
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<br>


    <!-- Article Start -->
    <div class="container-xxl py-5">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                  <img class="img-fluid" src="img/pexels-lidya-kohen-15019908.jpg" alt="">
              </div>
              <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                  <div class="section-title">
                      <p class="fs-5 fw-medium fst-italic text-warning">Featured Acticle</p>
                      <h1 class="display-6">The history of spices in the world</h1>
                  </div>
                  <p class="mb-4 history-phara">Spices have a long and influential history. They were valued for their medicinal properties and as food preservatives since ancient times. The spice trade flourished in the Middle East, Egypt, and the Mediterranean. The search for spices drove European exploration and colonization. Spice monopolies and wars emerged as European powers sought control. Today, 
                     spices remain essential in global cuisine and continue to be traded worldwide.</p>
                  <p class="mb-4 history-phara">Spices have a long and influential history. They were valued for their medicinal properties and as food preservatives since ancient times. The spice trade flourished in the Middle East, Egypt, and the Mediterranean. The search for spices drove European exploration and colonization. Spice monopolies and wars emerged as European powers sought control. Today, 
                     spices remain essential in global cuisine and continue to be traded worldwide.Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna.
                     Tempor erat elitr rebum at clita.</p>
                 
              </div>
          </div>
      </div>
  </div>
  <!-- Article End -->


  <!-- tasty section -->
  <section class="tasty_section">
   <div class="container_fluid">
     <h2>
      spiceHub
     </h2>
   </div>
 </section>

 <!-- end tasty section -->




<div class="container">
    <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
 
        <h1 class="mb-5 pt-4">New arrivals</h1>
    </div>
    <div class="row">
        <?php
            $getProducts=$pd->getNewProducts();
            if ($getProducts) {
                while ($result=$getProducts->fetch_assoc()) {
        ?>
        <div class="col-md-3 col-sm-6">
            <div class="product-grid2">
                <div class="product-image2">
                    <a href="singleproduct.php?proid=<?php echo $result['ProductID']?>">
                        <img class="pic-1" src="admin/<?php echo $result['Image']?>">
                        
                    </a>
                    <ul class="social">
                        <li><a href="#" data-tip="Quick View"><i class="fa fa-eye"></i></a></li>
                        <li><a href="#" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li>
                        <li><a href="#" data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                    </ul>
                    <a class="add-to-cart" href="">Add to cart</a>
                </div>
                <div class="product-content">
                    <h3 class="title"><a href="#"><?php echo $result['Name']?></a></h3>
                    <span class="price">Rs <?php echo $result['Price']?></span>
                </div>
            </div>
        </div>
        <?php
                 }
            }
        ?>

    </div>
</div>
<hr>

      <!-- Service Start -->
      <div class="container-xxl py-5">
         <div class="container">
             <div class="text-center mx-auto pb-4 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
 
                 <h1 class="mb-5">Services That We Offer For Customer</h1>
             </div>
             <div class="row gy-5 gx-4">
                 <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.1s">
                     <div class="service-item d-flex h-100">
                         <div class="service-img">
                             <img class="img-fluid" src="img/pexels-lidya-kohen-15019908.jpg" alt="">
                         </div>
                         <div class="service-text p-5 pt-0">
                             <div class="service-icon">
                                 <img class="img-fluid rounded-circle" src="img/9_2000x.webp" alt="">
                             </div>
                             <h5 class="mb-3">Spice Product Sales:</h4>
                             <p class="mb-4">Offer a platform to sell a wide range of spices, including popular ones like cinnamon, turmeric, cumin, and paprika. Provide detailed descriptions, images, and pricing information for each spice. 
                                Include options for customers to purchase individual spices or curated spice blends.</p>
                            
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.3s">
                     <div class="service-item d-flex h-100">
                         <div class="service-img">
                           <img class="img-fluid" src="img/pexels-lidya-kohen-15019908.jpg" alt="">
                         </div>
                         <div class="service-text p-5 pt-0">
                             <div class="service-icon">
                              <img class="img-fluid rounded-circle" src="img/33_2000x.webp" alt="">
                             </div>
                             <h5 class="mb-3">Spice Product Sales:</h4>
                              <p class="mb-4">Offer a platform to sell a wide range of spices, including popular ones like cinnamon, turmeric, cumin, and paprika. Provide detailed descriptions, images, and pricing information for each spice. 
                                 Include options for customers to purchase individual spices or curated spice blends.</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-lg-4 col-md-6 pt-5 wow fadeInUp" data-wow-delay="0.5s">
                     <div class="service-item d-flex h-100">
                         <div class="service-img">
                           <img class="img-fluid" src="img/pexels-lidya-kohen-15019908.jpg" alt="">
                         </div>
                         <div class="service-text p-5 pt-0">
                             <div class="service-icon">
                              <img class="img-fluid rounded-circle" src="img/article.jpg" alt="">
                             </div>
                             <h5 class="mb-3">Spice Product Sales:</h4>
                              <p class="mb-4">Offer a platform to sell a wide range of spices, including popular ones like cinnamon, turmeric, cumin, and paprika. Provide detailed descriptions, images, and pricing information for each spice. 
                                 Include options for customers to purchase individual spices or curated spice blends.</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- Service End -->
 
 <?php
    include 'footer.php';
?>