<div class="col-md-12">
  <h3>Add new product</h3>
  <div class="form_container">
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
      <div class="form-group">
        <label for="pname">Product Name:</label>
        <input class="form-control" placeholder="Name" id="pname" name="Product-Name">
        <label for="image">Product image:</label>
        <input class="form-control" type="url" placeholder="Paste image url here" name="image"><br />Or
        <label for="img">Choose image</label>
        <input type="file" class="form-control-file" id="img"name="img" accept="image/*" />
      </div>
      <label for="price_inp">Prices:</label><br />
      <div class="input-group">
        <div class="input-group-prepend">
          <span name="price_inp" class="input-group-text">Price</span>
        </div>
        <input class="form-control col-sm-6" placeholder="Enter list price" name="list-price">
        <input class="form-control col-sm-6" placeholder="Enter price" name="price">
      </div><hr />
      <div class="form-group">
        <label for="brand">Choose Brand:</label>
        <select class="form-control form-control-sm col-sm-3" name="brand" id="brand_s">
          <?php while($brand = mysqli_fetch_assoc($brand_arr)): ?>
          <option value="<?=$brand['id']; ?>"><?=$brand['brand']; ?></option>
          <?php endwhile; ?>
        </select>
        <label for="category">Choose a category:</label>
        <select class="form-control col-sm-4" name="categories" id="categories_s">
          <?php while($parent = mysqli_fetch_assoc($p_categories)): ?>
            <?php $parent_id = $parent['id'];
             $sql2 = "SELECT * FROM categories WHERE parent = $parent_id";
             $c_categories =$conn->query($sql2);
             ?>
            <optgroup label="<?=$parent['category'] ?>">
              <?php while($child = mysqli_fetch_assoc($c_categories)): ?>
              <option value="<?=$child['parent']; ?>"><?=$child['category']; ?> (<?=$parent['category'] ?>)</option>
              <?php endwhile; ?>
            </optgroup>
          <?php endwhile; ?>
        </select>
      </div>
      <div class="form-check col-auto my-1">
        <label class="form-check-label">
           <input class="form-check-input" type="checkbox" name="featured"> Featured
         </label>
       </div><br /><hr />
      <div class="form-group">
        <label for="description">Product description:</label>
        <textarea class="form-control" rows="3" id="description" name="description"></textarea>
      </div>
       <button class="btn btn-primary" type="submit"><i class="fa-solid fa-circle-plus"></i> Add</button>
     </form>
  </div>
 </div>
