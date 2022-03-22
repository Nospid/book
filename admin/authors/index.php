<?php require "../header.php" ?>

<div class="d-flex justify-content-between mb-4">
    <h3>Authors</h3>
    <a href="create.php" class="btn btn-info">Create</a>
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
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <?php

        $authors = all('authors');

        foreach ($authors as $item) :
        ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>

                <td>
                    <a class="btn btn-secondary btn-sm" href="show.php?id=<?php echo $item['id']; ?>">
                        Show
                    </a>

                    <a class="btn btn-danger btn-sm" href="edit.php?id=<?php echo $item['id']; ?>">
                        Edit
                    </a>

                    <a class="btn btn-dark btn-sm" href="#!" onclick="confirmDelete(<?php echo $item['id']; ?>)">
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