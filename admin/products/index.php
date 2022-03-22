<?php require "../header.php" ?>

<div class="d-flex justify-content-between mb-4">
    <h3>Products</h3>
    <a href="create.php" class="btn btn-primary">Create</a>
</div>

<?php if (hasSuccess()) : ?>
    <div class="alert alert-success">
        <?php echo getSuccess(); ?>
    </div>
<?php endif; ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Author</th>
            <th>Image</th>
            <th>Price</th>
            <th>Qty</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php

        $products = all('products');

        foreach ($products as $item) :

            $category = find('categories', $item['category_id']);
            $author = find('authors', $item['author_id']);

        ?>




            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td><?php echo $category['categorie_name']; ?></td>
                <td><?php echo $author ? $author['name'] : ''; ?></td>


                <td>

                    <img height="150px" width="100px" src="../../uploads/<?php echo $item['image']; ?>">


                </td>
                <td>
                    <?php if ($item['on_sale']) : ?>
                        Rs. <?php echo $item['sale_price']; ?>

                        <del>Rs. <?php echo $item['price']; ?></del>
                    <?php else : ?>
                        Rs. <?php echo $item['price']; ?>
                    <?php endif; ?>

                </td>
                <td><?php echo $item['qty']; ?></td>

                <td>
                    <a class="btn btn-primary btn-sm" href="show.php?id=<?php echo $item['id']; ?>">
                        Show
                    </a>

                    <a class="btn btn-info btn-sm" href="edit.php?id=<?php echo $item['id']; ?>">
                        Edit
                    </a>

                    <a class="btn btn-danger btn-sm" href="#!" onclick="confirmDelete(<?php echo $item['id']; ?>)">
                        Delete
                    </a>

                </td>
            </tr>
        <?php endforeach; ?>


    </tbody>
</table>


<script>
    function confirmDelete(id) {
        if (confirm('Are you sure you want to delete this?')) {
            location.href = 'delete.php?id=' + id;
        }
    }
</script>
<?php require "../footer.php"; ?>