<?php
// landing/index page
require("../settings/core.php");
require("../controllers/product_controller.php");

//checking auth status
if (!is_session_logged_in()){
	echo "You are not logged in";
	exit();
}elseif (!is_session_user_admin()){
	echo "You need to be an admin to access this page";
	exit();
}
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <title>easyGo- Category List</title>
</head>

<body>
<li><a href="category.php"><button type="button" class="btn btn-success">Add Category</button></a></li>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category Name</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
	<?php
		$category_list = get_all_product_categories_ctrl();

		foreach ($category_list as $category) {
	?>
    <tr>
      <th scope="row"><?php echo $category["cat_id"] ?></th>
      <td><?php echo $category["cat_name"] ?></td>
      <td>
		<form action="../view/category.php" method="post">
			<input type="hidden" name="category_id" value='<?php echo $category["cat_id"] ?>'>
			<input type="hidden" name="category_name" value='<?php echo $category["cat_name"] ?>'>
			<button type="submit" class="btn btn-success" name="edit_category">Edit</button>
		</form>
	  </td>
    </tr>
	<?php } ?>
  </tbody>
</table>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>