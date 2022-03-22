<?php require "../header.php" ?>


<?php if (hasSuccess()) : ?>
    <div class="alert alert-success">
        <?php echo getSuccess(); ?>
    </div>
<?php endif; ?>

<table class="table">
    <h3>Users Registration</h3>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>
        <?php

        $users = all('users');

        foreach ($users as $item) :
        ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>

                <td>


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