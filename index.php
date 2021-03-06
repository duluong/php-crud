<?php
	// set page headers
	$page_title = "The very Simple CRUD example with PHP and Postgresql";
	include_once 'view/header.php';



	function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

	// define variables and set to empty values
	$action = $prodId = $prodName = $description = $price = "";
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if ($_POST["action"] != null) {
			$action = $_POST["action"] ;
			$action = test_input($action);
		}
		if ($_POST["prodId"]  != null) {
			$prodId = $_POST["prodId"] ;
			$prodId = test_input($prodId);
		} 
		if ($_POST["prodName"]  != null) {
			$prodName = $_POST["prodName"] ;
			$prodName = test_input($prodName);
		} 
		if ($_POST["description"]  != null) {
			$description = $_POST["description"] ;
			$description = test_input($description);
		} 
		if ($_POST["price"]  != null) {
			$price = $_POST["price"] ;
			$price = test_input($price);
		}
	}

	include_once 'model/product.php';
	$productCRUD = new Product();
	$products = null;

	switch ($action) {
		case 'Search':
			$products = $productCRUD->searchProduct($prodName, $description, $price);
			break;
		
		case 'Create':
			$ret = $productCRUD->addProduct($prodName, $description, $price);
			$products = $productCRUD->getAllProducts();
			break;

		case 'Update':
			$ret = $productCRUD->updateProduct($prodId, $prodName, $description, $price);
			$products = $productCRUD->getAllProducts();
			break;

		case 'Delete':
			$ret = $productCRUD->deleteProduct($prodId);
			$products = $productCRUD->getAllProducts();
			break;

		default:
			$products = $productCRUD->getAllProducts();
			break;
	}
?>

<form class="form-horizontal" method="POST">
	  <div class="form-group">
	    <label class="control-label col-sm-2" for="prodName">Product Name:</label>
	    <div class="col-sm-5">
	    	<input type="hidden" class="form-control" id="prodId" name="prodId">
	        <input type="text" class="form-control" id="prodName" name="prodName" placeholder="Enter Product Name">
	    </div>
	    <div class="col-sm-3">
	      <input type = "submit" class="btn btn-primary btn-sm" name = "action" value = "Create"> 
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="description">Description:</label>
	    <div class="col-sm-5">
	      <input type="text" class="form-control" id="description" name="description" placeholder="Enter Product Description">
	    </div>

	    <div class="col-sm-3">
	      <input type = "submit" id="update" class="btn btn-warning btn-sm hidden" name = "action" value = "Update"> 
	    </div>
	  </div>

	  <div class="form-group">
	    <label class="control-label col-sm-2" for="price">Price:</label>
	    <div class="col-sm-5">
	      <input type="text" class="form-control" id="price" name="price" placeholder="Enter Product Price">
	    </div>

	    <div class="col-sm-3">
	      <input type = "submit" id="delete" class="btn btn-warning btn-sm hidden" name = "action" value = "Delete"> 
	    </div>
	  </div>

	  <div class="form-group">
	     <div class="col-sm-7">
	      <input type = "submit" class="btn btn-primary btn-sm pull-right" name = "action" value = "Search"> 
	    </div>
	  </div>

	  <div class="table-responsive">
	  <table id="productList" class="table table-bordered table-hover">
	    <thead class="bg-info text-white">
	      <tr>
	        <th>#</th>
	        <th class="hidden">Product ID</th>
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
			    echo "\t\t<td class=\"id hidden\">" . $row["id"] . " </td>\n";
			    echo "\t\t<td class=\"name\">" . $row["name"] ." </td>\n";
			    echo "\t\t<td class=\"description\">" . $row["description"] ." </td>\n";
			    echo "\t\t<td class=\"price\">" . $row["price"] ." </td>\n";
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
