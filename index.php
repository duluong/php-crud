<?php
// set page headers
$page_title = "Product CRUD example with PHP and Postgresql";
include_once 'view/header.php';


echo "<div class='right-button-margin'>";
    echo "<a href='create_product.php' class='btn btn-default pull-right'>Create Product</a>";
echo "</div>";


include_once 'model/product.php';
$products = (new Product())->getAllProducts();

// Printing results in HTML
echo "<table>\n";
while ($row = pg_fetch_array($products, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($row as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// Free resultset
pg_free_result($products);



include_once 'view/footer.php';
?>