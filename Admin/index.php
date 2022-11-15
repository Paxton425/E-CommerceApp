<?php
require_once '../core/init.php';
$sql = "SELECT * FROM products WHERE  featured = 1";
$featured = $conn->query($sql);
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <link rel="stylesheet" href="/../css/bootstrap.min.css" />
  <link rel="stylesheet" href="/../css/main.css" />
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0, userscaleable=no" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/bfe8b5e9a8.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
  <div>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <div class="container bg-warning" style="border-radius: 5px; padding-bottom: 0px; margin-bottom: 0px;">
        <ul class="navbar-nav bg-warning">
          <a href="/Tutorial/index.php" class="navbar-brand">Digital Veritas Shop</a>
          <li class="dropdown">
            <a class="dropdown-toggle nav-link" href="#" id="text" data-toggle="dropdown">Products</a>
            <div class="dropdown-menu" role="menu">
              <a class="dropdown-item" href="#">Featured</a>
              <a class="dropdown-item" href="#">All Products</a>
            </div>
          </li>
          <a class="btn btn-default bg-warning" href="#add_new_products"><i class="fa-solid fa-circle-plus"></i> Add Products</a>
        </ul>
        <a class="btn btn-default" href="/../index.php" style=" float: left; border-color: yellow; background-color: white; height: 32px; padding-top:0.5px;" role="button">Home</a>
      </div>
    </nav>
  </div>

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
        //New products management
        include('Admin_Includes/Add_Products.php');
        //footer
        include ('../includes/footer.php');
  ?>
</body>
</html>
