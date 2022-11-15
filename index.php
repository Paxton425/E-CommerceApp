<?php
require_once 'core/init.php';
include 'includes/head.php';
include 'includes/navigation.php';
include 'includes/headerfull.php';
$sql = "SELECT * FROM products WHERE  featured = 1";
$featured = $conn->query($sql);
?>

  <!--Main content of featured products-->
  <div class="col-md-11" style="padding: 0" id="body_container">
    <h2 class="text-center" style="margin: 20px;">Featured products</h2>
    <div class="row">
      <?php while($product = mysqli_fetch_assoc($featured)): ?>
      <div class="col-md-3">
        <h4 class="product_name"><?=$product['title']; ?></h4>
        <img class="products_images" src="<?=$product['image']; ?>" alt="<?=$product['title']; ?>" />
        <p class="list-price text-danger">List Price: R<s><?=$product['list_price']; ?></s></p>
        <p class="price text-warning">Our Price: R<strong><?=$product['price']; ?></strong></p>
        <button class="btn btn-warning" onclick="detailsmodal(<?=$product['id']; ?>)">Details</button>
      </div>
      <?php endwhile; ?>
      
  <?php
        include 'includes/footer.php';
  ?>

</body>
</html>
