<?php
$sql= "SELECT * FROM brand";
$brand_arr = $conn->query($sql);
$sql = "SELECT * FROM categories WHERE parent = 0";
$p_categories = $conn->query($sql);
?>

<?php
// define variables and set to empty values
$name_val = $image_url_val = $list_price_val = $price_val = $brand_val = $category_val = $featured_val = $description_val = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name_val = test_input($_POST["Product-Name"]);
  $image_url_val = test_input($_POST["image"]);
  $list_price_val = test_input($_POST["list-price"]);
  $price_val = test_input($_POST["price"]);
  $brand_val = test_input($_POST["brand"]);
  $category_val = test_input($_POST["categories"]);
  $featured_val  = test_input($_POST["featured"]);
  $description_val  = test_input($_POST["description"]);
  Add_Product();
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  print_r($data);
  return $data;
}
?>

<!--New products-->
 <h2 class="text-center col-md-12" id="new_products" style="margin: 20px;">New Added Prodcuts</h2>
   <div class="col-md-3">
     <h4 class="text-center">Product</h4>
     <img class="products_images" src="https://d.newsweek.com/en/full/641228/gettyimages-454451525.jpg" alt="Brown women's heels" />
     <h4 class="product_name">Brown women's heels</h4>
     <p class="list-price text-danger">List Price: <s>R260</s></p>
     <p class="price text-warning">Our Price: R<strong>250</strong></p>
     <button class="btn btn-warning" onclick="remove_product()">Remove</button>
     <button class="btn btn-warning" style="float: right;" onclick="submit_product()">Submit</button>
   </div>

   <?php
     function Add_Product(){
       $_SESSION["Product-Name"] = $name_val;
       $_SESSION["image"] = $image_url_val;
       $_SESSION["list-price"] = $list_price_val;
       $_SESSION["price"] = $price_val;
       $_SESSION["brand"] = "yellow";
       $_SESSION["featured"] = "yellow";
       $_SESSION["description"] = $description_val;
       $_SESSION["category"] = $category_val;
       echo '<div class="col-md-3">';
         echo '<h4 class="text-center">Product</h4>';
         echo '<img class="products_images" src="'.$image_url_val.'" alt="'.$name_val.'" />';
         echo '<h4 class="product_name">'.$name_val.'</h4>';
         echo '<p class="list-price text-danger">List Price: <s>'.$list_price_val.'</s></p>';
         echo '<p class="price text-warning">Our Price: R<strong>'.$price_val.'</strong></p>';
         echo '<button class="btn btn-warning" onclick="remove_product()">Remove</button>';
         echo '<button class="btn btn-warning" style="float: right;" onclick="submit_product()">Submit</button>';
       echo '</div>';
     }
    ?>

   <!--Adding new products-->
   <h2 class="text-center col-md-12" id="add_new_products" style="margin: 20px;">Adding Prodcuts</h2>
   <?php include('Admin_Includes/Add_Form.php'); ?>
