<?php 
include('admin/includes/config.php'); 
error_reporting(0); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include('inc/header_links.php') ?>
<body>
    <?php include('inc/header.php') ?>
    <br><br><br><br><br><br><br>
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h1 class="mb-0">All Our Product</h1>
            </div>
    <div class="row p-3">
<?php $sql = "SELECT * FROM products";
    $query = $dbh->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $cnt = 1;
    if ($query->rowCount() > 0) {
      foreach ($results as $result) {?>
                <div class="col-lg-3 p-3 wow slideInUp" data-wow-delay="0.3s">
                <a href="productview.php?product=<?php echo htmlentities($result->id);?>">
                    <div class="team-item bg-light rounded overflow-hidden">
                        <div class="team-img position-relative overflow-hidden">
                            <img width="400px" height="160px" class="w-100" src="admin/Uploads/<?php echo htmlentities($result->image1); ?>" alt="Image">
                        </div>
                        <div class="text-center py-4">
                            <h4 class="text-primary"><a href="productview.php?product=<?php echo htmlentities($result->id);?>"></a><?php echo htmlentities($result->productname); ?></h4>
                            <p class="text-uppercase m-0"><a href="productview.php?product=<?php echo htmlentities($result->id);?>"> ₹ </a><?php echo htmlentities($result->sold); ?></p>
                        </div>
                    </div>
                </a>
                </div><?php } } ?>
            </div><br><br><br><br>
    <?php include('inc/footer.php') ?>
</body>
</html>