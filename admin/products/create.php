<?php require "../header.php" ?>

<div class="d-flex justify-content-between mb-4">
    <h3>Add New Product</h3>
    <a href="index.php" class="btn btn-primary">Go Back</a>
</div>

<?php if (hasError()) : ?>
    <div class="alert alert-danger">
        <?php echo getError(); ?>
    </div>
<?php endif; ?>

<form action="store.php" method="POST" enctype="multipart/form-data">



    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" class="form-control">
    </div>

    <div class="form-group">
        <label for="price">Price</label>
        <input type="text" id="price" name="price" class="form-control">
    </div>

    <div class="form-group">
        <input type="checkbox" id="on_sale" name="on_sale" value="1">
        <label for="on_sale">On Sale</label>
    </div>

    <div class="form-group">
        <label for="sale_price">Sale Price</label>
        <input type="text" id="sale_price" name="sale_price" class="form-control">
    </div>

    <div class="form-group">
        <label for="category_id">Category</label>
        <select id="category_id" name="category_id" class="form-control">
            <?php $categories = all('categories');
            foreach ($categories as $item) : ?>
                <option value="<?php echo $item['id']; ?>">
                    <?php echo $item['categorie_name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>


    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" id="image" name="image" class="form-control-file">
    </div>



    <div class="form-group">
        <label for="author_id">Author</label>
        <select id="auhtor_id" name="author_id" class="form-control">
            <?php $authors = all('authors');
            foreach ($authors as $item) : ?>
                <option value="<?php echo $item['id']; ?>">
                    <?php echo $item['name']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>







    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" name="description" class="form-control"></textarea>
    </div>


    <button type="submit" class="btn btn-primary">
        <i class="fas fa-save mr-2"></i>
        Save
    </button>

</form>



<?php require "../footer.php"; ?>