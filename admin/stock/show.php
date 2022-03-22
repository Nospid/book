<?php require "../header.php";

$id = request('id');
if (empty($id)) {
    die("Please provide ID!");
}

$pdo = pdo();
$stmt = $pdo->prepare("SELECT stock.id, products.name, products.qty FROM stock INNER JOIN products ON stock.product_id = products.id");
$stmt->execute();
$stock = $stmt->fetchAll();

if (empty($stock)) {
    die("Stock Not Found!");
}

?>
<div class="d-flex justify-content-between mb-4">
    <h3>Stock Details</h3>
    <a href="index.php" class="btn btn-primary">Go Back</a>
</div>

<p>ID: <?php echo $stock[0]['id']; ?></p>
<p>Prooduct_id: <?php echo $stock[0]['name']; ?></p>
<p>Qty : <?php echo $stock[0]['qty']; ?></p>

<?php

?>

<?php require "../footer.php"; ?>