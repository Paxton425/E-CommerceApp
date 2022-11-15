<?php
$sql = "SELECT * FROM categories WHERE parent = 0";
$pquery = $conn->query($sql);
 ?>
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container bg-warning" style="border-radius: 5px; padding-bottom: 0px; margin-bottom: 0px;">
      <ul class="navbar-nav bg-warning">
        <a href="/" class="navbar-brand">Digital Veritas Shop</a>
        <?php while($parent = mysqli_fetch_assoc($pquery)): ?>
        <?php $parent_id = $parent['id'];
        $sql2 = "SELECT * FROM categories WHERE parent = '$parent_id'";
        $cquery = $conn->query($sql2);
         ?>
        <!--Dropdown-->
        <li class="dropdown">
          <a class="dropdown-toggle nav-link" href="#" id="text" data-toggle="dropdown"><?php echo $parent['category']; ?></a>
          <div class="dropdown-menu" role="menu">
            <?php while($child = mysqli_fetch_assoc($cquery)): ?>
              <a class="dropdown-item" href="#"><?php echo $child['category']; ?></a>
            <?php endwhile; ?>
          </div>
        </li>
        <?php endwhile; ?>
		    <li style="padding-top: 6px; margin-left: 20px;"><a id="myCart" href="cart.php"><i class="fa fa-cart-plus" aria-hidden="true"></i> My cart</a></li>
      </ul>
      <a class="btn btn-light bg-warning" href="/../Admin" style="height: 30px; padding-top:0.5px;" role="button">Admin</a>
    </div>
  </nav>
