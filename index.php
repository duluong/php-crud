<?php
	// set page headers
	$page_title = "Product CRUD example with PHP and Postgresql";
	include_once 'view/header.php';

	$action = $_POST["action"] ;
	$id = $_POST["id"] ;
	$prodname = $_POST["prodname"] ;
	$description = $_POST["description"] ;
	$price = $_POST["price"] ;

	include_once 'model/product.php';
	$productCRUD = new Product();
	var $products;

	switch ($action) {
		case 'Search':
			$products = $productCRUD->searchProduct($prodname, $description, $price);
			break;
		
		case 'Create':
			$ret = $productCRUD->addProduct($prodname, $description, $price);
			$products = $productCRUD->getAllProducts();
			break;

		case 'Update':
			$ret = $productCRUD->updateProduct($id, $prodname, $description, $price);
			$products = $productCRUD->getAllProducts();
			break;

		case 'Delete':
			$ret = $productCRUD->deleteProduct($id);
			$products = $productCRUD->getAllProducts();
			break;

		default:
			$products = $productCRUD->getAllProducts();
			break;
	}
?>

<form class="form-horizontal" method="POST">

	<div class="container">
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="prodname">Product Name:</label>
	    <div class="col-sm-5">
	      <input type="text" class="form-control" id="prodname" name="prodname" placeholder="Enter Product Name">
	      <input type="hidden" class="form-control" id="id" name="id">
	    </div>
	    <div class="col-sm-3">
<!-- 	      <button type="button" class="btn">Create</button> -->
	      <input type = "submit" class="btn" name = "action" value = "Create"> 
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="description">Description:</label>
	    <div class="col-sm-5">
	      <input type="text" class="form-control" id="description" name="description" placeholder="Enter Product Description">
	    </div>

	    <div class="col-sm-3">
	      <!-- <button type="button" class="btn">Update</button> -->
	      <input type = "submit" class="btn" name = "action" value = "Update"> 
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="price">Price:</label>
	    <div class="col-sm-5">
	      <input type="text" class="form-control" id="price" name="price" placeholder="Enter Product Price">
	    </div>

	    <div class="col-sm-3">
	      <!-- <button type="button" class="btn">Delete</button> -->
	      <input type = "submit" class="btn" name = "action" value = "Delete"> 
	    </div>
	  </div>

	  <div class="form-group">
	     <div class="col-sm-7">
	      <!-- <button type="button" class="btn pull-right">Search</button> -->
	      <input type = "submit" class="btn pull-right" name = "action" value = "Search"> 
	    </div>
	  </div>

	  <div class="table-responsive">
	  <table class="table table-bordered table-hover">
	    <thead>
	      <tr>
	        <th>#</th>
	        <th>Name</th>
	        <th>Description</th>
	        <th>Price</th>
	      </tr>
	    </thead>
	    <tbody>

		<?php
			$i = 0;
			while ($row = pg_fetch_array($products, null, PGSQL_ASSOC)) {
			    echo "\t<tr>\n";
			    echo "\t\t<td>" . ++$i . " </td>\n";
			    echo "\t\t<td>" . $row["name"] ." </td>\n";
			    echo "\t\t<td>" . $row["description"] ." </td>\n";
			    echo "\t\t<td>" . $row["price"] ." </td>\n";
			    echo "\t</tr>\n";
			}

			// Free resultset
			pg_free_result($products);
		?>

	    </tbody>
	  </table>
	</div>
</form>


<?php
include_once 'view/footer.php';
?>