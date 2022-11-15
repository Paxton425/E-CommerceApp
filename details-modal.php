<?php
require_once 'core/init.php';
$id = $_POST['id'];
$id = (int)$id;
$sql = "SELECT * FROM products WHERE id = '$id'";
$result = $conn->query($sql);
$product = mysqli_fetch_assoc($result);
$brand_id = $product['brand'];
$sql ="SELECT brand FROM brand WHERE id = '$brand_id'";
$brand_query = $conn->query($sql);
$brand = mysqli_fetch_assoc($brand_query);
$sizestring = $product['sizes'];
$sizestring = rtrim($sizestring, ',');
$size_array = explode(',', $sizestring);
?>

<?php  ob_start(); ?>
<div class="modal fade details-<?=$product['id']; ?>" id="details-<?=$product['id']; ?>" tableindex="-1" role="dialog" aria-labelledby="details-<?=$product['id']; ?>" aria-hiden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <diV class="modal-header" style="background: orange; align: center;">
        <h4 class="modal-title text-right" style="position: relative; left: 250px;"><?=$product['title']; ?></h4>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times</span></button>
      </diV>
      <diV class="modal-body">
        <div class="container-fluid" style="padding: 0;">
          <div class="row" style="margin: 0;">
            <span id="modal_errors" class="text-danger"></span>
            <div class="col-sm-6">
              <div clas="center-block fotorama" data-autoplay="true">
                <?php $photos = explode(',', $product['image']); ?>
                <?php foreach ($photos as $photo): ?>
                <img src="<?=$photo; ?>" alt="<?=$product['title']; ?>" class="details_image details img-responsive" />
                <?php endforeach; ?>
              </div>
            </div>
            <div class="col-sm-6">
              <h4>Details</h4>
              <p><?=nl2br($product['description']); ?></p><hr />
              <p>List Price: $<s></s><?=$product['list_price']; ?></s></p>
              <p>Price: $<?=$product['price']; ?></p>
              <P>brand: <?=$brand['brand']; ?></P>
              <form action="add_cart.php" method="post" id="add_product_form">
                <input type="hidden" name="product_id" value="<?=$id; ?>">
                <input type="hidden" name="available" id="available" value="">
                <div class="form-group">
                  <div class="col-xs-6">
                    <label for="quantity" id="quantity-label">quantity:</label>
                    <input type="text" class="form-control" id="quantity" name="quantity" min="0"/>
                  </div>
                  <div class="col-xs-9">&nbsp;</div>
                  <div class="form-group">
                    <label for="size">Size:</label>
                    <select name="size" id="size" class="form-control">
                      <option value="" class="select_item"></option>
                      <?php foreach ($size_array as $string){
                        $string_split =explode(':', $string);
                        $size = $string_split[0];
                        $available = $string_split[1];
                            if($available > 0){
                              echo '<option value="'.$size.'" data-available="'.$available.'">'.$size.'('.$available.' Available)</option>';
                            }
                        }
                         ?>
                    </select>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </diV>
      <div class="modal-footer" style="background-color: #000000;">
        <button class="btn btn-light" onclick="closeModal();" data-dismiss="modal">Close</button>
        <button class="btn btn-warning" onclick="add_to_cart(); return false;" type="submit"><i class="fa-solid fa-cart-arrow-down"></i>Add To Cart</button>
      </div>
    </div>
  </div>
</div>
<script>
$(function(){
  $('.fotorama').fotorama({'loop':true});
});

$('#size').change(function(){
  var available = $('#size option:selected').data("available");
  $('#available').val(available);
});

function closeModal(){
  $('#details-1').modal('hide');
  setTimeout(()=>{
    $('#details-1').remove();
    $('.modal-backdrop').remove();
  }, 500);
}

</script>

<?php echo ob_get_clean(); ?>
