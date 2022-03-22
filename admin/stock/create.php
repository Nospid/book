<?php require "../header.php" ?>
<?php
$products = all("products");
if (count($products) == 0) {
    die("No products found...");
}
?>
<div class="d-flex justify-content-between mb-4">
    <h3>Add Stock</h3>
    <a href="index.php" class="btn btn-dark">Go Back</a>
</div>

<?php if (hasError()) : ?>
    <div class="alert alert-danger">
        <?php echo getError(); ?>
    </div>
<?php endif; ?>

<form action="store.php" method="POST" enctype="multipart/form-data">



    <div class="form-group">
        <label for="name">Product</label>
        <select name="product_name" id="" class="form-control">
            <?php
            foreach ($products as $product) {
                echo "<option value=" . $product["id"] . ">" . $product["name"] . "</option>";
            }
            ?>
        </select>
    </div>


    <div class="form-group">
        <label for="name">Qty</label>
        <input type="qty" id="qty" name="qty" class="form-control">
    </div>


    <button type="submit" class="btn btn-dark">
        <i class="fas fa-save mr-2"></i>
        Save
    </button>

</form>



<?php require "../footer.php"; ?>