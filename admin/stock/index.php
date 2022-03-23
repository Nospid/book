<?php
require "../header.php";
require_once "../../db.php";
?>
<div class="d-flex justify-content-between mb-4">
    <h3>Stocks</h3>
    <a href="create.php" class="btn btn-info">Add Stocks</a>
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
            <th>ProductName</th>
            <th>Qunatity</th>
            <th>Action</th>

        </tr>
    </thead>
    <tbody>






        <?php
        $pdo = pdo();
        $stmt = $pdo->prepare("SELECT qty FROM stock");
        $stmt->execute();
        $data = $stmt->fetchAll();

        $pdo = pdo();
        $stmt = $pdo->prepare("SELECT stock.id, products.name, products.qty FROM stock INNER JOIN products ON stock.product_id = products.id");
        $stmt->execute();
        $product = $stmt->fetchAll();

        foreach ($product as $item) :

        ?>
            <tr>
                <td><?php echo $item['id']; ?></td>
                <td><?php echo $item['name']; ?></td>
                <td>
                    <?php echo $item['qty']; ?>
                </td>
                <td>
                    <a class="btn btn-dark btn-sm" href="show.php?id=<?php echo $item['id']; ?>">
                        Show
                    </a>

                    <a class="btn btn-secondary btn-sm" href="edit.php?id=<?php echo $item['id']; ?>">
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