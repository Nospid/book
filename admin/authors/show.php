<?php require "../header.php";

$id = request('id');
if (empty($id)) {
    die("Please provide ID!");
}

$authors = find('authors', $id);
if (empty($authors)) {
    die("Authors Not Found!");
}

?>
<div class="d-flex justify-content-between mb-4">
    <h3>Category Details</h3>
    <a href="index.php" class="btn btn-primary">Go Back</a>
</div>

<p>ID: <?php echo $authors['id']; ?></p>
<p>Name: <?php echo $authors['name']; ?></p>


<?php require "../footer.php"; ?>