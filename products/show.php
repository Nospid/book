<?php require "../header.php";

$id = request('id');
if (empty($id)) {
    die("Please provide ID!");
}

$product = find('products', $id);
if (empty($product)) {
    die("Product Not Found!");
}

?>
<div class="d-flex justify-content-between mb-4">
    <h3>Product Details</h3>
    <a href="index.php" class="btn btn-primary">Go Back</a>
</div>

<p>ID: <?php echo $product['id']; ?></p>
<p>Name: <?php echo $product['name']; ?></p>
<p>Price: <?php echo $product['price']; ?></p>
<p>On Sale: <?php echo $product['on_sale'] ? "Yes" : "No"; ?></p>
<p>Sale Price: <?php echo $product['sale_price']; ?></p>
<p>Description: <?php echo $product['description']; ?></p>
<p>Category: <?php
                $category = find('categories', $product['category_id']);

                echo $category['name'];

                ?></p>

<?php require "../footer.php"; ?>