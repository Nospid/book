<?php require "../header.php";

$id = request('id');
if (empty($id)) {
    die("Please provide ID!");
}

$category = find('categories', $id);
if (empty($category)) {
    die("Category Not Found!");
}

?>
<div class="d-flex justify-content-between mb-4">
    <h3>Category Details</h3>
    <a href="index.php" class="btn btn-primary">Go Back</a>
</div>

<p>ID: <?php echo $category['id']; ?></p>
<p>Name: <?php echo $category['categorie_name']; ?></p>


<?php require "../footer.php"; ?>