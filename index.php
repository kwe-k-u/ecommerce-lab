<?php
// landing/index page
require_once("settings/core.php");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>easyGo</title>
</head>

<body>

<br>
<br>
  <ol>
  <li><a href="view/all_product.php"><button type="button" class="btn btn-primary">All Products</button></a></li>
  <li><a href="view/cart.php"><button type="button" class="btn btn-warning">Cart</button></a></li>

<form action="view/search_result.php" method="get">
  <input type="search" name="search_keys" id="search_keys">
  <button type="submit" class="btn btn-success">Search</button>
</form>


    <?php

    if (!is_session_logged_in()){ ?>
      <li><a href="login/login.php"><button type="button" class="btn btn-primary">Login</button></a></li>
      <li><a href="login/register.php"><button type="button" class="btn btn-success">Register</button></a></li>
      <?php }else { ?>

        <?php if (is_session_user_admin()){ ?>
        <li><a href="admin/brand.php"><button type="button" class="btn btn-primary">Brand</button></a></li>
        <li><a href="admin/category.php"><button type="button" class="btn btn-primary">Category</button></a></li>
        <li><a href="view/product_mng.php"><button type="button" class="btn btn-primary">Add Product</button></a></li>
        <?php } ?>
        <form action="actions/login_processing.php" method="POST">
          <li><button type="submit" name="logout" class="btn btn-warning">Log out</button></li>
        </form>
        <?php } ?>
  </ol>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>