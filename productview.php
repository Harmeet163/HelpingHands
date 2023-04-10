<?php 
include('admin/includes/config.php');
$product=intval($_GET['product']);
error_reporting(0); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include('inc/header_links.php') ?>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css'>
    <link rel="stylesheet" href="css/pstyle.css">
<body>
    <?php include('inc/header.php') ?>
    <br><br><br><br><br><br><br>
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0">Product</h1>
            </div>
    <div class="row p-3">
        <?php
	       $sql = "SELECT * FROM products WHERE id='$product'";
	       $query = $dbh -> prepare($sql);
          $query->execute();
          $results=$query->fetchAll(PDO::FETCH_OBJ);
          $cnt=1;
          if($query->rowCount() > 0)
          {
  	          foreach($results as $result)
  	          {
	    ?>
            <section id="services" class="services section-bg">
               <div class="container-fluid">
                  <div class="row row-sm">
                     <div class="col-md-6 _boxzoom">
                        <div class="zoom-thumb">
                           <ul class="piclist">
                              <li><img src="admin/Uploads/<?php echo htmlentities($result->image1); ?>" alt="Image 1"></li>
                              <li><img src="admin/Uploads/<?php echo htmlentities($result->image2); ?>" alt="Image 2"></li>
                              <li><img src="admin/Uploads/<?php echo htmlentities($result->image3); ?>" alt="Image 3"></li>
                              <li><img src="admin/Uploads/<?php echo htmlentities($result->image4); ?>" alt="Image 4"></li>
                           </ul>
                        </div>
                        <div class="_product-images">
                           <div class="picZoomer">
                                <img class="my_img" src="admin/Uploads/<?php echo htmlentities($result->image1); ?>" alt="Main Image">
                           </div>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="_product-detail-content">
                           <p class="_p-name"> <?php echo htmlentities($result->productname); ?> </p>
                           <div class="_p-price-box">
                              <div class="p-list">
                                 <span class="price"> ₹ <?php echo htmlentities($result->sold); ?> </span>
                              </div>
                              <div class="_p-features">
                                    <span> Description About this Product:- </span>
                                    <?php echo htmlentities($result->productdes); ?>
                              </div>
                              <form action="" method="post" accept-charset="utf-8">
                                 <ul class="spe_ul"></ul>
                                 <div class="_p-qty-and-cart">
                                    <div class="_p-add-cart">
                                       <a class="btn-theme btn buy-btn" href="purchase.php?buy=<?php echo htmlentities($result->id);?>"><i class="fa fa-shopping-cart"></i> Buy Now </a>
                                       <input type="hidden" name="pid" value="18" />
                                       <input type="hidden" name="price" value="850" />
                                       <input type="hidden" name="url" value="" />    
                                    </div>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </section>
            <section class="sec bg-light">
               <div class="container">
                  <div class="row">
                     <div class="col-sm-12 title_bx">
                        <h3 class="title"> Recent Product / Courses </h3>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12 list-slider mt-4">
                        <div class="owl-carousel common_wd  owl-theme" id="recent_post">
                            <?php $sql = "SELECT * FROM products";
                                $query = $dbh->prepare($sql);
                                $query->execute();
                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                $cnt = 1;
                                if ($query->rowCount() > 0) {
                                  foreach ($results as $result) {?>
                           <div class="item">
                              <div class="sq_box shadow">
                                 <div class="pdis_img">
                                    <a href="productview.php?product=<?php echo htmlentities($result->id);?>">
                                    <img src="admin/Uploads/<?php echo htmlentities($result->image1); ?>" alt="Main Image">
                                    </a>
                                 </div>
                                 <h4 class="mb-1"> <a href="details.php"> <?php echo htmlentities($result->productname); ?> </a> </h4>
                                 <div class="price-box mb-2">
                                    <span class="offer-price"> ₹ <?php echo htmlentities($result->sold); ?> </span>
                                 </div>
                                 <div class="btn-box text-center">
                                    <a class="btn btn-sm" href="productview.php?product=<?php echo htmlentities($result->id);?>"> View </a>
                                 </div>
                                </div>
                            </div>
                            <?php }} ?>
                        </div>
                     </div>
                    </div>
               </div>
            </section>
            <?php } } ?>
            </div>
    <?php include('inc/footer.php') ?>
    <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery-zoom/1.7.21/jquery.zoom.min.js'></script>
    <script  src="js/pscript.js"></script>
</body>
</html>