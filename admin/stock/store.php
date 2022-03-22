<?php

require "../admin.php";

$name = request('product_name');
$qty = request("qty");



if (empty($name)) {
    setError('You must provide category name!');
    header("Location: create.php");
    die;
}

if (empty($qty)) {
    setError('You must assign at least one quantity!');
    header("Location: create.php");
    die;
}






create('stock', ['product_id' => $name, 'qty' => $qty]);
$pdo = pdo();
$stmt = $pdo->prepare("UPDATE products set `qty` = `qty`+$qty WHERE `id` = $name");
$stmt->execute();
setSuccess('Category created successfully!');
header("Location: index.php");
