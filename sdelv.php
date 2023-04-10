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
                <h1 class="mb-0">Details of Seller</h1>
            </div>
            <?php 
                $details=intval($_GET['details']);
                $sql = "SELECT * FROM products WHERE id='$details'";
                $query = $dbh->prepare($sql);
                $query->execute();
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                $cnt = 1;
                if ($query->rowCount() > 0) {
                    foreach ($results as $result) {?>
            <div class="container mt-5">    
    <div class="row d-flex justify-content-center">
        <div class="col-md-7">            
            <div class="card p-3 py-4">                
                <div class="text-center">
                    <img src="img/Img.png" width="100" class="rounded-circle">
                </div>                
                <div class="text-center mt-3">
                    <h5 class="mt-2 mb-0"><?php echo htmlentities($result->name); ?></h5></br>
                    <div class="px-4 mt-1">
                        <p class="fonts">Contact Number : <?php echo htmlentities($result->cno); ?></p>
                        <p class="fonts">Email Id : <?php echo htmlentities($result->email); ?></p>                
                    </div></br>
                    <button class="btn btn-outline-primary px-4" onclick="location.href = 'index.php';" >Back To Home</button>

                </div>
            </div>
        </div>
    </div>
</div><br><br>
<?php } } ?>
    <?php include('inc/footer.php') ?>
</body>
</html>