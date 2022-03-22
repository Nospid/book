<?php require "../header.php";

$id = request('id');

if (empty($id)) {
    die("Please provide ID!");
}

$authors = find('authors', $id);
if (empty($authors)) {
    die("Author not found!");
}

?>

<div class="d-flex justify-content-between mb-4">
    <h3>Edit Author</h3>
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
        <input type="text" id="name" name="name" class="form-control" value="<?php echo $authors['name']; ?>">
    </div>


    <button type="submit" class="btn btn-dark">
        <i class="fas fa-save mr-2"></i>
        Save
    </button>

</form>



<?php require "../footer.php"; ?>