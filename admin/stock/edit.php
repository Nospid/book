<?php require "../header.php";

$id = request('id');

if (empty($id)) {
    die("Please provide ID!");
}

$product = where('products', "id", "=", $id, false);
if (empty($product)) {
    die("Stock not found!");
}

?>

<div class="d-flex justify-content-between mb-4">
    <h3>Edit</h3>
    <a href="index.php" class="btn btn-primary">Go Back</a>
</div>

<?php if (hasError()) : ?>
    <div class="alert alert-danger">
        <?php echo getError(); ?>
    </div>
<?php endif; ?>

<form action="update.php?id=<?php echo $id; ?>" method="POST">

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $product['name']; ?>">
    </div>
    <div class="form-group">
        <label for="name">Qunatity</label>
        <input type="text" id="qty" name="qty" class="form-control" value="<?php echo $product['qty']; ?>">
    </div>

    <button type="submit" class="btn btn-dark">
        <i class="fas fa-save mr-2"></i>
        Save
    </button>

</form>



<?php require "../footer.php"; ?>