<?php require "../header.php" ?>

<div class="d-flex justify-content-between mb-4">
    <h3>Add New Category</h3>
    <a href="index.php" class="btn btn-dark">Go Back</a>
</div>

<?php if (hasError()) : ?>
    <div class="alert alert-danger">
        <?php echo getError(); ?>
    </div>
<?php endif; ?>

<form action="store.php" method="POST" enctype="multipart/form-data">



    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="categorie_name" class="form-control">
    </div>

    <button type="submit" class="btn btn-dark">
        <i class="fas fa-save mr-2"></i>
        Save
    </button>

</form>



<?php require "../footer.php"; ?>